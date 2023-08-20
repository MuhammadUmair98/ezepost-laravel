<?php

namespace App\Services\User;

use App\Enums\UserType;

class UserService
{

    public function getLandingPath(): string
    {
        $auth_user = auth()->user();

        if (isset($auth_user)) {
            if ($auth_user->user_type == UserType::TYPE_ADMIN) {
                return '/admin/dashboard';
            } else {
                return '/customer/dashboard';
            }
        }
        return '/home';
    }
}
