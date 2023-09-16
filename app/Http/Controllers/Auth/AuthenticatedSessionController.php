<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\SendOtpMail;
use App\Models\LoginHistory;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function autoLogin($username)
    {

        $user = User::where('username', $username)->firstOrFail();
        if (env('APP_ENV') == 'local') {

            Auth::guard('web')->logout();

            Auth::login($user);
        }

        return redirect()->route('user.dashboard.index');
    }

    public function provideOtp(): View
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required|string|min:5'
        ]);

        // checking if this OTP is valid
        if (session('token_otp') &&  session('token_otp') == $validatedData['token']) {
            session(['otp_complete' => true]);
            return redirect()->route('admin.dashboard.index');
        } else {
            return back()->withErrors("Invalid OTP Token");
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // login history
        $history = new LoginHistory();
        $history->user_id = auth()->user()->id;
        $history->ip = $request->ip();
        $history->save();

        // sending OTP if this user is admin
        if (auth()->user()->role == 'admin') {
            // generate random code
            $token = str()->random(30);
            Mail::to(auth()->user()->email)->send(new SendOtpMail($token));
            // storing this token to session
            session(['token_otp' => $token]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
