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

</style>
<div class="container mt-5">
    <div class="card">
    <div class="card-header d-flex justify-content-between">
    <div> 
        <h3>{{$pageName}}<span class="badge badge-info"> {{$data->count()}}</span></h3>
    </div>
    <div> 
        <a href='/creation/brandCreationForm' class="btn btn-primary">Add Data</a>
    </div>
    </div>
    <div class="card-body ">
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
                <th class="text-center">{{$cell}}</th>
            @endforeach    
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr >
                <td class="text-center">{{$item->id}}</td>
                <td class="truncate text-center">{{$item->name}}</td>
                <td class="truncate text-center">{{$item->created_at}}</td>
                <td class="truncate text-center">{{$item->updated_at}}</td>

                <td class="d-flex justify-content-center" >
                <a href={{url('/show/brandShow/'.$item->id)}} class="btn btn-success mr-2"><i class="fa-solid fa-eye fa-beat"></i></a></i>
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
            window.location.href = "/brands/delete/" + id;
        }
    }
</script>
@endsection