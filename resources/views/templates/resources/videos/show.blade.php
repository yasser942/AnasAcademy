
@extends('templates.components.index')

@section('content')
    <div style="padding:46.19% 0 0 0;position:relative;"><iframe src="{{$video->link}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Recording 2023-08-31 215210"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>

    <div class="col-md-12 mt-2">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    {{$video->name}}
                </div>
                <p class="mg-b-20">{{$video->description}}</p>
                <div class="d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
@endsection


