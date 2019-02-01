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
use App\Masterfile;
use Session;
use Excel;
use File;


/*// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';*/

// Use the REST API Client to make requests to the Twilio REST API
/*use Twilio\Rest\Client;

*/


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

        //basic info
        $firstname = $request->input('first_name');
        $middlename = $request->input('middle_name');
        $lastname = $request->input('last_name');
        $gender = $request->input('gender');
        $birthdate = $request->input('birthdate');
        $placeofbirth = $request->input('placeofbirth');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('mobile');
        $religion = $request->input('religion');
        $civil_status = $request->input('civil_status');

        //educational
        $elementary_school = $request->input('elementary_school');
        $elem_school_year = $request->input('elem_school_year');
        $high_school = $request->input('high_school');
        $high_school_year = $request->input('high_school_year');
        $college_school = $request->input('college_school');
        $college_school_year = $request->input('college_school_year');

        //government
        $sss_number = $request->input('sss_number');
        $philhealth_number = $request->input('philhealth_number');
        $pagibig_number = $request->input('pagibig_number');
        $tin_number = $request->input('tin_number');

        //
        $emp_num = $request->input('emp_num');
        $card_num = $request->input('card_num');
        $company_name = $request->input('company_name');
        $company_address = $request->input('company_address');
        $company_phone = $request->input('company_phone');
        $company_email = $request->input('company_email');
        $position = $request->input('position');
        $date_hired = $request->input('date_hired');
        $status = $request->input('status');


        date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");




    if($_FILES['image']['type'] == 'image/jpg'){



    $image= ($_FILES['image']['tmp_name']);
    $max_resolution = '200';


    $original_image = imagecreatefromjpeg($image);

    //resolution
    $original_width = imagesx($original_image);
    $original_height = imagesy($original_image);

    //try
    $ratio = $max_resolution / $original_width;
    $new_width = $max_resolution;
    $new_height = $original_height*$ratio;

    //if not working
    if($new_height>$max_resolution){
      $ratio = $max_resolution / $original_height;
      $new_height = $max_resolution;
      $new_width = $original_width*$ratio;
    }

    if($original_image){

      $new_image = imagecreatetruecolor($new_width, $new_height);
      imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

      imagejpeg($new_image,$image,90);
    }


  
    }elseif ($_FILES['image']['type'] == 'image/png') {  


        session()->flash('status', 'Please select only .jpg file type.');
        return back();
       
    }


        $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $sourceProperties = getimagesize($image);
        $image= file_get_contents($image);
        $image= base64_encode($image);



         $data = array('lastname'=>$lastname,"firstname "=>$firstname,"middlename"=>$middlename,"gender"=>$gender,"birthdate"=>$birthdate,"placeofbirth"=>$placeofbirth,"phone"=>$phone,"email"=>$email,"location"=>$address,"religion"=>$religion,"civil_status"=>$civil_status,"elem_school"=>$elementary_school,"elemgrad"=>$elem_school_year,"highschool"=>$high_school,"hsgrad"=>$high_school_year,"college"=>$college_school,"collegegrad"=>$college_school_year,"sss"=>$sss_number,"phil"=>$philhealth_number,"pagibig"=>$pagibig_number,"tin"=>$tin_number,"employee_number"=>$employee_number,"card_number"=>$card_number,"company_name"=>$company_name, "company_address"=>$company_address,"company_tel"=>$company_phone,"company_email"=>$company_email,"position"=>$position, "datehired"=>$datehired,"emp_status"=>$status,"created_at"=>$time,"updated_at"=>$time,"imagename"=>$name,"imagefile"=>$image);
        db::table('masterfile')->insert($data);

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
     

              $name= 'default';
              $image= file_get_contents('defaultimage.png');
              $image= base64_encode($image);


                foreach ($data as $key => $value) {
                    $insert[] = [
                    'lastname' => $value->lastname,
                    'firstname' => $value->firstname,
                    'middlename' => $value->middlename,
                    'gender' => $value->gender,
                    'birthdate' => $value->birthdate,
                    'placeofbirth' => $value->placeofbirth,
                    'phone' => $value->phone,
                    'email' => $value->email,
                    'location' => $value->location,
                    'religion' => $value->religion,
                    'civil_status' => $value->civilstatus,
                    'elem_school' => $value->elemschool,
                    'elemgrad' => $value->syelemgrad,
                    'highschool' => $value->highschool,
                    'hsgrad' => $value->syhsgrad,
                    'college' => $value->college,
                    'collegegrad' => $value->sycollegegrad,
                    'sss' => $value->sss,
                    'phil' => $value->philhealth,
                    'pagibig' => $value->pagibig,
                    'tin' => $value->tin,
                    '' => $value->empoyeeno,
                    'card_number' => $value->cardnumber,
                    'company_name' => $value->companyname,
                    'company_address' => $value->region,
                    'company_tel' => $value->comptel,
                    'company_email' => $value->compemail,
                    'position' => $value->position,
                    'datehired' => $value->datehired,
                    'emp_status' => $value->employmentstatus,
                    'created_at' => $time,
                    'updated_at' => $time,
                    'imagename' => $name,
                    'imagefile' => $image,


                    ];
                }
 
                if(!empty($insert)){
 
                    $insertData = DB::table('masterfile')->insert($insert);
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


  /*   public function doimport(Request $request)
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
     

              $name= 'default';
              $image= file_get_contents('defaultimage.png');
              $image= base64_encode($image);


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
                    'imagefile' => $image,
                    'imagename' => $name,
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

*/

    




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
    	$person =DB::table('masterfile')->find($id);
    	if ($person == true) {
    		return view('manpower.personalinfo', compact('person'));
    	}else{
   			 return redirect('/home');
    	}
  
    }

    public function educationinfo($id)	
    {
    	$person =DB::table('masterfile')->find($id);
    	if ($person == true) {
    		return view('manpower.educationinfo', compact('person'));
    	}else{
   			 return redirect('/home');
    	}

    }

    public function governinfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
            return view('manpower.governinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }

    public function companyinfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
            return view('manpower.companyinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }


    public function projectinfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
         
            return view('manpower.projectsinfo', compact('person'));
        }else{
             return redirect('/home');
        }
    }

    
    public function others($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
            return view('manpower.others', compact('person'));
        }else{
             return redirect('/home');
        }
    }




        public function editpersonalinfo($id)
    {
    /*  $person = Manpower::find($id);*/
      $person =DB::table('masterfile')->find($id);
      if ($person == true) {
        return view('manpower.editpersonalinfo', compact('person'));
      }else{
         return redirect('/home');
      }
  
    }




