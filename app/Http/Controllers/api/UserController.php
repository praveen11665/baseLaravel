<?php

namespace App\Http\Controllers\api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
    }

    public function user_get() 
    {
        $user = User::all();   
        return response()->json(['data' => $user,
            'status' => Response::HTTP_OK]);
    }

    public function user_post(Request $request)
    {
        if($request->name && $request->email && $request->password)
        {
            $crateUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['msg' => 'User created successfully', 'data' => $crateUser,
            'status' => Response::HTTP_OK]);
        }else
        {
            return response()->json(['msg' => 'Please given name or email or password',
            'status' => Response::HTTP_NOT_FOUND]);
        }
    }
}
