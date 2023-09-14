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
    <h2 class="mb-5 text-center">Add a Brand</h2>
    <form method="post" action={{url('/brands/create')}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Brand ID</label>
            <input type="number" class="form-control" id="id" name="id">
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="name" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection