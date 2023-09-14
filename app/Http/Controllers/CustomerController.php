<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    function index(){
        $customers= Customer::all();
        $PageName= 'Customers';
        $cells= ['customer ID','user ID','FirstName','LastName','Phone','City','State','Address','zip_code','Created_at','Updated_at','Operations'];

        return view("customers",['data'=>$customers,'cells'=>$cells,'pageName'=>$PageName]);
    }
    public function show($id){
        $data=Customer::findOrFail($id);
        $users=User::all();
        return view('show/customerShow',['data'=>$data,'users'=>$users]);
    }
    public function update(Request $request,$id){
        $request->validate([
                'id'=> 'max:11',
                'userId'=> 'required',
                'firstname'=> 'required|min:2|max:50',
                'lastname'=> 'required|min:2|max:50',
                'phone'=> 'required|min:8|max:13',
                'city'=> 'required|min:3|max:20',
                'state'=> 'required|min:3|max:20',
                'address'=> 'required|min:10|max:250',
                'zip_code'=> 'required|min:4|max:6',
             ]);

         $customer = Customer::find($id);

         $customer->userId = $request->userId;
         $customer->firstName =  $request->firstname;
         $customer->lastName =  $request->lastname;
         $customer->phone = $request->phone;
         $customer->city = $request->city;
         $customer->state = $request->state;
         $customer->address = $request->address;
         $customer->zip_code = $request->zip_code;
         $customer->updated_at =now();
         $customer->save();
    
        return redirect()->route('CustomersPage')->with("updated",'Data Updated successfuly...!');
        }

        public function creationPage(){
            $users=User::all();
            return view('creation/customerCreationForm',['users'=>$users]);
        }

        public function create(Request $request){
            $validatedata= $request->validate([
                'id'=> 'max:11|unique:customers',
                'userId'=> 'required',
                'firstname'=> 'required|min:2|max:50',
                'lastname'=> 'required|min:2|max:50',
                'phone'=> 'required|min:8|max:13',
                'city'=> 'required|min:3|max:20',
                'state'=> 'required|min:3|max:20',
                'address'=> 'required|min:10|max:250',
                'zip_code'=> 'required|min:4|max:6',
             ]);

            Customer::create([
               'id'=> $request->id,
               'userId'=> $request->userId,
               'firstName'=> $request->firstname,
               'lastName'=> $request->lastname,
               'phone'=> $request->phone,
               'city'=> $request->city,
               'state'=> $request->state,
               'address'=> $request->address,
               'zip_code'=> $request->zip_code,
               'created_at'=> now(),
               'updated_at'=> null,
            ]);
            return redirect()->route('CustomersPage')->with("created",'Data created successfuly...!');
           }

        public function delete($id){
            $data=Customer::findOrFail($id);
            $data->delete();
            return redirect()->route('CustomersPage')->with('deleted','data deleted successfully..!');
           }  
}
