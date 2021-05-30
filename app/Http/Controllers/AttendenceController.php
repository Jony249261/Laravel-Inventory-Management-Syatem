<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Employee;
use Illuminate\Http\Request;
use Image;
use DB;

class AttendenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $employee = DB::table('employees')->get();
        return view('attendence.take-attendence', compact('employee'));
    }


    public function store(Request $request){
        
        
        $attendence=array();
        $attendence['user_id']  = $request ->user_id;
        $attendence['att_date']  = $request ->att_date;
        $attendence['att_year']  = $request ->att_year;
        echo"<pre>";
        print_r($attendence);
        exit();
     
        
    }
}
