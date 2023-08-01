<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.deposit.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wallets = Wallet::where('status', true)->get();
        return view('user.deposit.create', compact('wallets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shippingMethod' => 'required|integer|exists:wallets,id',
            'amount' => 'required|integer|digits_between:1,1000000',
        ]);

        // checking if deposit amount is enough
        if ($validatedData['amount'] < site_option('min_deposit')) {
            return back()->withErrors(['Minimum Withdrawal Limit is: ' . site_option('min_deposit')]);
        }

        $finalAmount = $validatedData['amount'];
        // getting this wallet fees
        $wallet = Wallet::find($validatedData['shippingMethod']);
        if ($wallet->fees > 0) {
            $fees = $validatedData['amount'] * $wallet->fees /  100;
            $finalAmount = $validatedData['amount'] + $fees;
        }

        // adding deposit request in the system
        auth()->user()->transactions()->create([
            'type' => 'Deposit',
            'amount' => $validatedData['amount'],
        ]);

        return back()->with('success', 'Deposit Request Recieved');
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
