<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->is_admin) {
            return redirect('/admin/dashboard');
        } elseif ($user->role->name === 'teacher') {
            return redirect('/teacher/dashboard');
        } else {
            return redirect('/student/dashboard');
        }
    }
}
