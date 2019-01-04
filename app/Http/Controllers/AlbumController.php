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

class AlbumController extends Controller
{
    public function index(){
    	return view('album/banner');
    }


    public function uploadbanner(Request $request){

    	date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");


      if (!empty($_FILES['image']['name'])) {

        $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);

         $data = array("imagename"=>$name,"imagefile"=>$image,"created_at"=>$time,"updated_at"=>$time);
        db::table('banner')->insert($data);

        session()->flash('status', 'New Banner has been Successfully Added.');
        return back();
  		}
    }
}
