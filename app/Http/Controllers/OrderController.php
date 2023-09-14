<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index(){
        $orders= Order::all();
        $PageName= 'Orders';
        $cells= ['ID','Customer Id','Total Price','Total Amount','Status','Created_at','Updated_at','Operations'];

        return view("orders",['data'=>$orders,'cells'=>$cells,'pageName'=>$PageName]);
    }
    public function show($id){
        $data=Order::findOrFail($id);
        $customers=Customer::all();
        return view('show/orderShow',['data'=>$data,'customers'=>$customers]);
    }

    public function update(Request $request,$id){
        $request->validate([
                'id'=> 'max:11',
                'customerId'=> 'required',
                'price'=> 'required',
                'amount'=> 'required',
                'status'=> 'required',
             ]);

         $orders = Order::find($id);

         $orders->customer_Id = $request->customerId;
         $orders->TotalPrice =  $request->price;
         $orders->TotalAmount =  $request->amount;
         $orders->status = $request->status;
         $orders->updated_at =now();
         $orders->save();
    
        return redirect()->route('OrdersPage')->with("updated",'Data Updated successfuly...!');
        }

        public function creationPage(){
            $customers=Customer::all();
            return view('creation/orderCreationForm',['customers'=>$customers]);
        }

        public function create(Request $request){
        $request->validate([
            'id'=> 'required|max:11|unique:orders',
            'customerId'=> 'required',
            'price'=> 'required',
            'amount'=> 'required',
            'status'=> 'required',
         ]);

            Order::create([
               'id'=> $request->id,
               'customer_Id'=> $request->customerId,
               'TotalPrice'=> $request->price,
               'TotalAmount'=> $request->amount,
               'status'=> $request->status,
               'created_at'=> now(),
               'updated_at'=> null,
            ]);
            return redirect()->route('OrdersPage')->with("created",'Data created successfuly...!');
           }

        public function delete($id){
            $data=Order::findOrFail($id);
            $data->delete();
            return redirect()->route('OrdersPage')->with('deleted','data deleted successfully..!');
           }  
}
