<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Expense;
use Illuminate\Http\Request;
use Image;
use DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('expense.add-expense');
    }

    public function store(Request $request){
        $request->validate([
            'details' => 'required|string|max:255',
            'amount' => 'required|numeric|',
            'month' => 'required|string',
            'date' => 'required|string',
            'year' => 'required|string',
            
        ]);
        
        $expense=array();
        $expense['details']  = $request ->details;
        $expense['amount']  = $request ->amount;
        $expense['date']  = $request ->date;
        $expense['month']  = $request ->month;
        $expense['year']  = $request ->year;
        $data = DB::table('expenses')->insert($expense);

        
        Session::flash('success','Expense Inserted Successfully!');
        return redirect()->route('today-expense');
     
        
    }



    public function TodayExpense(){
        $date = date('d-m-y');
        $today = DB::table('expenses')->where('date',$date)->get();
        return view('expense.today-expense', compact('today'));
    }


    public function TodayEditExpense($id){
            $today = Expense::find($id);
            return view('expense.edit-today-expense', compact('today'));
    }

    public function Delete($id){
        

        Expense::findOrFail($id)->delete();

        Session()->flash('success', 'Espense Deleted Successfully!.');
        return redirect()->back();
    }



    public function TodayExpenseUpdate(Request $request,$id){
        $request->validate([
            'details' => 'required|string|max:255',
            'amount' => 'required|numeric|',
            'month' => 'required|string',
            'date' => 'required|string',
            'year' => 'required|string',
            
        ]);
        $expense=Expense::findOrFail($id);

        $expense['details']  = $request ->details;
        $expense['amount']  = $request ->amount;
        $expense['date']  = $request ->date;
        $expense['month']  = $request ->month;
        $expense['year']  = $request ->year;
        
        
        $expense->update();
        
        
        
        Session()->flash('success', 'Expense Updated Successfully!.');
        return redirect()->route('today-expense');
    }


    public function MonthlyExpense(){
        $month = date('F');
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }


    public function YearlyExpense(){
        $year = date('Y');
        $expense = DB::table('expenses')->where('year',$year)->get();
        return view('expense.yearly-expense', compact('expense'));
    }

    public function JanuaryExpense(){
        $month = "January";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }


    public function februaryExpense(){
        $month = "february";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function MarchExpense(){
        $month = "March";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function AprilExpense(){
        $month = "April";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function MayExpense(){
        $month = "May";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function JuneExpense(){
        $month = "June";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function JulyExpense(){
        $month = "July";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function AugustExpense(){
        $month = "August";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function SeptemberExpense(){
        $month = "September";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function OctoberExpense(){
        $month = "October";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function NovemberExpense(){
        $month = "November";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    public function DecemberExpense(){
        $month = "December";
        $expense = DB::table('expenses')->where('month',$month)->get();
        return view('expense.monthly-expense', compact('expense'));
    }

    



}
