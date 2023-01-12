<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        $data = User::get();
        return view('admin.index', compact('data'), ['title' => 'Admin | Dashboard', 'breadcrumb' => 'Dashboard']);
    }

    public function register()
    {
        return view('register', ['title' => 'Sign Up']);
    }

    public function postRegister(Request $request)
    {
        $request->validate(User::$rules);
        $req = $request->all();
        $req['password'] = Hash::make($request->password);
        $req['role'] = 'user';
        $user = User::create($req);

        if ($user) {
            return redirect('login')->with('success', 'Success Created New Account!');
        } else {
            return redirect('register')->with('failed', 'Failed Created New Account!');
        }
    }

    public function login()
    {
        return view('login', ['title' => 'Sign In']);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:dns',
            'password' => 'required|min:4'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        $cekPassword = Hash::check($password, $user->password);

        if ($cekPassword) {
            Session::put('user', $user->email);
            Session::put('user_id', $user->id);
            Session::put('user_role', $user->role);
            Session::put('user_name', $user->name);
            // dd(session('user_role'));
            return redirect('admin');
        } elseif (!$cekPassword) {
            return redirect('login')->with('failed', 'Email or password is wrong!');
        }
        return redirect('login')->with('failed', 'Failed to login!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login')->with('success', 'You are success to logged out!');
    }
}
