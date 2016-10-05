<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class LoremIpsumController extends Controller
{
    public function index()
    {
       return view('loremIpsum');
    }

    public function create()
    {
       return view('createLoremIpsum');
    }
}
