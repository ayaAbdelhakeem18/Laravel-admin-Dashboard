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
    <form method="post" action={{url('/category/update/'.$data->id)}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Category ID</label>
            <input type="number" class="form-control" id="id" name="id" value={{$data->id}}>
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Category Title</label>
            <input type="text" class="form-control" id="title" name="title" value='{{$data->title}}'>
        </div>
        @error('title')
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