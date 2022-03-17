@extends('layouts.frontend')
@section('content')
<div class="page_header">
    <h6>Standlarımız</h6>
</div>
<div class="page_content container">
    <div class="row">
       <div class="col-lg-6">
           <img src="{{asset($standlar->image)}}" class="img-fluid" alt="">
       </div>
       <div class="col-lg-6">
           <h6>{{$standlar->title}}</h6>
           <p>{{$standlar->content}}</p>
       </div>

    </div>

</div>
@endsection