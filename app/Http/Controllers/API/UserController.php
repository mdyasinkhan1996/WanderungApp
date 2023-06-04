<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Auth;
use Validator;

class UserController extends Controller
{
    public function RegisterUser(Request $request): Response
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){

            return Response(['message' => $validator->errors()],401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->email_verified_at = Carbon::now();
        $user->save();
        $success =  $user->createToken('MyApp')->plainTextToken;

        return Response(['token' => $success],200);

    }
    public function loginUser(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return Response(['message' => $validator->errors()],401);
        }

        if(Auth::attempt($request->all())){

            $user = Auth::user();

            $success =  $user->createToken('MyApp')->plainTextToken;

            return Response(['token' => $success],200);
        }

        return Response(['message' => 'email or password wrong'],401);
    }


    public function userDetails(): Response
    {
        if (Auth::check()) {

            $user = Auth::user();

            return Response(['data' => $user],200);
        }

        return Response(['data' => 'Unauthorized'],401);
    }

    /**
     * Display the specified resource.
     */
    public function logout(): Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();

        return Response(['data' => 'User Logout successfully.'],200);
    }
}
