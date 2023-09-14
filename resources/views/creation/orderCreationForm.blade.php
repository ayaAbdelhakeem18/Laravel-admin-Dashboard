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
    <h2 class="mb-5 text-center">Add an Order</h2>
    <form method="post" action={{url('/orders/create')}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Order ID</label>
            <input type="number" class="form-control" id="id" name="id">
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
        <label for="customerId" class="form-label">Customer Id</label>
        <select class="form-control" id="customerId"  name="customerId">
        @foreach($customers as $item)
        <option value={{$item->id}} >{{$item->id}}-{{$item->firstName}}</option>
        @endforeach
       </select>
        </div>
        @error('customerId')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="price" class="form-label">Total Price</label>
            <input type="number" class="form-control" id="price" name="price" >
        </div>
        @error('price')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="amount" class="form-label">Total Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" >
        </div>
        @error('amount')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" >
            <option value="pending">pending</option>
            <option value="processing" >processing</option>
            <option value="shipped" >shipped</option>
            <option value="delivered">delivered</option>
            <option value="returned" >returned</option>
            <option value="refunded">refunded</option>
            <option value="completed">completed</option>
            <option value="onHold" >onHold</option>
            </select>
        </div>
        @error('status')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        
        <button name="save_data" type="submit" class="btn btn-block btn-success mt-5">Save</button>
    </form>
</div>



@endsection