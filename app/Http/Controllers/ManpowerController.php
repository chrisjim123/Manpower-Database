<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Manpower;
use App\ChikkaSMS;
use Excel;


class ManpowerController extends Controller
{

    public function createsms()
    {
        return view('messaging/sendsmstoall');
    }

    public function addmanpower()
    {
    	return view('manpower/addnewmanpower');
    }

    public function uploadmanpower()
    {
        return view('manpower/uploadmanpower');
    }



    public function sendsms(Request $request)
    {
        $SmsId = rand();
        $cellnum = "09196393274";
        $msg = $request->input('message');


         $clientId = '2846ee791ac97e49b2811f806b6d51dad4ccef29136e86e43a4087c2aa99d32f';
         $secretKey = 'c9c9881c85e5627e3986c6620cdf815405e1af2fc2c004977e9fce08aafe45c0';
         $shortCode = '29290782';

        $chikkaAPI = new ChikkaSMS($clientId,  $secretKey,  $shortCode);
        $response = $chikkaAPI->sendText($SmsId, $cellnum, $msg);

        session()->flash('status', 'Message has been Successfully Sent.');
        return redirect('/home');
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

        session()->flash('status', 'New Record has been Successfully Added.');
        return redirect('/home');
  
    }


     public function doimport(Request $request)
    {


           date_default_timezone_set("Asia/Manila");
           $time = date("Y-m-d h:i");



        if($request->hasFile('upload_file')){
            $path = $request->file('upload_file')->getRealPath();


            $data = Excel::load($path, function($reader) {})->get();


            if(!empty($data) && $data->count()){


                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['firstname' => $v['firstname'], 'middlename' => $v['middlename'], 'lastname' => $v['lastname'], 'email' => $v['email'], 'address' => $v['address'], 'contact' => $v['contact']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Manpower::insert($insert);
                    //return back()->with('success','Insert Record successfully.');
                    //session()->flash('status', 'New Records has been Successfully Added.');
                    //return redirect('/home');
        
                }


            }


        }


        //return back()->with('error','Please Check your file, Something is wrong there.');

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
