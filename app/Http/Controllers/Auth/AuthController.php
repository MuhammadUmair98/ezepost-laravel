<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;
use App\Http\Requests\SignupStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(LoginStoreRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return Redirect::to('/');
        }
        return Redirect::back()->with(['error' => 'There is an authentication error']);
    }

    public function signup(SignupStoreRequest $request)
    {

        // Create the user
        $user = new User([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'is_organization' => $request->input('isOrganization'),
            'user_type' => UserType::TYPE_CUSTOMER, // Assuming 'customer' is a valid UserType
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone')
        ]);

        $user->save();

        // Log the user in
        Auth::login($user);
        return Redirect::to('/');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect::to('/');
    }
}
