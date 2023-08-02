<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

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
            'amount' => 'required|integer|digits_between:1,1000000',
        ]);

        // checking if deposit amount is enough
        if ($validatedData['amount'] < site_option('min_deposit')) {
            return back()->withErrors(['Minimum Withdrawal Limit is: ' . site_option('min_deposit')]);
        }

        $wallet = Wallet::find($validatedData['paymentMethod']);

        $fees = $validatedData['amount'] * site_option('withdraw_fees') / 100;
        $amount = $validatedData['amount'] - $fees;

        auth()->user()->transactions()->create([
            'type' => 'Withdraw',
            'sum' => false,
            'status' => false,
            'reference' => 'Withdraw Funds throw ' . $wallet->name . " " . $wallet->symbol,
            'amount' => $amount,
        ]);

        auth()->user()->transactions()->create([
            'type' => 'Withdraw Fees',
            'sum' => false,
            'status' => false,
            'reference' => 'Withdraw Funds throw ' . $wallet->name . " " . $wallet->symbol,
            'amount' => $fees,
        ]);

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
