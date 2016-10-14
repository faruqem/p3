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

    public function loremIpsum()
    {
       return view('page.loremIpsum');
    }

    public function randomUser()
    {
       return view('page.randomUser');
    }

    public function randomPassword()
    {
       return view('page.randomPassword');
    }

    public function permissionCalculator()
    {
       return view('page.permissionCalculator');
    }

    public function contact()
    {
       return view('page.contact');
    }
}
