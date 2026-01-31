<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Two\GoogleProvider;
class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()
        ->redirect();
    }

   public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google') ->stateless()->user();
    // $googleUser = Socialite::driver('google')
    // ->stateless()
    // ->setHttpClient(new \GuzzleHttp\Client([
    //     'verify' => false,
    // ]))
    // ->user();


    $user = User::firstOrCreate(
        ['email' => $googleUser->email],
        [
            'name' => $googleUser->name,
            'password' => Hash::make('12345678'),
            'role_id' => 3,      // teacher
            'is_admin' => false,
              'email_verified_at' => now(),
            
          
        ]
    );

    Auth::login($user);

    
    if ($user->is_admin) {
        return redirect('/admin/dashboard');
    }

    if ($user->role->name === 'teacher') {
        return redirect('/teacher/dashboard');
    }

    return redirect('/student/dashboard');
}

}


