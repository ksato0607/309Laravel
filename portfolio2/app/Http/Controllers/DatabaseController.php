<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DatabaseController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $databaseTest = DB::table('tblImages')->select('imageUrl')->get();
        return view('portfolio',['database' => $databaseTest]);
    }
}
