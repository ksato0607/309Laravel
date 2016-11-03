<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home(){
      return view('googleMap');
    }

    public function sample(){
      return view('welcome');
    }


}
