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
    <h2 class="mb-5 text-center">Create User</h2>
    <form method="post" action={{url('/users/create')}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="id" name="id">
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" >
        </div>
        @error('email')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" >
        </div>
        @error('password')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
       <label for="role" class="form-label">Role</label>
       <select class="form-control" id="role"  name="role" >
        <option value='admin' >Admin</option>
        <option value='customer'>Customer</option>
       </select>
      </div>
      @error('role')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection