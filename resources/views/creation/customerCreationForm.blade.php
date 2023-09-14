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
    <h2 class="mb-5 text-center">Add a Customer</h2>
    <form method="post" action={{url('/customers/create')}} enctype='multipart/form-data'>
    @csrf
    <div class="mb-3">
            <label for="id" class="form-label">Customer ID</label>
            <input type="number" class="form-control" id="id" name="id" >
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
        <label for="userId" class="form-label">User ID</label>
        <select class="form-control" id="userId"  name="userId" >
        @foreach($users as $item)
        <option value={{$item->id}}>{{$item->id}}-{{$item->name}}</option>
        @endforeach
       </select>
        </div>
        @error('userId')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" >
        </div>
        @error('firstname')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" >
        </div>
        @error('lastname')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" >
        </div>
        @error('phone')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        @error('city')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control"  name="state" >
        </div>
        @error('state')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control"  name="address"></textarea>
        </div>
        @error('address')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
            <label for="zip_code" class="form-label">Zip Code</label>
            <input type="number" class="form-control" name="zip_code" >
        </div>
        @error('zip_code')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection