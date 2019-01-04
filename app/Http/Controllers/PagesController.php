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
use Album;

class PagesController extends Controller
{
   
    public function welcome()
 	{
 		$result =DB::table('banner')->paginate(25);
        return view('welcome', ["data"=>$result]);
/* 		return view('welcome');*/
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
       	else{
       		$result =DB::table('manpower')->paginate(25);
        	return view('home', ["data"=>$result]);
       	}
 	}

 	public function destroy($id) {
      DB::delete('delete from manpower where id = ?',[$id]);
      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect('/home');
   }


 	public function destroyall(Request $request) {
 	  

/*if ( ! $request->has('selector')) {
    $checkboxValue = $request->input('selector');
    echo  $checkboxValue;
 }
*/

/* 	 $id=$request->input('selector');*/

 
/*	 $key = count($id);
*/	//multi delete using checkbox as a selector
	
/*
	if($key	<> 0){
	for($i=0;$i<$key;$i++){

      DB::delete('delete from manpower where id = ?',$id[$i]);
      
      session()->flash('status', 'Records deleted Successfully.');
      return redirect('/home');
      	}
	}else{
	  session()->flash('status', 'Please select record to be deleted.'.$key);
      return redirect('/home');
	}
*/
   	}






}
