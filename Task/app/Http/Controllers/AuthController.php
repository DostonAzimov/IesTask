<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $role = new Role();
        $role->title = '1';
        $role->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        $user->save();

        $role_user = new RoleUser();
        $role_user->user_id = $user->id;
        $role_user->role_id = $user->role_id;
        $role_user->save();

        $token = $user->createToken('API Token')->plainTextToken;
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully register',
            'data' => $token
        ], $code);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully logout',
        ], $code);
    }

    public function login(UserPostRequest $request)
    {
       if (!Auth::attempt($request))
       {
           return $this->error('Credential not match',401);
       }
        $token = auth()->user()->createToken('API Token')->plainTextToken;
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully login',
            'data' => $token
        ], $code);
    }


}
