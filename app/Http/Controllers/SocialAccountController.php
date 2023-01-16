<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAccountController extends Controller
{
    public function redirectProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback($provider){
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        if(!$authUser->hasVerifiedEmail()){
            $authUser->markEmailAsVerified();
        }
        Auth::login($authUser, true);
        return redirect()->route('home');
    }

    private function findOrCreateUser($providerUser, $providerName){
        $social = SocialAccount::firstOrNew([
            'provider_id' => $providerUser->id,
            'provider' => $providerName
        ]);
        if($social->exists){
            return $social->user;
        }

        $user = User::firstOrNew([
            'email' => $providerUser->getEmail()
        ]);
        if (!$user->exists) {
            $user->name = $providerUser->getName();
            $user->password = bcrypt(Str::random(30));
            $user->save();
        }

        $social->user()->associate($user);
        $social->save();

        return $user;
    }
}
