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
    <h2 class="mb-5 text-center">Create a Product</h2>
    <form method="post" action={{url('/products/create')}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Product ID</label>
            <input type="number" class="form-control" id="id" name="id">
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="img" class="form-label">Img</label>
            <input type="file" class="form-control" id="img" name="img" accept="image/*">
        </div>
        @error('img')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" >
        </div>
        @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       <div class="mb-3">
       <label for="cid" class="form-label">Product Categorie</label>
       <select class="form-control" id="cid"  name="cid" >
        @foreach($categories as $item)
        <option value={{$item->id}} >{{$item->title}}</option>
        @endforeach
       </select>
      </div>
      @error('cid')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <select class="form-control" id="brand"  name="brand" >
        @foreach($brands as $i)
        <option value={{$i->id}}>{{$i->id}}-{{$i->name}}</option>
        @endforeach
          </select>
      </div>
      @error('brand')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection