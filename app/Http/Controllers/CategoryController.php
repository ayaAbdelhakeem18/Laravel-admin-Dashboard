<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index(){
        $categories= Category::all();
        $PageName= 'Categories';
        $cells= ['ID','Title','created_at','updated_at','operations'];

        return view("category",['data'=>$categories,'cells'=>$cells,'pageName'=>$PageName]);
    }
    public function show($id){
        $data=Category::findOrFail($id);
        return view('show/cateShow',['data'=>$data]);
    }

    public function update(Request $request,$id){
        $validatedata= $request->validate([
                'id'=> 'max:11',
                'title'=> 'required|min:4|max:255',
    ]);
    
         $categorys = category::find($id);
         $categorys->title = $request->title;
         $categorys->updated_at = now();
         $categorys->save();
    
       return redirect()->route('CategoryPage')->with("updated",'Data Updated successfuly...!');
        }  
    
        public function delete($id){
            $data=Category::findOrFail($id);
            $data->delete();
            return redirect()->route('CategoryPage')->with('deleted','Data deleted successfully..!');
        } 
        
        public function creationPage(){
            return view('creation/cateCreationForm');
        }

        public function create(Request $request){
            $validatedata= $request->validate([
               'id'=> 'required|unique:categories|max:11',
               'title'=> 'required|min:4|max:255',
            ]);
            category::create([
               'id'=> $request->id,
               'title'=> $request->title,
               'created_at'=> now(),
               'updated_at'=> null,
            ]);
            return redirect()->route('CategoryPage')->with("created",'Data created successfuly...!');
           }
}
