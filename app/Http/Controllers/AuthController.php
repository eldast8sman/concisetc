<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc');
        if($users->count() > 0){
            return response([
                'status' => 'success',
                'message' => 'Users fetched successfully',
                'data' => $users->get()
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No User fetched',
                'data' => []
            ], 404);
        }
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            return response([
                'status' => 'success',
                'message' => 'User fetched successfully',
                'data' => $user
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Admin found',
                'data' => []
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string'
        ]);
        if(empty($data['password'])){
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::find($id);
        $user->update($data);

        return response([
            'status' => 'success',
            'message' => 'User Edited Successfully',
            'data' => $user
        ], 200);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response([
            'status' => 'success',
            'message' => 'User deleted successfully',
            'data' => $user
        ], 200);
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|string'
            ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        if($user){
            $token = $user->createToken('main')->plainTextToken;
            $user->token = $token;
            return response([
                'status' => 'success',
                'message' => 'Admin created successfully',
                'data' => $user
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'There was an error in registering the Admin'
            ], 500);
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if(Auth::attempt($credentials, $remember)){
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
            $user->token = $token;
            return response([
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $user
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'The Provided credentials are not correct'
            ], 404);
        }
    }

    public function logout(){
        /** @var User $user */
        $user = Auth::user();
        //revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return response([
            'status' => 'success',
            'message' => 'Logout successful'
        ], 200);
    }
}
