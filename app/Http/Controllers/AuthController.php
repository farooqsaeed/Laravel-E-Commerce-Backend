<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{    
    /**
     * login
     *
     * @return void
     */
    public function login(LoginRequest $request) 
    {
        $credentials = $request->all();

        $user = User::where('email', $request->input('email'))->first();

        if(empty($user)) {

            return $this->errorResponse(
                'The provided credentials do not match our records.'
            );

        }

        if(!Auth::attempt($credentials)) {
            return $this->errorResponse(
                'You have entered invalid credentials.'
            );
        }

        // Generate a Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;
        
        $data['token'] = $token;
        $data['user'] = $user;

        return $this->successResponse(
            $data,
            'user logged in successfully'
        );
        
    }
    
    /**
     * register
     *
     * @return void
     */
    public function register(UserRequest $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal_code'),
        ]);

        // Create a Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        $data['token'] = $token;
        $data['user'] = $user;

        return $this->successResponse(
            $data,
            'user registered successfully'
        );
    }
    
    /**
     * logout
     *
     * @return void
     */
    public function logout() 
    {
        // Get the currently authenticated user's token
        $user = Auth::user();

        // Delete the token associated with the user
        $user->currentAccessToken()->delete();

        return $this->simpleSuccessResponse(
            'Logged out successfully'
        );
    }
}
