<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Employee;
use App\Attendence;
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
        $request->validate([
            'attendence' => 'required',
            
        ]);
        
        $date = $request->att_date;
        $att_date = DB::table('attendences')->where('att_date',$date)->first();

        if($att_date){
            Session::flash('success','Attendence Already Taken!!');
            return redirect()->back();
        }else{
            foreach($request->user_id as $id){
            $data[]=[
                "user_id"=>$id,
                "attendence"=>$request->attendence[$id],
                "att_date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "edit_date"=>date("d_m_y"),
                "month"=>$request->month,
            ];
        }

        $data = DB::table('attendences')->insert($data);

        
        Session::flash('success','Attendence Inserted Successfully!');
        return redirect()->route('all.attendence');
        }

        
     
        
    }

    public function allAttendence(){
        $all_att = DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        return view('attendence.all-attendence', compact('all_att'));
    }
 
    public function edit($edit_date){
        $date = DB::table('attendences')->where('edit_date', $edit_date)->first();
        $data = DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('attendence.edit_attendence', compact('data', 'date'));
    }

    public function Delete($edit_date){
        

        DB::table('attendences')->where('edit_date',$edit_date)->groupBy('edit_date')->delete();

        Session()->flash('success', 'Attendence Deleted Successfully!.');
        
        return redirect()->back();
    }

    public function update(Request $request){

        foreach($request->id as $id){
            $data=[
                "attendence"=>$request->attendence[$id],
                "att_date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "month"=>$request->month,
            ];

            $attendence = Attendence::where(['att_date'=>$request->att_date, 'id'=>$id])->first();
             $attendence->update($data);
            
        }

        Session()->flash('success', 'Attendence Updated Successfully!.');
        
        return redirect()->route('all.attendence');
        
        
    }


    public function view($edit_date){
        
        $data = DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('attendence.view_attendence', compact('data'));
    }
}
