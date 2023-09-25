<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    function brands(){
        $brands=Brand::all();

        return response()->json($brands);
    }
    function categories(){
        $categories=Category::all();
        return response()->json($categories);
    }
    function products(){
        $products=Product::all();
        return response()->json($products);
    }
    function brandProducts($id){
        $products=Product::where('brand_id', $id)->get();
        return response()->json($products);
    }
    function cateProducts($id){
        $products=Product::where('category_id', $id)->get();
        return response()->json($products);
    }

    protected function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role'=> 'customer',
            'created_at'=> now(),
        ]);
    
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    protected function login(Request $request){

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        $user = Auth::user();
        return response()->json(['message' => 'Login successful', 'user' => $user], 200);
    }

    return response()->json(['message' => 'Invalid Email or Password'], 401);
}
    

 
}
