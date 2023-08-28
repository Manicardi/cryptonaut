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
            'timeLeft' => Carbon::parse($request->user()->travel_start_at)->addMinutes($request->user()->travel_time),
        ]);
    }

    public function travel(Request $request)
    {
        if($request->user()->energy >= 10 && Carbon::parse($request->user()->travel_start_at)->diffInMinutes(now(), true) >= 5) {
            $request->user()->experience += 10;
            $request->user()->coin += $request->user()->travel_coin;
            $request->user()->energy -= $request->user()->travel_energy;

            Self::travels($request);
            Self::checkLevel($request);

            $request->user()->travel_start_at = now()->subSeconds($request->user()->travel_point * 2);

            $request->user()->save();

        }
        return redirect()->route('game');
    }

    public function skipTravel(Request $request) {
        if($request->user()->coin >= 2) {
            $request->user()->travel_start_at = now()->subSeconds($request->user()->travel_point * 2);
            $request->user()->coin -= 2;
            Self::travels($request);
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

    public function travels(Request $request) {
        $travel = rand(1, 4);
        $mission = Self::getMission($travel);

        $request->user()->travel_coin = $mission[0];
        $request->user()->travel_time = $mission[1];
        $request->user()->travel_energy = $mission[2];
    }

    static public function getMission($mission) {
        $missionStats = [];
        if($mission == 1) {
            $missionStats[0] = 5;
            $missionStats[1] = 5;
            $missionStats[2] = 10;
        } else if($mission == 2) {
            $missionStats[0] = 7;
            $missionStats[1] = 8;
            $missionStats[2] = 20;
        } else if($mission == 3) {
            $missionStats[0] = 10;
            $missionStats[1] = 12;
            $missionStats[2] = 30;
        } else {
            $missionStats[0] = 12;
            $missionStats[1] = 15;
            $missionStats[2] = 40;
        }
        
        return $missionStats;
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
