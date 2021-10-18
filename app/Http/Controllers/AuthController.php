<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    public function index(Request $request)
  {
    return view('login', []);
  }

  public function register(Request $request)
  {
    return view('register', []);
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

    public function createUser(Request $request){
        // dd($request->mitra);
        // $request->validate([
        //     'first_name' => 'required',
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        if(isset($request->mitra)){
            $role=2;
        }else{
            $role=1;
        }

        $createdUser = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $id =  DB::table('users')->latest('created_at')->first();

        if($createdUser){
            Mahasiswa::create([
                'user_id' => $id->id,
                'nama' => $request->nama,
                'nim' => $request->nim,
                'ttl' => $request->ttl,
                'alamat' => $request->alamat,
                'sekolah' => $request->sekolah,
                'tahun' => $request->tahun,
                'prodi' => $request->prodi,
            ]);
        }
        return redirect('/login')
        ->with('success', 'Project created successfully.');
    }
}
