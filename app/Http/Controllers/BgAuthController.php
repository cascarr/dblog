<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;

class BgAuthController extends Controller
{
    //
    public function index() {

        if(Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function customLogin(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }

        return redirect('login')->withSuccess('Login details are not valid');
    }

    public function registration() {

        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.registration');
    }

    public function customRegistration(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('/login')->withSuccess('have signed-in');
    }

    public function create(array $data) {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function homepage() {

        if (Auth::check()) {

            return view('blog.index');
        }

        return redirect('login')->withSuccess('are not allowed to access');
    }

    public function signOut() {

        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
