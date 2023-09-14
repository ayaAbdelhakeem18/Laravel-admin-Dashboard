<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    function index(){
        $products= Product::all();
        $PageName= 'Products';
        $cells= ['ID','Name','Description','Img','Price','Quantity','CategorieID','BrandID','Created_at','Updated_at','Operations'];

        return view("products",['data'=>$products,'cells'=>$cells,'pageName'=>$PageName]);
    }
    
    public function show($id){
     $data=Product::findOrFail($id);
     $categories= Category::all();
     $brands= Brand::all();
     return view('show/productsShow',['data'=>$data,'categories'=>$categories,'brands'=>$brands]);
    }

    public function delete($id){
     $data=Product::findOrFail($id);
     if(File::exists(public_path('images/'.$data->img))){
        File::delete(public_path('images/'.$data->img));
    }
     $data->delete();
     return redirect()->route('ProductsPage')->with('deleted','data deleted successfully..!');
    }

    public function update(Request $request,$id){
    $validatedata= $request->validate([
            'id'=> 'max:11',
            'name'=> 'required|min:5|max:255',
            'img'=> 'max:2048|image',
            'description'=> 'required|min:10|max:255',
            'price'=> 'required|max:11',
            'quantity'=> 'required|max:11',
            'brand'=>'required'
         ]);
    if($request->hasFile('img')){
          $image=$request->img;
          $imgName=time()."_".rand(0,100).".".$image->extension();
          $image->move(public_path('images'),$imgName);
    };
     $product = Product::find($id);
     $product->name = $request->name;
     if($request->hasFile('img')){
        $product->img = $imgName;
  };
     $product->price =  $request->price;
     $product->description =  $request->description;
     $product->quantity = $request->quantity;
     $product->category_id = $request->cid;
     $product->brand_id =$request->brand;
     $product->updated_at =now();
     $product->save();

    return redirect()->route('ProductsPage')->with("updated",'Data Updated successfuly...!');
    }
    


    public function creationPage(){

        $categories= Category::all();
        $brands= Brand::all();
        return view('creation/productCreationForm',['categories'=>$categories,'brands'=>$brands]);
    }


    public function create(Request $request){
     $validatedata= $request->validate([
        'id'=> 'required|unique:products|max:11',
        'name'=> 'required|min:5|max:255',
        'img'=> 'required|max:2048|image',
        'description'=> 'required|min:10|max:255',
        'price'=> 'required|max:11',
        'quantity'=> 'required|max:11',
        'brand'=>'required'
     ]);
     if($request->hasFile('img')){
      $image=$request->img;
      $imgName=time()."_".rand(0,100).".".$image->extension();
      $image->move(public_path('images'),$imgName);
     };
     Product::create([
        'id'=> $request->id,
        'name'=> $request->name,
        'img'=> $imgName,
        'price'=> $request->price,
        'description'=> $request->description,
        'quantity'=> $request->quantity,
        'category_id'=> $request->cid,
        'brand_id'=> $request->brand,
        'created_at'=> now(),
        'updated_at'=> null,
     ]);
     return redirect()->route('ProductsPage')->with("created",'Data created successfuly...!');
    }


}
