@extends("layouts.app")
@include('includes.nav')
@section("content")
<style>
.truncate {
  max-width: 100px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.center {
    vertical-align: middle !important;
    text-align: center;
}

</style>
<div class="container mt-5">
    <div class="card">
    <div class="card-header d-flex justify-content-between">
    <div> 
        <h3>{{$pageName}}<span class="badge badge-info"> {{$data->count()}}</span></h3>
    </div>
    <div> 
        <a href='/creation/productCreationForm' class="btn btn-primary">Add Data</a>
    </div>
    </div>
    <div class="card-body  table-responsive">
        @if(session('created'))
        <div class="alert alert-primary">{{session('created')}}</div>
        @elseif(session('updated'))
        <div class="alert alert-success">{{session('updated')}}</div>
        @elseif(session('deleted'))
        <div class="alert alert-warning">{{session('deleted')}}</div>
        @endif
        @if($data->count()>0)
        <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
            @foreach($cells as $cell)    
                <th>{{$cell}}</th>
            @endforeach    
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr >
                <td class="center" >{{$item->id}}</td>
                <td class="truncate center">{{$item->name}}</td>
                <td class="truncate center">{{$item->description}}</td>
                <td class="center"><img src={{asset('images/'.$item->img)}} width="70px" height="70px"/></td>
                <td class="center">{{$item->price}}</td>
                <td class="center">{{$item->quantity}}</td>
                <td class="center">{{$item->category_id}}</td>
                <td class="center">{{$item->brand_id}}</td>
                <td class="truncate center">{{$item->created_at}}</td>
                <td class="truncate center">{{$item->updated_at}}</td>
                <td class="d-flex justify-content-center" style="padding-top: 32px;padding-bottom:32px;">
                <a href={{url('/show/productsShow/'.$item->id)}} class="btn btn-success"><i class="fa-solid fa-eye fa-beat"></i></a></i>
                <a href='#' onclick="showConfirmation('{{ $item->id }}')" class="btn btn-danger"><i class="fa-solid fa-trash"></a></i></td>

            </tr>
        @endforeach        
</tbody>
</table>
        @else    
        <div class="alert alert-danger">No data Yet ...!</div>
        @endif
</div>
</div>
</div>
<script>
    function showConfirmation(id) {
        if (confirm("Are you sure you want to delete this data?")) {
            window.location.href = "/products/delete/" + id;
        }
    }
</script>
@endsection