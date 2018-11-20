<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\Manpower;

class ManpowerController extends Controller
{
    public function addmanpower()
    {
    	return view('manpower/addnewmanpower');
    }

    public function personalinfo($id)
    {
    /*	$person = Manpower::find($id);*/
    	$person =DB::table('manpower')->find($id);
    	if ($person == true) {
    		return view('manpower.personalinfo', compact('person'));
    	}else{
   			 return redirect('/home');
    	}
  
    }

    public function educationinfo($id)	
    {
    	$person =DB::table('manpower')->find($id);
    	if ($person == true) {
    		return view('manpower.educationinfo', compact('person'));
    	}else{
   			 return redirect('/home');
    	}

    }

    public function governinfo()
    {
    	return view('manpower/governinfo');
    }

     public function companyinfo()
    {
    	return view('manpower/companyinfo');
    }


}
