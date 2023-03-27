<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as ContractsUser;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $getInfo = Socialite::driver('google')->user();
            $this->createUser($getInfo);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('home');
    }

    public function createUser(ContractsUser $user)
    {
        $userDB = User::where('provider_user_id', $user->provider_user_id)->first();
        if ($userDB) {
            Auth::login($user);
        } else {
            User::create([
                'name' => $user->user['name'],
                'email' => $user->user['email'],
                'password' => 'Unknown',
                'provider_user_id' => $user->user['sub'],
                'provider_id' => 'google',
                'avatar' => $user->user['picture']
            ]);
        }
    }
}
