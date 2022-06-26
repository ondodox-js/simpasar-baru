<?php

namespace App\Http\Controllers;

use App\Services\Admin\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $request_validate = [
            'namaPengguna' => 'required|min:5',
            'kataSandi' => 'required|min:5'
        ];

        $credentials = $request->validate($request_validate);

        if(Admin::loginAdmin($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }
        return back()->with('loginFailed', 'Upaya untuk masuk gagal!');
    }

    public function logout(){
        Admin::logout();
        return redirect()->intended('masuk');
    }
}
