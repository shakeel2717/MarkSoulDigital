<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        // getting this username
        $username = DB::table("password_reset_tokens")->where('email', $request->email)->first();
        $request->username = $username->username;
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // getting this username
        $token = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('username', $request->username)
            ->first();

        if ($token != "") {
            // matching token
            if (Hash::check($request->token, $token->token)) {
                // updating this user password
                $user = User::where('email', $token->email)->where('username', $token->username)->firstOrFail();
                $user->password = bcrypt($request->password);
                $user->save();

                event(new PasswordReset($user));

                // removing this password request
                $token = DB::table('password_reset_tokens')
                    ->where('email', $request->email)
                    ->where('username', $request->username)
                    ->delete();

                return redirect()->route('login')->with('success', 'Password Successfully Updated');
            } else {
                die("Token Mismatch");
            }
        } else {
            die("Token Error");
        }

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(60),
        //         ])->save();
        //     }
        // );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // return $status == Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('status', __($status))
        //     : back()->withInput($request->only('email'))
        //     ->withErrors(['email' => __($status)]);
    }
}
