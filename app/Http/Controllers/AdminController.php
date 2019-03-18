<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Masterfile;
use App\Manpowerdocs;
use Session;
use Excel;
use File;
use Album;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
        $manpowercount = masterfile::count();
        $masterfile = DB::select('SELECT * FROM masterfile');
        return view('admin', compact('manpowercount', 'masterfile'));  

}
    
        public function adminhome()
    {

        $result =DB::table('masterfile')->paginate(3);
        return view('adminhome', ["data"=>$result]);
    }


    public function search(Request $request)
    {
 
        $search = Input::get('search');
        if($search != ''){
            $data = Masterfile::where('firstname', 'LIKE', '%'.$search.'%')
                            ->orWhere('middlename', 'LIKE', '%'.$search.'%')
                            ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                            ->paginate(3)
                            ->setpath('');
            $data->appends(array('search' => Input::get('search'),));
            if(count($data)>0){
                return view('home')->withData($data);
            }   
            return view('home')->withMessage("No Results found!");
        }
        else{
            $result =DB::table('masterfile')->paginate(3);
            return view('home', ["data"=>$result]);
        }
    }

    public function destroy($id) {
      DB::delete('delete from manpower where id = ?',[$id]);
      
      session()->flash('status', 'Record deleted Successfully.');
      return redirect('/home');
   }



 public function adminlogout(){
        Session::flush();
   /*     Auth::guard($this->getGuard())->logout();*/
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }


public function event(){
    return view('Admin.event');
}





    public function adminpersonalinfo($id)
    {
    /*  $person = Manpower::find($id);*/
      $person =DB::table('masterfile')->find($id);
      if ($person == true) {
        return view('admin.manpowerfiles.adminpersonalinfo', compact('person'));
      }else{
         return redirect('/admin');
      }
  
    }

    public function admineducationinfo($id)  
    {
      $person =DB::table('masterfile')->find($id);
      if ($person == true) {
        return view('admin.manpowerfiles.admineducationinfo', compact('person'));
      }else{
         return redirect('/admin');
      }

    }

    public function admingoverninfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
            return view('admin.manpowerfiles.admingoverninfo', compact('person'));
        }else{
             return redirect('/admin');
        }
    }

    public function admincompanyinfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
            return view('admin.manpowerfiles.admincompanyinfo', compact('person'));
        }else{
             return redirect('/admin');
        }
    }


    public function adminprojectinfo($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
         
            return view('admin.manpowerfiles.adminprojectsinfo', compact('person'));
        }else{
             return redirect('/admin');
        }
    }

    


    public function uploaddocs(Request $request){

      date_default_timezone_set("Asia/Manila");
        $time = date("Y-m-d h:i");
        $manpowerid = $request->input('manpowerid');


      if (!empty($_FILES['image']['name'])) {

        $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);

         $data = array("masterfile_id"=>$manpowerid,"imagename"=>$name,"imagefile"=>$image,"created_at"=>$time,"updated_at"=>$time);
        db::table('manpowerdocs')->insert($data);

        session()->flash('status', 'New Manpower Docs has been Successfully Added.');
        return back();
      }
    }



    public function adminothers($id)
    {
        $person =DB::table('masterfile')->find($id);
        if ($person == true) {
           $manpowerdocs = DB::select("SELECT * FROM manpowerdocs WHERE masterfile_id='".$id."'");
           return view('admin.manpowerfiles.adminothers', compact('person','manpowerdocs'));
        }else{
             return redirect('/admin');
        }
    }




        public function editpersonalinfo($id)
    {
    /*  $person = Manpower::find($id);*/
      $person =DB::table('masterfile')->find($id);
      if ($person == true) {
        return view('admin.manpowerfiles.editpersonalinfo', compact('person'));
      }else{
         return redirect('/admin');
      }
  
    }












}





