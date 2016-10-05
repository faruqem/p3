<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class PermissionController extends Controller
{
    public function index()
    {
       return view('permission');
    }

    public function create()
    {
       return view('createPermission');
    }
}
