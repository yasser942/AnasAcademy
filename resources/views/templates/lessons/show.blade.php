@extends('templates.components.index')

@section('content')
    @include('templates.components.session-messages')


    <div class="row row-xs wd-xl-80p">

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"> <button data-toggle="dropdown" class="btn btn-indigo btn-block">إنشاء مصدر <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
            <div class="dropdown-menu">
                <a href="{{route('pdf.create',$lesson->id)}}" class="dropdown-item">PDF</a>
                <a href="{{route('test.create',$lesson->id)}}" class="dropdown-item">إختبار</a>
                <a href="{{route('video.create',$lesson->id)}}" class="dropdown-item">فيديو</a>
            </div><!-- dropdown-menu --></div>
    </div>

    <div class="row mt-4">
        @if(count($lesson->pdfs)==0 && count($lesson->tests)==0 )
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($lesson->videos as $video)
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <div class="card card-success">
                        <div class="card-header pb-0">
                            <a href="{{route('video.show',$video->id)}}"><h5 class="card-title mb-0 pb-0">{{$video->name}}</h5></a>
                        </div>
                        <div class="card-body text-success">
                            {{$video->description}}
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <form method="POST" action="{{route('video.delete',$video->id)}}" class="ml-2">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                    <i class="typcn typcn-trash"></i>
                                </button>
                            </form>

                            <a href="{{route('video.edit',$video->id)}}" class="btn btn-info btn-icon mr-2">
                                <i class="typcn typcn-edit"></i>
                            </a>

                            @if($video->status=='active')
                                <span class="badge badge-pill badge-success mr-2">مفعل</span>
                            @else
                                <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                            @endif

                            <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                            <span class="badge badge-pill badge-primary-transparent mr-2">فيديو</span>



                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($lesson->pdfs as $pdf)
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <div class="card card-primary">
                        <div class="card-header pb-0">
                            <a href="{{route('pdf.show',$pdf->id)}}"><h5 class="card-title mb-0 pb-0">{{$pdf->name}}</h5></a>
                        </div>
                        <div class="card-body text-primary">
                            {{$pdf->description}}
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <form method="POST" action="{{route('pdf.delete',$pdf->id)}}" class="ml-2">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                    <i class="typcn typcn-trash"></i>
                                </button>
                            </form>

                            <a href="{{route('pdf.edit',$pdf->id)}}" class="btn btn-info btn-icon mr-2">
                                <i class="typcn typcn-edit"></i>
                            </a>

                            @if($pdf->status=='active')
                                <span class="badge badge-pill badge-success mr-2">مفعل</span>
                            @else
                                <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                            @endif

                            <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                            <span class="badge badge-pill badge-primary-transparent mr-2">PDF</span>



                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($lesson->tests as $test)
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card card-warning">
                            <div class="card-header pb-0">
                                <a href="{{route('test.show',$test->id)}}"><h5 class="card-title mb-0 pb-0">{{$test->name}}</h5></a>
                            </div>
                            <div class="card-body text-warning">
                                {{$test->description}}
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <form method="POST" action="{{route('test.delete',$test->id)}}" class="ml-2">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                        <i class="typcn typcn-trash"></i>
                                    </button>
                                </form>

                                <a href="{{route('test.edit',$test->id)}}" class="btn btn-info btn-icon mr-2">
                                    <i class="typcn typcn-edit"></i>
                                </a>

                                @if($test->status=='active')
                                    <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                @else
                                    <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                @endif

                                <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                <span class="badge badge-pill badge-primary-transparent mr-2">إختبار</span>



                            </div>
                        </div>
                    </div>
                @endforeach
        @endif
    </div>




@endsection
