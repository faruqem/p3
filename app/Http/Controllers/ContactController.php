<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class ContactController extends Controller
{
    public function index()
    {
       return view('contact');
    }
}
