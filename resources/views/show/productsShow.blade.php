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
    <form method="post" action={{url('/products/update/'.$data->id)}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Product ID</label>
            <input type="number" class="form-control" id="id" name="id" value={{$data->id}}>
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value='{{$data->name}}'>
        </div>
        @error('name')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="img" class="form-label">Product img</label>
            <div class="mb-3">
            <img src={{asset('images/'.$data->img)}} alt="current_img" name="current_img" width="200">
            </div>
            <input type="file" class="form-control" id="img" name="img" accept="image/*">

        </div>
        @error('img')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
        </div>
        @error('description')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value={{$data->price}}>
        </div>
        @error('price')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value={{$data->quantity}}>
        </div>
        @error('quantity')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
       <label for="cid" class="form-label">Product Categorie</label>
       <select class="form-control" id="cid"  name="cid" value={{$data->category_id}}>
        @foreach($categories as $item)
        <option value={{$item->id}} @if($item->id == $data->category_id) selected @endif>{{$item->title}}</option>
        @endforeach
       </select>
      </div>
      @error('category_id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <select class="form-control" id="brand"  name="brand" value={{$data->brand_id}}>
        @foreach($brands as $i)
        <option value={{$i->id}} @if($i->id == $data->brand_id) selected @endif>{{$i->id}}-{{$i->name}}</option>
        @endforeach
          </select>
      </div>
      @error('brand')
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