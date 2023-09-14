@extends("layouts.app")
@include('includes.nav')
@section("content")
<style>
    label{
        font-weight: bold;
    }
    h2{
        font-size: 40px;
    }
</style>
<div class="container mt-5 " style="max-width: 70%;">
    <h2 class="mb-5 text-center">View & Update</h2>
    <form method="post" action={{url('/users/update/'.$data->id)}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="id" name="id" value={{$data->id}}>
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" class="form-control" id="name" name="name" value='{{$data->name}}'>
        </div>
        @error('name')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" value="{{$data->email}}">
        </div>
        @error('email')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value={{$data->password}}>
        </div>
        @error('password')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
       <label for="role" class="form-label">Role</label>
       <select class="form-control" id="role"  name="role" value={{$data->role}}>
        <option value='admin' @if($data->role == 'admin') selected @endif>Admin</option>
        <option value='customer' @if($data->role == 'customer') selected @endif>Customer</option>
       </select>
      </div>
      @error('role')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

       <div class="mb-3">
       <label  class="form-label">Created at</label>
       <p>{{$data->created_at}}</p>
       </div>

       <div class="mb-3">
       <label class="form-label">Updated at</label>
       <p>{{$data->updated_at}}</p>
       </div>

        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection