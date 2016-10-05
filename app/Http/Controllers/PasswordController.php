<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class PasswordController extends Controller
{
    public function index()
    {
       return view('password');
    }

    public function create()
    {
       return view('createPassword');
    }
}
