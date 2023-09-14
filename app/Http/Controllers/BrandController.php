<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index(){
        $brands= Brand::all();
        $PageName= 'Brands';
        $cells= ['ID','Name','created_at','updated_at','operations'];

        return view("brands",['data'=>$brands,'cells'=>$cells,'pageName'=>$PageName]);
    }
    public function show($id){
        $data=Brand::findOrFail($id);
        return view('show/brandShow',['data'=>$data]);
       }

       public function update(Request $request,$id){
        $validatedata= $request->validate([
                'id'=> 'max:11',
                'name'=> 'required|min:4|max:255',
        ]);
    
         $brands = Brand::find($id);
         $brands->name = $request->name;
         $brands->updated_at = now();
         $brands->save();
    
       return redirect()->route('BrandsPage')->with("updated",'Data Updated successfuly...!');
        }  
    
        public function delete($id){
            $data=Brand::findOrFail($id);
            $data->delete();
            return redirect()->route('BrandsPage')->with('deleted','Data deleted successfully..!');
        } 
        
        public function creationPage(){
            return view('creation/brandCreationForm');
        }

        public function create(Request $request){
            $validatedata= $request->validate([
               'id'=> 'required|unique:brands|max:11',
               'name'=> 'required|min:4|max:255',
            ]);
            Brand::create([
               'id'=> $request->id,
               'name'=> $request->name,
               'created_at'=> now(),
               'updated_at'=> null,
            ]);
            return redirect()->route('BrandsPage')->with("created",'Data created successfuly...!');
           }
}
