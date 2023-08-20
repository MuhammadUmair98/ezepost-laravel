<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public UserService $user_service;

    function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }


    public function showUserDashboard()
    {
        $get_landing_path = $this->user_service->getLandingPath();
        return Redirect::to($get_landing_path);
    }
}
