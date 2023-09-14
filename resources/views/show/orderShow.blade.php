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
    <form method="post" action={{url('/orders/update/'.$data->id)}} enctype='multipart/form-data'>
    @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Order ID</label>
            <input type="number" class="form-control" id="id" name="id" value={{$data->id}}>
        </div>
        @error('id')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
       <div class="mb-3">
        <label for="customerId" class="form-label">Customer Id</label>
        <select class="form-control" id="customerId"  name="customerId" value={{$data->customer_Id}}>
        @foreach($customers as $item)
        <option value={{$item->id}} @if($item->id == $data->customer_Id) selected @endif>{{$item->id}}-{{$item->firstName}}</option>
        @endforeach
       </select>
        </div>
        @error('customerId')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="price" class="form-label">Total Price</label>
            <input type="number" class="form-control" id="price" name="price" value={{$data->TotalPrice}}>
        </div>
        @error('price')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="amount" class="form-label">Total Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value={{$data->TotalAmount}}>
        </div>
        @error('amount')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" value={{$data->status}}>
            <option value="pending" @if($data->status=='pending') selected @endif>pending</option>
            <option value="processing" @if($data->status=='processing') selected @endif>processing</option>
            <option value="shipped" @if($data->status=='shipped') selected @endif>shipped</option>
            <option value="delivered" @if($data->status=='delivered') selected @endif>delivered</option>
            <option value="returned" @if($data->status=='returned') selected @endif>returned</option>
            <option value="refunded" @if($data->status=='refunded') selected @endif>refunded</option>
            <option value="completed" @if($data->status=='completed') selected @endif>completed</option>
            <option value="onHold" @if($data->status=='onHold') selected @endif>onHold</option>
            </select>
        </div>
        @error('status')
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