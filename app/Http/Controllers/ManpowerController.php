<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Manpower;
use Session;
use Excel;
use File;


/*// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';*/

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;




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

    public function exportrecord()
    {
        return view('manpower/exportrecord');
    }


    public function sendsms(Request $request)
    {
        $SmsId = rand();
        $cellnum = "09196393274";
        $msg = $request->input('message');


/*         $clientId = '2846ee791ac97e49b2811f806b6d51dad4ccef29136e86e43a4087c2aa99d32f';
         $secretKey = 'c9c9881c85e5627e3986c6620cdf815405e1af2fc2c004977e9fce08aafe45c0';
         $shortCode = '29290782';

        $chikkaAPI = new ChikkaSMS($clientId,  $secretKey,  $shortCode);
        $response = $chikkaAPI->sendText($SmsId, $cellnum, $msg);

        session()->flash('status', 'Message has been Successfully Sent.');
        return redirect('/home');

*/



// Your Account SID and Auth Token from twilio.com/console
//LIVE CREDENTIALS
/*$sid = 'ACd74c237fd7a890b66ab635e970028f9';
$token = '36274b9fccbc6d540bb9d3d3c08b8b64';*/

//TEST CREDENTIALS
$sid = 'AC39034e8a4dec37ce307ed0a3236ff4e';
$token = '5598f595598d8b002034b352f8044915';

$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    $cellnum,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '09196393274',
        // the body of the text message you'd like to send
        'body' => $msg
    )
);



        session()->flash('status', 'Message has been Successfully Sent.');
        return redirect('/home');



    }


    public function addnewmanpowerrecord(Request $request)
    {

        //create new record
        $firstname = $request->input('first_name');
        $middlename = $request->input('middle_name');
        $lastname = $request->input('last_name');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $placeofbirth = $request->input('placeofbirth');
        $email = $request->input('email');
        $address = $request->input('address');
        $contact = $request->input('mobile');
        date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");

        $data = array('firstname'=>$firstname,"middlename"=>$middlename,"lastname"=>$lastname,"birthdate"=>$birthdate,"place_of_birth"=>$placeofbirth,"email"=>$email,"address"=>$address,"contact"=>$contact,"created_at"=>$time,"updated_at"=>$time,"gender"=>$gender);
        db::table('manpower')->insert($data);

        session()->flash('status', 'New Record has been Successfully Added.');
        return redirect('/home');
  
    }


     



//Importing Records From Excel to Database


     public function doimport(Request $request)
    {

           date_default_timezone_set("Asia/Manila");
           $time = date("Y-m-d h:i");

     //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
     
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
     
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){
     
                foreach ($data as $key => $value) {
                    $insert[] = [
                    'firstname' => $value->firstname,
                    'middlename' => $value->middlename,
                    'lastname' => $value->lastname,
                    'birthdate' => $value->birthdate,
                    'place_of_birth' => $value->placeofbirth,
                    'email' => $value->email,
                    'address' => $value->address,
                    'contact' => $value->contact,
                    'created_at' => $time,
                    'updated_at' => $time,
                    'gender' => $value->gender,
                    ];
                }
 
                if(!empty($insert)){
 
                    $insertData = DB::table('Manpower')->insert($insert);
                    if ($insertData) {
                         session()->flash('status', 'New Data has successfully imported.');
                          return back();
                    }else {                        

                        session()->flash('status', 'Error inserting the data..');
                         return back();
                    }
                }
            }
 
            return back();
 
        }else {

            session()->flash('status', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
             return back();
        }
    }


    }



    




//Exporting Record


  public function index()
    {
     $customer_data = DB::table('manpower')->get();
     return view('export_excel')->with('manpower_data', $customer_data);
    }

    public function xls()
    {
     $manpower_data = DB::table('manpower')->get()->toArray();
     $manpower_array[] = array('firstname', 'middlename', 'lastname', 'birthdate', 'place_of_birth', 'email', 'address', 'contact', 'created_at', 'updated_at', 'gender');
     foreach($manpower_data as $manpower)
     {
      $manpower_array[] = array(

                    'firstname' => $manpower->firstname,
                    'middlename' => $manpower->middlename,
                    'lastname' => $manpower->lastname,
                    'birthdate' => $manpower->birthdate,
                    'place_of_birth' => $manpower->place_of_birth,
                    'email' => $manpower->email,
                    'address' => $manpower->address,
                    'contact' => $manpower->contact,
                    'created_at' => $manpower->created_at,
                    'updated_at' => $manpower->updated_at,
                    'gender' => $manpower->gender
      );
     }
     Excel::create('manpower Data', function($excel) use ($manpower_array){
      $excel->setTitle('manpower Data');
      $excel->sheet('manpower Data', function($sheet) use ($manpower_array){
      $sheet->fromArray($manpower_array, null, 'A1', false, false);
      });
     })->download('xls');
    }

  public function xlsx()
    {
     $manpower_data = DB::table('manpower')->get()->toArray();
     $manpower_array[] = array('firstname', 'middlename', 'lastname', 'birthdate', 'place_of_birth', 'email', 'address', 'contact', 'created_at', 'updated_at', 'gender');
     foreach($manpower_data as $manpower)
     {
      $manpower_array[] = array(

                    'firstname' => $manpower->firstname,
                    'middlename' => $manpower->middlename,
                    'lastname' => $manpower->lastname,
                    'birthdate' => $manpower->birthdate,
                    'place_of_birth' => $manpower->place_of_birth,
                    'email' => $manpower->email,
                    'address' => $manpower->address,
                    'contact' => $manpower->contact,
                    'created_at' => $manpower->created_at,
                    'updated_at' => $manpower->updated_at,
                    'gender' => $manpower->gender
      );
     }
     Excel::create('manpower Data', function($excel) use ($manpower_array){
      $excel->setTitle('manpower Data');
      $excel->sheet('manpower Data', function($sheet) use ($manpower_array){
      $sheet->fromArray($manpower_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }

  public function csv()
    {
     $manpower_data = DB::table('manpower')->get()->toArray();
     $manpower_array[] = array('firstname', 'middlename', 'lastname', 'birthdate', 'place_of_birth', 'email', 'address', 'contact', 'created_at', 'updated_at', 'gender');
     foreach($manpower_data as $manpower)
     {
      $manpower_array[] = array(

                    'firstname' => $manpower->firstname,
                    'middlename' => $manpower->middlename,
                    'lastname' => $manpower->lastname,
                    'birthdate' => $manpower->birthdate,
                    'place_of_birth' => $manpower->place_of_birth,
                    'email' => $manpower->email,
                    'address' => $manpower->address,
                    'contact' => $manpower->contact,
                    'created_at' => $manpower->created_at,
                    'updated_at' => $manpower->updated_at,
                    'gender' => $manpower->gender
      );
     }
     Excel::create('manpower Data', function($excel) use ($manpower_array){
      $excel->setTitle('manpower Data');
      $excel->sheet('manpower Data', function($sheet) use ($manpower_array){
      $sheet->fromArray($manpower_array, null, 'A1', false, false);
      });
     })->download('csv');
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
