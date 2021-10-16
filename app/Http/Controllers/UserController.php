<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
      return view('user.index', []);
    }
}
