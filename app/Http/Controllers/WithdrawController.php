<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawRequest;
use App\Models\Wallet;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::where('status', true)->get();
        return view('user.withdraw.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paymentMethod' => 'required|integer|exists:wallets,id',
            'amount' => 'required|numeric|min:1',
            'wallet' => 'required|string',
        ]);

        // checking if today is saturday or sunday
        if (Carbon::today()->format('D') == "Sat" || Carbon::today()->format('D') == "Sun") {
            info("Today is Holidy");
            return back()->withErrors(['Sat, Sun Withdraw Off']);
        }

        $current_time = Carbon::now();

        // Define the start and end times for allowed withdraw requests
        $start_time = Carbon::createFromTime(0, 0, 0); // 12AM
        $end_time = Carbon::createFromTime(12, 0, 0); // 12PM

        // Check if the current time is within the allowed range
        if (!$current_time->between($start_time, $end_time)) {
            // Withdraw request is allowed within the time range
            return back()->withErrors(['Withdraw Timing is from 12AM to 12PM']);
        }

        // checking if this user have enough balnace
        if (balance(auth()->user()->id) < $validatedData['amount']) {
            return back()->withErrors(['Insufficient Balance']);
        }

        // checking if deposit amount is enough
        if ($validatedData['amount'] < site_option('min_deposit')) {
            return back()->withErrors(['Minimum Withdrawal Limit is: ' . site_option('min_deposit')]);
        }

        if (!env('APP_DEBUG')) {
            // checking if this user KYC is Complete
            if (!auth()->user()->kyc || !auth()->user()->kyc->status) {
                return back()->withErrors(['You can Place Withdraw Request After KYC Approved.']);
            }
        }

        $wallet = Wallet::findOrFail($validatedData['paymentMethod']);

        $fees = $validatedData['amount'] * site_option('withdraw_fees') / 100;
        $amount = $validatedData['amount'] - $fees;

        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->amount = $amount;
        $withdraw->wallet = $validatedData['wallet'];
        $withdraw->method = $wallet->symbol;
        $withdraw->save();

        auth()->user()->transactions()->create([
            'type' => 'Withdraw',
            'sum' => false,
            'status' => false,
            'reference' => 'Withdraw Funds throw ' . $wallet->name . " " . $wallet->symbol,
            'user_plan_id' => auth()->user()->userPlan->id ?? null,
            'withdraw_id' => $withdraw->id,
            'amount' => $amount,
        ]);

        auth()->user()->transactions()->create([
            'type' => 'Withdraw Fees',
            'sum' => false,
            'status' => false,
            'user_plan_id' => auth()->user()->userPlan->id ?? null,
            'reference' => 'Withdraw Funds throw ' . $wallet->name . " " . $wallet->symbol,
            'withdraw_id' => $withdraw->id,
            'amount' => $fees,
        ]);

        if (!env('APP_DEBUG')) {
            // sending email to this user
            Mail::to(auth()->user()->email)->send(new WithdrawRequest($withdraw));
        }


        return back()->with('success', 'Withdraw Request Send Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
