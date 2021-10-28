<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
      return view('user.index', []);
    }

    public function show(Request $request)
    {
      $data = DB::table('users')
      ->join('mahasiswas', 'users.id', '=', 'mahasiswas.user_id')
      ->select('users.*', 'mahasiswas.*')
      ->where('users.id', '=', Auth::user()->id)
      ->first();
      // dd($data);
      return view('user.show', ['model' =>$data]);
    }

    public function edit(Request $request)
    {
      $data = DB::table('users')
      ->join('mahasiswas', 'users.id', '=', 'mahasiswas.user_id')
      ->select('users.*', 'mahasiswas.*')
      ->where('users.id', '=', Auth::user()->id)
      ->first();
      // dd($data);
      return view('user.add', ['model' =>$data]);
    }

    public function update(Request $request, $id) {
      $mahasiswa = Mahasiswa::find($id);
      $mahasiswa->update($request->all());
      return redirect('/user');
  
  }
}
