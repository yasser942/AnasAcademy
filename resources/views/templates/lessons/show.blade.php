@extends('templates.components.index')

@section('content')
    @include('templates.components.session-messages')


    <div class="row row-xs wd-xl-80p">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"> <button data-toggle="dropdown" class="btn btn-indigo btn-block">إنشاء مصدر <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
            <div class="dropdown-menu">
                <a href="{{route('pdf.create',$lesson->id)}}" class="dropdown-item">PDF</a>
                <a href="{{route('test.create',$lesson->id)}}" class="dropdown-item">إختبار</a>
                <a href="{{route('video.create',$lesson->id)}}" class="dropdown-item">فيديو</a>
                <a href="{{route('practical-test.create',$lesson->id)}}" class="dropdown-item">إختبار تفاعلي </a>

            </div><!-- dropdown-menu -->
        </div>
        @endif
    </div>

    <div class="row mt-4">
        @if(empty($lesson->pdfs) && empty($lesson->tests) && empty($practicalTests))
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($lesson->videos as $video)
                @if($video->status=='active')
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card card-success">
                            <div class="card-header pb-0">
                                <a href="{{route('video.show',$video->id)}}"><h5 class="card-title mb-0 pb-0">{{$video->name}}</h5></a>
                            </div>
                            <div class="card-body text-success">
                                {{$video->description}}
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                @if(auth()->user()->isAdmin())

                                <form method="POST" action="{{route('video.delete',$video->id)}}" class="ml-2">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                        <i class="typcn typcn-trash"></i>
                                    </button>
                                </form>

                                <a href="{{route('video.edit',$video->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                    <i class="typcn typcn-edit"></i>
                                </a>
                                @endif

                                @if($video->status=='active')
                                    <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                @else
                                    <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                @endif

                                <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                <span class="badge badge-pill badge-primary-transparent mr-2">فيديو</span>
                                @if ($video->isNew())
                                    <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                @endif



                            </div>
                        </div>
                    </div>
                @else
                    @if(auth()->user()->hasRole('أدمن'))
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <div class="card card-success">
                                <div class="card-header pb-0">
                                    <a href="{{route('video.show',$video->id)}}"><h5 class="card-title mb-0 pb-0">{{$video->name}}</h5></a>
                                </div>
                                <div class="card-body text-success">
                                    {{$video->description}}
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('video.delete',$video->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{route('video.edit',$video->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    @endif

                                    @if($video->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                    <span class="badge badge-pill badge-primary-transparent mr-2">فيديو</span>
                                    @if ($video->isNew())
                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                    @endif



                                </div>
                            </div>
                        </div>

                    @endif
                @endif
            @endforeach
            @foreach($lesson->pdfs as $pdf)
                    @if($pdf->status=='active')
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <div class="card card-primary">
                                <div class="card-header pb-0">
                                    <a href="{{route('pdf.show',$pdf->id)}}"><h5 class="card-title mb-0 pb-0">{{$pdf->name}}</h5></a>
                                </div>
                                <div class="card-body text-primary">
                                    {{$pdf->description}}
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('pdf.delete',$pdf->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{route('pdf.edit',$pdf->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    @endif

                                    @if($pdf->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                    <span class="badge badge-pill badge-primary-transparent mr-2">PDF</span>
                                    @if ($pdf->isNew())
                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                    @endif



                                </div>
                            </div>
                        </div>
                    @else
                        @if(auth()->user()->hasRole('أدمن'))
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                                <div class="card card-primary">
                                    <div class="card-header pb-0">
                                        <a href="{{route('pdf.show',$pdf->id)}}"><h5 class="card-title mb-0 pb-0">{{$pdf->name}}</h5></a>
                                    </div>
                                    <div class="card-body text-primary">
                                        {{$pdf->description}}
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        @if(auth()->user()->isAdmin())

                                        <form method="POST" action="{{route('pdf.delete',$pdf->id)}}" class="ml-2">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{route('pdf.edit',$pdf->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                            <i class="typcn typcn-edit"></i>
                                        </a>
                                        @endif

                                        @if($pdf->status=='active')
                                            <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                        @else
                                            <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                        @endif

                                        <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                        <span class="badge badge-pill badge-primary-transparent mr-2">PDF</span>
                                        @if ($pdf->isNew())
                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                        @endif



                                    </div>
                                </div>
                            </div>

                        @endif
                    @endif
            @endforeach
            @foreach($lesson->tests as $test)
                    @if($test->status=='active')
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <div class="card card-warning">
                                <div class="card-header pb-0">
                                    <a href="{{route('test.show',$test->id)}}"><h5 class="card-title mb-0 pb-0">{{$test->name}}</h5></a>
                                </div>
                                <div class="card-body text-warning">
                                    {{$test->description}}
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('test.delete',$test->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{route('test.edit',$test->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    @endif

                                    @if($test->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                    <span class="badge badge-pill badge-primary-transparent mr-2">إختبار</span>
                                    @if ($test->isNew())
                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                    @endif



                                </div>
                            </div>
                        </div>
                    @else
                        @if(auth()->user()->hasRole('أدمن'))
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                                <div class="card card-warning">
                                    <div class="card-header pb-0">
                                        <a href="{{route('test.show',$test->id)}}"><h5 class="card-title mb-0 pb-0">{{$test->name}}</h5></a>
                                    </div>
                                    <div class="card-body text-warning">
                                        {{$test->description}}
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        @if(auth()->user()->isAdmin())

                                        <form method="POST" action="{{route('test.delete',$test->id)}}" class="ml-2">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{route('test.edit',$test->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                            <i class="typcn typcn-edit"></i>
                                        </a>
                                        @endif

                                        @if($test->status=='active')
                                            <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                        @else
                                            <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                        @endif

                                        <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                        <span class="badge badge-pill badge-primary-transparent mr-2">إختبار</span>
                                        @if ($test->isNew())
                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                        @endif



                                    </div>
                                </div>
                            </div>

                        @endif
                    @endif
            @endforeach
            @foreach($lesson->practicalTests as $practicalTest)
                    @if($practicalTest->status=='active')
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <div class="card card-danger">
                                <div class="card-header pb-0">
                                    <a href="{{route('practical-test.show',$practicalTest->id)}}"><h5 class="card-title mb-0 pb-0">{{$practicalTest->name}}</h5></a>
                                </div>
                                <div class="card-body text-danger">
                                    {{$practicalTest->description}}
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('practical-test.delete',$practicalTest->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{route('practical-test.edit',$practicalTest->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    @endif

                                    @if($practicalTest->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                    <span class="badge badge-pill badge-primary-transparent mr-2">إختبار تفاعلي</span>
                                    @if ($practicalTest->isNew())
                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                    @endif



                                </div>
                            </div>
                        </div>
                    @else
                        @if(auth()->user()->hasRole('أدمن'))
                            <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                                <div class="card card-danger">
                                    <div class="card-header pb-0">
                                        <a href="{{route('practical-test.show',$practicalTest->id)}}"><h5 class="card-title mb-0 pb-0">{{$practicalTest->name}}</h5></a>
                                    </div>
                                    <div class="card-body text-danger">
                                        {{$practicalTest->description}}
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        @if(auth()->user()->isAdmin())

                                        <form method="POST" action="{{route('practical-test.delete',$practicalTest->id)}}" class="ml-2">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                <i class="typcn typcn-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{route('practical-test.edit',$practicalTest->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                            <i class="typcn typcn-edit"></i>
                                        </a>
                                        @endif

                                        @if($practicalTest->status=='active')
                                            <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                        @else
                                            <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                        @endif

                                        <span class="badge badge-pill badge-danger-transparent mr-2">{{$lesson->name}}</span>
                                        <span class="badge badge-pill badge-primary-transparent mr-2">إختبار تفاعلي</span>
                                        @if ($practicalTest->isNew())
                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                        @endif



                                    </div>
                                </div>
                            </div>

                        @endif
                    @endif
            @endforeach

        @endif
    </div>




@endsection
