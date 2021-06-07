@extends('layout.admin');
@section('admin_content')
<div class="row">
<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header">Details</div>
    </div>
    <div class="card-body">
        <h1>{{$book->name}}</h1>
        <h6>{{$book->auther_name}}<h6>
        <img src = "{{asset('images')}}/{{$book->image}}" style="max-width:100px; height:80px"/>
        <p>{{$book->price}}</p>

    </div>
</div>

</div>
@endsection

