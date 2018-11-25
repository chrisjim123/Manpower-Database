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

    public function uploadmanpower()
    {
        return view('manpower/uploadmanpower');
    }


        public function addnewmanpowerrecord(Request $request)
    {

        //create new record
        $firstname = $request->input('first_name');
        $middlename = $request->input('middle_name');
        $lastname = $request->input('last_name');
        $email = $request->input('email');
        $address = $request->input('address');
        $contact = $request->input('mobile');
        date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");

        $data = array('firstname'=>$firstname,"middlename"=>$middlename,"lastname"=>$lastname,"email"=>$email,"address"=>$address,"contact"=>$contact,"created_at"=>$time,"updated_at"=>$time);
        db::table('manpower')->insert($data);

        session()->flash('status', 'New Manpower has been Successfully Added.');
        return redirect('/home');
  
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

    public function governinfo($id)
    {
        $person =DB::table('manpower')->find($id);
        if ($person == true) {
            return view('manpower.governinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }

    public function companyinfo($id)
    {
        $person =DB::table('manpower')->find($id);
        if ($person == true) {
            return view('manpower.companyinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }


    public function projectinfo($id)
    {
        $person =DB::table('manpower')->find($id);
        if ($person == true) {
         
            return view('manpower.projectsinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }

    
    public function others($id)
    {
        $person =DB::table('manpower')->find($id);
        if ($person == true) {
            return view('manpower.others', compact('person'));
        }else{
             return redirect('/home');
        }
    }


}
