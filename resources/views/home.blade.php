@extends('layouts.app')
@include('includes.nav')

@section('content')
<style>
    .card{
        background-color: rgb(44, 62, 83);
        color: white;
        border-radius: 20px;
        padding: 25px 20px 25px 20px;
        font-size: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-body{
        padding-bottom: 0;
    }
    .card h4{
        margin-top: 13px;
    }
</style>
<div class="container mt-5">
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                <i class="fa-solid fa-user fa-flip"></i>
                   <h4>Users</h4>  
                    <p >{{$usersCount}}</p>
                    <a href="{{ route('UsersPage') }}"  class="btn btn-danger ">Show</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                <i class="fa-solid fa-handshake fa-flip"></i>
                   <h4>Customers</h4>  
                    <p >{{$customersCount}}</p>
                    <a href="{{ route('CustomersPage') }}"  class="btn btn-warning ">Show</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                <i class="fa-brands fa-medium fa-flip"></i>
                   <h4>Brands</h4>  
                   <p >{{$brandsCount}}</p>
                    <a href="{{ route('BrandsPage') }}"  class="btn btn-primary ">Show</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                <i class="fa-solid fa-shirt fa-flip"></i>
                   <h4>Products</h4>  
                    <p >{{$productsCount}}</p>
                    <a href="{{ route('ProductsPage') }}"  class="btn btn-success ">Show</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center ">
                <div class="card-body">
                <i class="fa-brands fa-42-group fa-flip"></i>
                   <h4>Categories</h4>  
                   <p >{{$catesCount}}</p>
                    <a href="{{ route('CategoryPage') }}"  class="btn btn-primary ">Show</a>
                </div>
            </div>
        </div>
        
</div>
</div>
@endsection
