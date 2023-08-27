<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PointsController extends Controller
{

    public function get(Request $request): View
    {
        return view('points', [
            'user' => $request->user(),
        ]);
    }

    public function addTravel(Request $request) {
        if($request->user()->points >= 1 && $request->user()->travel_point < 30) {
            $request->user()->points -= 1;
            $request->user()->travel_point += 1;

            $request->user()->save();
        }

        return redirect()->route('points');
    }

    public function addEnergy(Request $request) {
        if($request->user()->points > 0 && $request->user()->energy_point < 30) {
            $request->user()->points -= 1;
            $request->user()->energy_point += 1;
            $request->user()->energy_limit += 10;    

            $request->user()->save();
        }

        return redirect()->route('points');
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
