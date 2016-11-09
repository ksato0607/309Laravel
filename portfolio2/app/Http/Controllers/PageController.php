<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class PageController extends Controller
{
    public function home(){
      $databaseResult = DB::table('tblImages')->get();
      return view('portfolio',['database' => $databaseResult]);
    }

    public function databasePost()
    {
      if(isset($_REQUEST["url"]) &&isset($_REQUEST["message"])){
      DB::table('tblImages')->insert(['imageUrl' => $_REQUEST["url"], 'imageStory'=>$_REQUEST["message"]]);

        //return back();
        //return view('firebaseTest');
      }
    }

    public function imageUpload()
    {
    	return view('image-upload');
    }

    public function test(){
      return view('firebaseTest');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
    public function imageUploadPost(Request $request)
    {
      return view('firebaseTest');

    	// $this->validate($request, [
      //       'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //   ]);
      //
      //   $imageName = time().'.'.$request->image->getClientOriginalExtension();
      //   //$request->image->move(public_path('images'), $imageName);
      //
      //   // "<script>
      //   // var storageRef = firebase.storage().ref('test2/' + $imageName);
      //   // storageRef.put($request->image);
      //   // storageRef.getDownloadURL().then(function(url) {
      //   //   var imageUrl = url;
      //   //   console.log(imageUrl);
      //   //   });
      //   // </script>";
      //
    	// return back()
    	// 	->with('success','Image Uploaded successfully.');
    	// 	//->with('path',$imageName);
    }
}
