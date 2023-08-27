<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class EnergyController extends Controller
{
    
    public function get(Request $request): View
    {
        return view('energy', [
            'user' => $request->user(),
            'energyTime' => Self::getEnergyAvailable($request),
        ]);
    }

    public function collect(Request $request)
    {
        $request->user()->energy += Self::getEnergyAvailable($request);
        $request->user()->energy_collect_at = now();
        $request->user()->save();

        return redirect()->route('energy');
    }

    public function getEnergyAvailable(Request $request) {
        $date = Carbon::parse($request->user()->energy_collect_at);
        $now = now();

        $mins = $date->diffInMinutes($now, true);
        if($mins * 2 >= $request->user()->energy_limit) {
            $mins = $request->user()->energy_limit;
        } else {
            $mins *= 2;
        }
        return $mins;
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
