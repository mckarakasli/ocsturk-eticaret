@extends('layouts.frontend')
@section('content')

<div class="page_content padding">
    <div class="page_header">
    <h6>Standlarımız</h6>
</div>
    <div class="row">
        @foreach($standlar as $data)
        <div class="col-lg-6">
            <div class="standcard mt-2">
                <a href="{{route('standDetail',$data->id)}}">
                <img src="{{asset($data->image)}}" class="img-fluid" alt="">
                <h6>{{$data->title}}</h6>
                </a>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection