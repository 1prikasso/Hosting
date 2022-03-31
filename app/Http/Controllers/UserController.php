<?php

namespace App\Http\Controllers;

use App\Http\Requests\Userrequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Session;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login_store(Request $request, User $user)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $email = $credentials['email'];
        $password = $credentials['password'];

        $user = User::where('email', $email)->where('password', $password)->first();

        if ($user) {
            Auth::login($user);
    
            return redirect()->route('articles.index');
        }else{

            return redirect()->route('user.login')->withSuccess('Login details are not valid');

        }
        

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrUser $useration()
    {
        return view('registration');
    }

    public function registration_store(Userrequest $request)
    {
        User::create($request->only(['name', 'email', 'password']));
        
        return redirect()->route('user.login');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(User $user)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('user.login');
    }
}
