<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Customer;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $products= Product::all();
        $brands= Brand::all();
        $categories= Category::all();
        $users= User::all();
        $customers=Customer::all();

        return view("home",['productsCount'=>$products->count(),'usersCount'=>$users->count(),'customersCount'=>$customers->count(),'brandsCount'=>$brands->count(),'catesCount'=>$categories->count()]);
    }
}
