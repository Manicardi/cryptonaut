<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LeaderboardController extends Controller
{

    public function get(Request $request): View
    {
        $levelList = User::orderBy('level', 'desc')->orderBy('experience', 'desc')->limit(100)->get();
        $travelList = User::orderBy('total_travel', 'desc')->limit(100)->get();
        $referralList = Referral::groupBy('referral_name')->orderBy(\DB::raw('count(referral_name)'), 'DESC')->limit(100)->get(['referral_name', \DB::raw('count(referral_name) as count')]);

        return view('leaderboard', [
            'user' => $request->user(),
            'levelList' => $levelList,
            'travelList' => $travelList,
            'referralList' => $referralList,
        ]);
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
