@extends('layout.admin');
@section('admin_content')
<div class="row">
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header">Add new Book</div>
    </div>
    <div class="card-body">
     @if(Session::has('new_books'))
        <div class="alert alert-success" role = "alert">
        {{Session::get('new_books')}}
        </div>
    @endif
        <form method = "POST" enctype = "multipart/form-data" action = "{{route('add')}}" >
            @csrf
            <div class="form-group">
                <label for = "name">Name</label>
                <input type="text" name = "name" class= "form-control">
                @error('name')
                <span class = "text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for = "author">Auther Name</label>
                <input type="text" name = "auther_name" class= "form-control">
                @error('auther_name')
                <span class = "text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for = "price">Price</label>
                <input type="number" name = "price" class= "form-control">
                @error('price')
                <span class = "text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for = "image">Image</label>
                <!-- <input type="file" name = "file" class= "form-control" onchange = "previewFile(this)"> -->

                <input type="file"  class = "form-control" name = "image" onchange="loadFile(event)">
                <img id="output"  style="max-width:130px;margin-top:20px;"/>
                <script>
                // image preview script
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                    }
                };
                </script>
                <!-- <img id = "bookimage" alt="book image"/> -->
                @error('image')
                <span class = "text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</div>
@endsection

<!-- <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0)file[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#bookimage').attr('src',reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script> -->