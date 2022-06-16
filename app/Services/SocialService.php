<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialService implements Social
{

    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account');
            }
        } else {
            //register here

            return route('register');
        }

        throw new ModelNotFoundException("Model Not Found");
    }
}
