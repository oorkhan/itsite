<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
}
