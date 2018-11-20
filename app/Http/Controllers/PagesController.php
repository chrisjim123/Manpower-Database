<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
   
    public function welcome()
 	{
 		return view('welcome');
 	}

 	public function home()
 	{
 		$result =DB::table('manpower')->paginate(2);
        return view('home', ["data"=>$result]);
 	}

}