/*
public function resize_image($image, $max_resolution){

  if(file_exists($image)){

    $original_image = imagecreatefrompng($image);

    //resolution
    $original_width = imagesx($original_image);
    $original_height = imagesy($original_image);

    //try
    $ratio = $max_resolution / $original_width;
    $new_width = $max_resolution;
    $new_height = $original_height*$ratio;

    //if not working
    if($new_height>$max_resolution){
      $ratio = $max_resolution / $original_height;
      $new_height = $max_resolution;
      $new_width = $original_width*$ratio;
    }

    if($original_image){

      $new_image = imagecreatetruecolor($new_width, $new_height);
      imagecopyresampled($new, $ori, 0, 0, 0, 0, $ne, $new, $original_width, $original_height);

      imagepng($new_image,$image,90);
    }

  }
}

*/


public function updateprofilepicture(Request $request,$id) {


      

  if (!empty($_FILES['image']['name'])) {




    if($_FILES['image']['type'] == 'image/jpg'){


    $image= ($_FILES['image']['tmp_name']);
    $max_resolution = '200';


    $original_image = imagecreatefromjpeg($image);

    //resolution
    $original_width = imagesx($original_image);
    $original_height = imagesy($original_image);

    //try
    $ratio = $max_resolution / $original_width;
    $new_width = $max_resolution;
    $new_height = $original_height*$ratio;

    //if not working
    if($new_height>$max_resolution){
      $ratio = $max_resolution / $original_height;
      $new_height = $max_resolution;
      $new_width = $original_width*$ratio;
    }

    if($original_image){

      $new_image = imagecreatetruecolor($new_width, $new_height);
      imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

      imagejpeg($new_image,$image,90);
    }

  

       
    }elseif ($_FILES['image']['type'] == 'image/png') {  

/*
    $image= ($_FILES['image']['tmp_name']);
    $max_resolution = '200';


    $original_image = imagecreatefrompng($image);

    //resolution
    $original_width = imagesx($original_image);
    $original_height = imagesy($original_image);

    //try
    $ratio = $max_resolution / $original_width;
    $new_width = $max_resolution;
    $new_height = $original_height*$ratio;

    //if not working
    if($new_height>$max_resolution){
      $ratio = $max_resolution / $original_height;
      $new_height = $max_resolution;
      $new_width = $original_width*$ratio;
    }elseif ($new_height<$max_resolution) {
      $ratio = $max_resolution / $original_height;
      $new_height = $max_resolution;
      $new_width = $original_width*$ratio;
    }

    if($original_image){

      $new_image = imagecreatetruecolor($new_width, $new_height);
      imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

      imagepng($new_image,$image,90);
    }

      $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);

 
        Masterfile::where('id', '=', $id)->update(['imagefile' => $image, 'imagename' => $name]);
        
        session()->flash('status', 'Profile picture has been updated successfully.');
        return back();
  
*/
        session()->flash('status', 'Please select only .jpg file type.');
        return back();


    }

      

        $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);

 
        Masterfile::where('id', '=', $id)->update(['imagefile' => $image, 'imagename' => $name]);
        
        session()->flash('status', 'Profile picture has been updated successfully.');
        return back();



      }else{  
       
        session()->flash('status', 'You did not select any file.');
        return back();

  
        }



   }





















public function updatepersonalinfo(Request $request,$id) {
      
       $firstname = $request->input('first_name');

        Manpower::where('id', '=', $id)->update(['firstname' => $firstname]);
        
        session()->flash('status', 'Basic info has been updated successfully.');
        return back();
   }


}


