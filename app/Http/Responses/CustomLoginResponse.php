<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        
        if ($user->is_admin || $user->role_id == 1) {
            return redirect()->to('/admin/dashboard');
        }

        
        if ($user->role_id == 3) {
            return redirect()->to('/teacher/dashboard');
        }

        
        if ($user->role_id == 2) {
            return redirect()->to('/student/dashboard');
        }

        return redirect('/');
    }
}
