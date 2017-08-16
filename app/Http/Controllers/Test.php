<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class Test extends Controller
{
    public function asd()
    {
        print_r('<br>done<br>');
        print_r(config('auth.model') ?: config('auth.providers.users.model'));
        //$users = User::all();
        $user = Auth::user();
        $id = Auth::id();
        //foreach ($users as $user) {
            print_r('<pre>');
            //print_r($user);
            print_r('</pre>');
            print_r('<br>');
            print_r($id);
        //}
        if (Auth::check()) {
            // The user is logged in...
            print_r('<br>logged in<br>');
        }
        print_r('<br>');
        $admin = User::role('admin')->get();
        print_r('<pre>');
        print_r($admin->first()->user_id);
        print_r('</pre>');
    }


    public function username()
    {
        return 'user_id';
    }
}
