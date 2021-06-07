@extends('layout.admin');
@section('admin_content')
<div class="row">
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header">Edit Book</div>
    </div>
    <div class="card-body">
     @if(Session::has('edit_books'))
        <div class="alert alert-success" role = "alert">
        {{Session::get('edit_books')}}
        </div>
    @endif
        <form method = "POST" enctype = "multipart/form-data" action = "{{route('edit')}}" >
            @csrf
            <input type="hidden" name = "id" value = "{{$books->id}}">
            <div class="form-group">
                <label for = "name">Name</label>
                <input type="text" name = "name" class= "form-control" value = "{{$books->name}}">
            </div>
            <div class="form-group">
                <label for = "author">Auther Name</label>
                <input type="text" name = "auther_name" class= "form-control" value = "{{$books->auther_name}}">
            </div>
            <div class="form-group">
                <label for = "price">Price</label>
                <input type="number" name = "price" class= "form-control" value = "{{$books->price}}">
            </div>
            <div class="form-group">
                <label for = "image">Image</label>
                

                <input type="file" value = "{{$books->image}}"  class = "form-control" name = "image" onchange="loadFile(event)">
                <img id="output" src = "{{asset('images')}}/{{$books->image}}" style="max-width:130px;margin-top:20px;"/>
                <script>
                
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                    }
                };
                </script>
                
            </div>
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</div>
@endsection

