<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home(){
      $databaseTest = DB::table('tblImages')->get();
      return view('portfolio',['database' => $databaseTest]);
    }

    public function sample(){
      return view('welcome');
    }
}
