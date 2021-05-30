<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('salary.add-advanced-salary');
    }

    public function all(){
        $salary=DB::table('advance_salaries')
                ->join('employees','advance_salaries.emp_id','employees.id')
                ->select('advance_salaries.*','employees.name','employees.salary','employees.photo','employees.city')
                ->orderBy('id','DESC')
                ->get();
        return view('salary.all-advanced-salary',compact('salary'));
    }

        public function store(Request $request){
        $request->validate([
            'emp_id' => 'required|string',
            'month' => 'required|string',
            'advanced_salary' => 'required|numeric',
            'year' => 'required|numeric',
        ]);

        
      
        $month=$request->month;
        $emp_id=$request->emp_id;
        $advanced= DB::table('advance_salaries')
                   ->where('month',$month)
                   ->where('emp_id',$emp_id)
                   ->first();
        
                   if($advanced == NULL){
                       $data=array();
        $data['emp_id']  = $request -> emp_id;
        $data['month'] = $request->month;
        $data['advanced_salary'] = $request->advanced_salary;
        $data['year'] = $request->year;
        $data = DB::table('advance_salaries')->insert($data);

        
        $request->session()->flash('success', 'Advanced Salary Provided.');
        return redirect()->back();
                   }
                else{
                    $request->session()->flash('warning', 'Already Advanced Salary Paid In this Month.');
        return redirect()->back();
                }

        
//        
        
     
        
    }

    public function PaySalary(){
        
        $employee = DB::table('employees')->get();
        return view('salary.pay_salary',compact('employee'));
    }


}
