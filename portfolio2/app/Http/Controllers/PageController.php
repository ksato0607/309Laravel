<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home(){
      return view('pages.about');
    }

    public function about(){
      return "this is cool";
    }


}
