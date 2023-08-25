<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class GameController extends Controller
{

    public function get(Request $request): View
    {
        return view('game', [
            'user' => $request->user(),
            'energy' => 10,
            'reward' => 10,
            'timeLeft' => Carbon::parse($request->user()->travel_start_at)->addMinutes(5),
        ]);
    }

    public function travel(Request $request)
    {
        if($request->user()->energy >= 10 && Carbon::parse($request->user()->travel_start_at)->diffInMinutes(now(), true) >= 5) {
            $request->user()->experience += 10;
            $request->user()->coin += 10;
            $request->user()->energy -= 10;

            $request->user()->travel_start_at = now();

            GameController::checkLevel($request);

            $request->user()->save();

        }
        return redirect()->route('game');
    }

    public function checkLevel(Request $request) {
        if((($request->user()->level * 10) + 100) == $request->user()->experience) {
            $request->user()->level += 1;
            $request->user()->points += 1;
            $request->user()->experience = 0;
        };
    }

    // /**
    //  * Display the user's profile form.
    //  */
    // public function edit(Request $request): View
    // {
    //     return view('leaderboard', [
    //         'user' => $request->user(),
    //     ]);
    // }

    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**
    //  * Delete the user's account.
    //  */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
