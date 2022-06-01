<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function dashboard()
    {
        $data = [];

        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        } 

        return view('dashboard', compact('data'));
    }

    public function registerUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $result = $user->save();

        if ($result)
        {
            return back()->with('success', 'You have registerd successfuly');
        } else {
            return back()->with('fail', 'Something wrong');
        }

    }

    public function loginUser(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);
        

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            $check_password = Hash::check($request->password, $user->password);
            if ($check_password) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            } else {
                return back()->with('fail', 'Something wrong');
            }

        } else {
            return back()->with('fail', 'Email or password not correct');
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }

}
