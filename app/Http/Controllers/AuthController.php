<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request)
  {
    return view('login', []);
  }

  public function loginUser(Request $request){
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $data = [
        'name'     => $request->input('username'),
        'password'  => $request->input('password'),
    ];
    // dd($data);
    Auth::attempt($data);
    if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //Login Success
        return redirect('/penelitians');

    } else { // false

        //Login Fail
        Session::flash('error', 'Email atau password salah');
        return redirect('/login');
    }
}

public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('login');
    }
}
