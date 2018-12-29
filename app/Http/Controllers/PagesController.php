<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Manpower;
use Session;
use Excel;
use File;

class PagesController extends Controller
{
   
    public function welcome()
 	{
 		return view('welcome');
 	}	

 	public function home()
 	{

 		$result =DB::table('manpower')->paginate(25);
        return view('home', ["data"=>$result]);
 	}


 	public function search(Request $request)
 	{
 
   		$search = Input::get('search');
        if($search != ''){
        	$data = Manpower::where('firstname', 'LIKE', '%'.$search.'%')
        					->orWhere('middlename', 'LIKE', '%'.$search.'%')
        					->orWhere('lastname', 'LIKE', '%'.$search.'%')
        					->paginate(5)
        					->setpath('');
            $data->appends(array('search' => Input::get('search'),));
			if(count($data)>0){
				return view('home')->withData($data);
			}	
			return view('home')->withMessage("No Results found!");
        }
        return view('home')->withMessage("No Results found!");
 	}



}
