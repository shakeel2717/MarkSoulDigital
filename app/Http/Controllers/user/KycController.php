<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.kyc.index');
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
            'name' => 'required|string',
            'address' => 'required|string',
            'front' => 'required|image',
            'back' => 'required|image',
        ]);

        // checking if request is already under review
        if (auth()->user()->kyc && auth()->user()->kyc->status == false) {
            return back()->withErrors('Your KYC Request already in Review, Please wait until Approved!');
        } elseif (auth()->user()->kyc && auth()->user()->kyc->status == true) {
            return back()->withErrors('Your KYC Request already Approved!');
        }

        $front = $request->file('front');
        $front_name = auth()->user()->username . time() . rand(00,11) . '.' . $front->getClientOriginalExtension();
        $front->move(public_path('kyc/'), $front_name);

        $back = $request->file('back');
        $back_name = auth()->user()->username . time() . rand(00,11) . '.' . $back->getClientOriginalExtension();
        $back->move(public_path('kyc/'), $back_name);

        auth()->user()->kyc()->create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'front' => $front_name,
            'back' => $back_name,
        ]);

        return back()->with('success', 'Kyc Request Submitted Successfully');
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
