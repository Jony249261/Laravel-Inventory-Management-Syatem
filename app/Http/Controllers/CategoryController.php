<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Category;
use Illuminate\Http\Request;
use Image;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('category.add-category');
    }

    public function store(Request $request){
        $request->validate([
            'cat_name' => 'required|string|unique:categories|max:255',
            
        ]);
        
        $category=array();
        $category['cat_name']  = $request ->cat_name;
        $data = DB::table('categories')->insert($category);

        
        Session::flash('success','Category Inserted Successfully!');
        return redirect()->route('all-category');
     
        
    }


    public function all(){
        $category = Category::latest()->get();
        return view('category.all-category',compact('category'));
    }

    public function Delete($category_id){
        

        Category::findOrFail($category_id)->delete();

        Session()->flash('warning', 'Category Deleted Successfully!.');
        
        return redirect()->back();
    }


    public function View($id){
        $employee = Employee::find($id);
        return view('employee.view-employee',compact('employee'));
    }

    public function Edit($id){
        $category = Category::find($id);
        return view('category.category_edit',compact('category'));
    }


    public  function  Update(Request $request,$id){
        $request->validate([
            'cat_name' => 'required|string|max:255',
        ]);
        $category=Category::findOrFail($id);

        $category['cat_name']  = $request -> cat_name;
        
        
        $category->update();
        
        
        
        Session()->flash('success', 'Category Updated Successfully!.');
        return redirect()->route('all-category');



    }
}
