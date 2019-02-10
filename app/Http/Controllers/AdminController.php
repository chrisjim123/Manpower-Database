<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Masterfile;

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



}
