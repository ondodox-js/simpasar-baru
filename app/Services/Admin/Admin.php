<?php 
    namespace App\Services\Admin;

    class Admin {
        static $admin_user;
        static $admin_pass;

        public static function loginAdmin($request){
            self::init();

            if($request['namaPengguna'] === static::$admin_user && $request['kataSandi'] === static::$admin_pass){
                request()->session()->push('admin.status', true);
                return true;
            }
            return false;
        }

        public static function init(){
            self::$admin_user = config('admin.nama_pengguna');
            self::$admin_pass = config('admin.kata_sandi');
        }

        public static function cekLogin(){
            if(request()->session()->has('admin')){
                $session_login = request()->session()->get('admin.status')[0];
                return $session_login;
            }
            return false;
        }
    }