<?php

namespace App\Http\Controllers;

use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate extends Controller
{

    public function index()
    {
        return view("public/login");
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            "username" => "required",
            "password" => "required"
        ]);

        // $user = $request->only('username', 'password');
        $username = strtolower($request->username);
        if (Auth::attempt(['username' => $username, "password" => $request->password])) {


            return redirect()->intended('/admin/dashboard')->with('success', "You are now logged in.");
        } else {
            return redirect()->back()
                ->withInput()
                ->with("error", trans('auth.failed'));
        }
    }

    public function contact()
    {
        $header = request()->header('Form');

        if($header) {
            return "OK";
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        Auth::logout();

        return redirect('login')->with('success', "You are now signed out.");
    }
}
