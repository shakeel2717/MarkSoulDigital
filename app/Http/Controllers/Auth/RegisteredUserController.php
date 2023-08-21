<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($refer = null, $position = null): View
    {
        return view('auth.register', compact('refer', 'position'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['nullable', 'string', 'max:255'],
            'lname' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'alpha_num', 'max:255', 'unique:' . User::class],
            'mobile' => ['required', 'numeric', 'unique:' . User::class],
            'code' => ['nullable', 'numeric'],
            'country' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'refer' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $sponsor = null;
        $position = null;


        if ($validated['refer'] != 'default' && $validated['position'] != null) {
            // Checking if this refer is valid
            $sponsorQuery = User::where('username', $validated['refer'])->firstOrFail();
            info("Current Sponser is: " . $sponsorQuery->name);
            $sponsor = $sponsorQuery->username;
            $position = $validated['position'];
            info("Current Position is: " . $position);
        }

        $user = new User();
        $user->fname = $validated['fname'];
        $user->mname = $validated['mname'] ?? null;
        $user->lname = $validated['lname'] ?? null;
        $user->username = strtolower($validated['username']);
        $user->email = strtolower($validated['email']);
        $user->password = Hash::make($request->password);
        $user->refer = $sponsor ?? "default";
        $user->mobile = $validated['code'] . $validated['mobile'];
        $user->country = $validated['country'];
        $user->position = $validated['position'];
        $user->save();
        info("User Created: " . $user->username);

        // Function to find an available slot in the downline's left or right side
        function findAvailableSlot($downlineUser, $targetPosition)
        {
            info("Finding Available Slot");
            if ($targetPosition === 'left' && $downlineUser->left_user_id === null) {
                info("Slot Found Left : and User: " . $downlineUser->username);
                return ['slot' => 'left_user_id', 'sponser' => $downlineUser->id];
            } elseif ($targetPosition === 'right' && $downlineUser->right_user_id === null) {
                info("Slot Found Right : and User: " . $downlineUser->username);
                return ['slot' => 'right_user_id', 'sponser' => $downlineUser->id];
            } else {
                info("No Free Slot Found");
                // If the target slot is already occupied, recursively search for the next level
                $nextUser = $targetPosition === 'left' ? $downlineUser->left_user : $downlineUser->right_user;
                info("Next User to Find: " . $nextUser->username);
                if ($nextUser) {
                    info("Enter in New Loop Once again");
                    return findAvailableSlot($nextUser, $targetPosition);
                } else {
                    info("next user not Found");
                }
            }
        }

        // Checking if the sponsor has a downline and placing the user in the appropriate slot
        if ($position != null) {
            $availableSlot = findAvailableSlot($sponsorQuery, $position);
            info("Available Slot After all kinds of Looop: " . $availableSlot['slot']);
            if ($availableSlot) {
                info("Free Slot Found: " . $availableSlot['slot']);
                info("Sponser: " . $availableSlot['sponser']);
                info("New User ID: " . $user->id);
                $sponsorQuery = User::find($availableSlot['sponser']);
                $slot = $availableSlot['slot'];
                $sponsorQuery->$slot = $user->id;
                $sponsorQuery->save();
            } else {
                info("Deep in the Else");
                // Handle the case when no available slot is found in the direct downline and its further downlines
                // You can implement additional logic here, like notifying the user or any other actions.
                // For now, we are not assigning any position, and the user will remain unassigned in the direct downline and its further downlines.
            }
        }

        if ($validated['refer'] != 'default' && $validated['position'] != null) {
            $user->save();
            $sponsorQuery->save();
        }


        session(['password' => $validated['password']]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function findAvailableLeftSlot($downlineUser)
    {
        if ($downlineUser->left_user_id === null) {
            return 'left';
        } else {
            $leftUser = User::find($downlineUser->left_user_id);
            if ($leftUser) {
                return $this->findAvailableLeftSlot($leftUser);
            } else {
                return null;
            }
        }
    }

    // Function to find an available slot in the downline's right side
    public function findAvailableRightSlot($downlineUser)
    {
        if ($downlineUser->right_user_id === null) {
            return 'right';
        } else {
            $rightUser = User::find($downlineUser->right_user_id);
            if ($rightUser) {
                return $this->findAvailableRightSlot($rightUser);
            } else {
                return null;
            }
        }
    }
}
