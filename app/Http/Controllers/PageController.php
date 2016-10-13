<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class PageController extends Controller
{
    public function home()
    {
       return view('page.home');
    }

    public function loremipsum()
    {
       return view('page.loremipsum');
    }

    public function user()
    {
       return view('page.user');
    }

    public function password()
    {
       return view('page.password');
    }

    public function permission()
    {
       return view('page.permission');
    }

    public function contact()
    {
       return view('page.contact');
    }
}
