<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\User;
use Socialite;
use Auth;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
      return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback()
    {
      try {
        $user = Socialite::driver($provider)->user();
      } catch (\Exception $e) {
        return redirect('/login');
      }

      $authUser = $this->findOrCreateUser($user, $provider);

      Auth::login($authUser, true);

      return redirect('/home');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
      $account = SocialAccount::where('provider_name'. $provider)
        ->where('provider_id', $socialUser->get())
        ->first();

      if ($account) {
        return $account->user;
      } else {
        $user = User::where('email', $socialUser->getEmail())->first();
        if (! $user) {
          $user = User::create([
            'email' => $socialUser->getEmail(),
            'name' => $socialUser->getName(),
          ]);

          $user->accounts()->create([
            'provider_name' => $provider,
            'provider_id' => $socialUser->getId(),
          ]);

          return $user;
        }
      }
    }
}
