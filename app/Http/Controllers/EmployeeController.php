<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;
use Image;
use DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('employee.add-employe');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:employees',
            'address' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            'nid_no'=>'required|numeric|unique:employees',
            'salary'=>'required|numeric',
            'vacation'=>'required|numeric',
            'city'=>'required|string|max:255',
        ]);

        
       $img_url = null;
       if($request->has('photo')){
           $photo=$request->file('photo');
           $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
           Image::make($photo)->save('admin/images/users/'.$name_gen);
           $img_url='admin/images/users/'.$name_gen;
       }


        
//        
        $employee=array();
        $employee['name']  = $request -> name;
        $employee['email'] = $request->email;
        $employee['phone'] = $request->phone;
        $employee['address'] = $request->address;
        $employee['photo']=$img_url;
        $employee['experience']=$request->experience;
        $employee['nid_no']=$request->nid_no;
        $employee['salary']=$request->salary;
        $employee['vacation']=$request->vacation;
        $employee['city']=$request->city;
        $data = DB::table('employees')->insert($employee);

        
        Session::flash('success','Employee Inserted Successfully!');
        return redirect()->route('all-employee');
     
        
    }


    public function all(){
        $employee = Employee::latest()->get();
        return view('employee.all-employee',compact('employee'));
    }

    public function Delete($employee_id){
        $image=Employee::findOrFail($employee_id);
        $image_one = $image->photo;
        unlink($image_one);

        Employee::findOrFail($employee_id)->delete();

        Session()->flash('warning', 'Employee Deleted Successfully!.');
        
        return redirect()->back();
    }


    public function View($id){
        $employee = Employee::find($id);
        return view('employee.view-employee',compact('employee'));
    }

    public function Edit($id){
        $employee = Employee::find($id);
        return view('employee.employee-edit',compact('employee'));
    }


    public  function  Update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'experience' => 'required|numeric',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'nid_no'=>'required|numeric',
            'salary'=>'required|numeric',
            'vacation'=>'required|numeric',
            'city'=>'required|string|max:255',
        ]);
        $employee=Employee::findOrFail($id);
        $photo='admin/images/users/'.$employee->photo;

        if ($request->has('photo')){
            if(file_exists(public_path($photo))){
                unlink($photo);
            }
            $photo=$request->file('photo');
            $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,600)->save('admin/images/users/'.$name_gen);
            $img_url='admin/images/users/'.$name_gen;


        }


        $employee['name']  = $request -> name;
        $employee['email'] = $request->email;
        $employee['phone'] = $request->phone;
        $employee['address'] = $request->address;
        $employee['experience']=$request->experience;
        $employee['nid_no']=$request->nid_no;
        $employee['salary']=$request->salary;
        $employee['vacation']=$request->vacation;
        $employee['city']=$request->city;
        if ($request->has('photo')){
            $employee->photo=$img_url;
        }
        
        $employee->update();
        
        
        
        Session()->flash('success', 'Employee Updated Successfully!.');
        return redirect()->route('all-employee');



    }
}
