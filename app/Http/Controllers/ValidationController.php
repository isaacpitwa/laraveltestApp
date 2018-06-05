<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function showform(){
        return view('login');
    }
    public function validateForm(Request $request){
  print_r($request ->all());

  $this -> validate($request,[
      'name'=>'required',
      'password'=>'required|max:4'
  ]);
    }
}
