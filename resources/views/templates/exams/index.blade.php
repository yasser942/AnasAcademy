@extends('templates.components.index')
@php
    \Carbon\Carbon::setLocale('ar');
@endphp
@section('content')
    @include('templates.components.session-messages')

    <div class="row row-xs wd-xl-80p">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('exam.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء إمتحان جديد</a></div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('practical-exam.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء إمتحان تفاعلي</a></div>
        @endif

    </div>


    <div class="row mt-4">
        @if(count($exams)==0 && count($practicalExams)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                    <div class="card">
                        <div class="card-header pb-0">
                          </div>
                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="wd-lg-8p"><span>اسم المتحان</span></th>
                                        <th class="wd-lg-8p"><span>وصف الامتحان</span></th>
                                        <th class="wd-lg-8p"><span>مستوى الامتحان</span></th>
                                        <th class="wd-lg-8p"><span>نوع الامتحان</span></th>
                                        <th class="wd-lg-20p"><span>تاريخ الإنشاء</span></th>
                                        <th class="wd-lg-20p"><span>الحالة</span></th>
                                        @if(auth()->user()->isAdmin())

                                        <th class="wd-lg-20p">إجراء</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $exam)
                                        @if($exam->status=='active')
                                            <tr>

                                                <td>
                                                    <a href="{{route('exam.show',$exam->id)}}">{{$exam->name}}
                                                        @if ($exam->isNew())
                                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>{{$exam-> description}}</td>
                                                <td>{{$exam-> level}}</td>
                                                <td>عادي</td>

                                                <td>
                                                    {{$exam->created_at->diffForHumans() }}
                                                </td>
                                                @if($exam->status =='active')
                                                    <td class="text-center">
                                                        <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>مفعل</span>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>معطل</span>
                                                    </td>
                                                @endif


                                                <td>

                                                    <div class="btn-icon-list">
                                                        @if(auth()->user()->isAdmin())

                                                        <form method="POST" action="{{route('exam.delete',$exam->id)}}" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                        </form>

                                                        <a href="{{route('exam.edit',$exam->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>

                                        @else
                                            @if(auth()->user()->hasRole('أدمن'))
                                                <tr>

                                                    <td>
                                                        <a href="{{route('exam.show',$exam->id)}}">{{$exam->name}}
                                                            @if ($exam->isNew())
                                                                <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                            @endif
                                                        </a>
                                                    </td>

                                                    <td>{{$exam-> description}}</td>
                                                    <td>{{$exam-> level}}</td>
                                                    <td>عادي</td>

                                                    <td>
                                                        {{$exam->created_at->diffForHumans() }}
                                                    </td>
                                                    @if($exam->status =='active')
                                                        <td class="text-center">
                                                            <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>مفعل</span>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>معطل</span>
                                                        </td>
                                                    @endif


                                                    <td>

                                                        <div class="btn-icon-list">
                                                            @if(auth()->user()->isAdmin())

                                                            <form method="POST" action="{{route('exam.delete',$exam->id)}}" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                            </form>

                                                            <a href="{{route('exam.edit',$exam->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>


                                            @endif
                                        @endif
                                    @endforeach
                                    @foreach($practiceExams as $exam)
                                        @if($exam->status=='active')
                                            <tr>

                                                <td>
                                                    <a href="{{route('practical-exam.show',$exam->id)}}">{{$exam->name}}
                                                        @if ($exam->isNew())
                                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>{{$exam-> description}}</td>
                                                <td>{{$exam-> level}}</td>
                                                <td>تفاعلي</td>


                                                <td>
                                                    {{$exam->created_at->diffForHumans() }}
                                                </td>
                                                @if($exam->status =='active')
                                                    <td class="text-center">
                                                        <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>مفعل</span>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>معطل</span>
                                                    </td>
                                                @endif


                                                <td>

                                                    <div class="btn-icon-list">
                                                        @if(auth()->user()->isAdmin())

                                                        <form method="POST" action="{{route('practical-exam.delete',$exam->id)}}" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                        </form>

                                                        <a href="{{route('practical-exam.edit',$exam->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>

                                        @else
                                            @if(auth()->user()->hasRole('أدمن'))
                                                <tr>

                                                    <td>
                                                        <a href="{{route('exam.show',$exam->id)}}">{{$exam->name}}
                                                            @if ($exam->isNew())
                                                                <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                            @endif
                                                        </a>
                                                    </td>

                                                    <td>{{$exam-> description}}</td>
                                                    <td>{{$exam-> level}}</td>
                                                    <td>تفاعلي</td>

                                                    <td>
                                                        {{$exam->created_at->diffForHumans() }}
                                                    </td>
                                                    @if($exam->status =='active')
                                                        <td class="text-center">
                                                            <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>مفعل</span>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>معطل</span>
                                                        </td>
                                                    @endif


                                                    <td>

                                                        <div class="btn-icon-list">
                                                            @if(auth()->user()->isAdmin())

                                                            <form method="POST" action="{{route('practical-exam.delete',$exam->id)}}" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                            </form>

                                                            <a href="{{route('practical-exam.edit',$exam->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>


                                            @endif
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- row closed  -->
        @endif
    </div>




@endsection
