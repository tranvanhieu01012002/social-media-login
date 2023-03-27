<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as ContractsUser;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $getInfo = Socialite::driver('facebook')->user();
            $this->createUser($getInfo);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('home');
    }

    public function createUser(ContractsUser $user)
    {
        $userDB = User::where('provider_user_id', $user->id)->first();
        if ($userDB) {
            Auth::login($userDB);
        } else {
            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => 'Unknown',
                'provider_user_id' => $user->id,
                'provider_id' => 'facebook',
                'avatar' => $user->avatar
            ]);
        }
    }
}
