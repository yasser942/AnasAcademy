
@extends('templates.components.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{$practicalTest->name}}
                    </div>
                    <p class="mg-b-20">{{$practicalTest->description}}</p>
                    <div class="d-flex justify-content-center">
                        <iframe src="{{$practicalTest->link}}" width="500" height="380" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


