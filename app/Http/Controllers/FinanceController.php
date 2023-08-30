<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FinanceController extends Controller
{

    public function get(Request $request): View
    {
        $withdrawRequests = WithdrawRequest::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();

        return view('finance', [
            'user' => $request->user(),
            'withdrawRequests' => $withdrawRequests,
        ]);
    }

    public function requestWithdraw(Request $request)
    {
        if($request->user()->coin >= 50000) {

            WithdrawRequest::create([
                'user_id' => $request->user()->id,
                'amount' => $request->user()->coin,
                'wallet' => $request->user()->wallet,
                'processed' => false,
                'created_at' => now(),
            ]);

            $request->user()->coin = 0;
            $request->user()->save();
        }
        return redirect()->route('finance');
    }
    // /**
    //  * Display the user's profile form.
    //  */
    // public function edit(Request $request): View
    // {
    //     return view('finance', [
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
