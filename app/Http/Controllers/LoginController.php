<?php

namespace App\Http\Controllers;

use App\Pedagang;
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
        return back()->with('message', 'Upaya untuk masuk gagal!');
    }

    public function viewLoginPedagang(){
        return view('auth.login-pedagang');
    }
    public function authenticatePedagang(Request $request){
        $request_validate = [
            'nik' => 'required|min:16',
            'kataSandi' => 'required|min:5'
        ];

        $credentials = $request->validate($request_validate);

        if(Pedagang::login($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->with('loginFailed', 'Upaya untuk masuk gagal!');
    }

    public function logout(){
        request()->session()->flush();
        return redirect()->route('home');
    }
}
