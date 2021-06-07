@extends('layout.admin');
@section('admin_content')
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">All Books</div>
    </div>
    <div class="card-body">
    @if(Session::has('delete'))
        <div class="alert alert-success" role = "alert">
        {{Session::get('delete')}}
        </div>
    @endif
     <table class = "table table-striped" >
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->auther_name}}</td>
                <td>{{$book->price}}</td>
                <td>  <img src = "{{asset('images')}}/{{$book->image}}" style="max-width:60px; height:50px"/> </td>
                <td>
                <a type = "button" class = "btn btn-info" href="/details/{{$book->id}}">Details</a>
                <a type = "button" class = "btn btn-primary" href="/edit_book/{{$book->id}}">Edit</a>
                <a type = "button" class = "btn btn-danger" href="/delete_book/{{$book->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
     </table>

    </div>
</div>

</div>
@endsection


