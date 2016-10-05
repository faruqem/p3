<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
       return view('user');
    }

    public function create()
    {
       return view('createUser');
    }
}
