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
    <form method="post" action={{url('/customers/update/'.$data->id)}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Customer ID</label>
            <input type="number" class="form-control" id="id" name="id" value={{$data->id}}>
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
        <label for="userId" class="form-label">User ID</label>
        <select class="form-control" id="userId"  name="userId" value={{$data->userId}}>
        @foreach($users as $item)
        <option value={{$item->id}} @if($item->id == $data->userId) selected @endif>{{$item->id}}-{{$item->name}}</option>
        @endforeach
       </select>
        </div>
        @error('userId')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value='{{$data->firstName}}'>
        </div>
        @error('firstname')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value='{{$data->lastName}}'>
        </div>
        @error('lastname')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value={{$data->phone}}>
        </div>
        @error('phone')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value='{{$data->city}}'>
        </div>
        @error('city')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control"  name="state" value='{{$data->state}}'>
        </div>
        @error('state')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control"  name="address">{{$data->address}}</textarea>
        </div>
        @error('address')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
            <label for="zip_code" class="form-label">Zip Code</label>
            <input type="number" class="form-control" name="zip_code" value={{$data->zip_code}}>
        </div>
        @error('zip_code')
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