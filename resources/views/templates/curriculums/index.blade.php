@extends('templates.components.index')

@section('content')
    @if(session('success'))


        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>تم !</strong> {{session('success')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>

            @endif
    <div class="row row-xs wd-xl-80p">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('curriculum.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء منهج جديد</a></div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-outline-secondary btn-rounded btn-block">Secondary</button></div>
    </div>


    <!-- row opened -->
    <div class="row row-sm mt-4">
       @foreach($curriculums as $curriculum)

            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card">
                    <img class="card-img-top w-100" src="{{asset('assets/img/media/login.png')}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{$curriculum->name}}</h4>
                        <p class="card-text">{{$curriculum->description}}</p>
                        <div class="btn-icon-list">
                            <form method="POST" action="{{route('curriculum.delete',$curriculum->id)}}" class="ml-2">
                               @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-icon"><i class="typcn typcn-trash"></i></button>
                            </form>
                            <a href="{{route('curriculum.edit',$curriculum->id)}}" class="btn btn-info btn-icon"><i class="typcn typcn-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach

    </div>
    <!-- row closed -->

@endsection


