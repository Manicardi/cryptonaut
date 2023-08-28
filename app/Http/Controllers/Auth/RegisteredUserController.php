<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Referral;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\GameController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function get(): View
    {
        return view('auth.register', [
            'referral' => '',
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:15', 'min:3', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $mission = GameController::getMission(rand(1, 4));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 1,
            'experience' => 0,
            'points' => 1,
            'coin' => 0,
            'energy' => 0,
            'energy_limit' => 100,
            'travel_start_at' => now()->subMinutes(5),
            'energy_collect_at' => now(),
            'travel_point' => 0,
            'energy_point' => 0,
            'travel_coin' => $mission[0],
            'travel_time' => $mission[1],
            'travel_energy' => $mission[2],
        ]);

        event(new Registered($user));

        Auth::login($user);

        if($request->referral) {
            $referralUser = User::where('id', $request->referral)->first();
            if($referralUser) {
                $user = $request->user();

                $user->energy += 100;
    
                Referral::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'created_at' => now(),
                    'referral_id' => $referralUser->id,
                ]);
                $referralUser->save();
                $user->save();
            }
            
        }

        return redirect(RouteServiceProvider::HOME);
    }
}