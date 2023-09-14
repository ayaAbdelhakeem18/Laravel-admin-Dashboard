<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    function index(){
        $users= User::all();
        $PageName= 'Users';
        $cells= ['ID','Name','Email','Password','Role','Created_at','Updated_at','Operations'];

        return view("users",['data'=>$users,'cells'=>$cells,'pageName'=>$PageName]);
    }
    public function show($id){
        $data=User::findOrFail($id);
        return view('show/userShow',['data'=>$data]);
    }
    public function update(Request $request,$id){
        $validatedata= $request->validate([
                'id'=> 'max:11',
                'name'=> 'required|min:5|max:255',
                'mail'=> 'required|email',
                'password'=> 'required|min:10|max:255',
                'role'=> 'required',
             ]);

         $user = User::find($id);

         $user->name = $request->name;
         $user->email =  $request->mail;
         $user->password =  Hash::make($request->password);
         $user->role = $request->role;
         $user->updated_at =now();
         $user->save();
    
        return redirect()->route('UsersPage')->with("updated",'Data Updated successfuly...!');
        }

        public function creationPage(){
            return view('creation/userCreationForm');
        }

        public function create(Request $request){
            $validatedata= $request->validate([
                'id'=> 'max:11|unique:users',
                'name'=> 'required|min:5|max:255',
                'mail'=> 'required|email',
                'password'=> 'required|min:10|max:255',
                'role'=> 'required',
             ]);

            User::create([
               'id'=> $request->id,
               'name'=> $request->name,
               'email'=> $request->mail,
               'password'=> Hash::make($request->password),
               'role'=> $request->role,
               'created_at'=> now(),
               'updated_at'=> null,
            ]);
            return redirect()->route('UsersPage')->with("created",'Data created successfuly...!');
           }

        public function delete($id){
            $data=User::findOrFail($id);
            $data->delete();
            return redirect()->route('UsersPage')->with('deleted','data deleted successfully..!');
           }   
}
