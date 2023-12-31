@extends('templates.components.index')
@php
    \Carbon\Carbon::setLocale('ar');
@endphp
@section('content')
    @include('templates.components.session-messages')


    <div class="row row-xs wd-xl-80p">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('lesson.create',$unit->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء درس جديد</a></div>
        @endif
    </div>

    <div class="row mt-4">
        @if(count($unit->lessons)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">قائمة الدروس</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="wd-lg-8p"><span>اسم الدرس</span></th>
                                        <th class="wd-lg-8p"><span>وصف الدرس</span></th>
                                        <th class="wd-lg-20p"><span>تاريخ الإنشاء</span></th>
                                        <th class="wd-lg-20p"><span>الحالة</span></th>
                                        @if(auth()->user()->isAdmin())
                                        <th class="wd-lg-20p">إجراء</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lessons as $lesson)
                                        @if($lesson->status=='active')
                                            <tr>

                                                <td><a href="{{route('lesson.show',$lesson->id)}}">{{$lesson->name}}</a>
                                                    @if ($lesson->isNew())
                                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                    @endif</td>
                                                <td>{{$lesson-> description}}</td>
                                                <td>
                                                    {{$lesson->created_at->diffForHumans() }}
                                                </td>
                                                @if($lesson->status =='active')
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

                                                        <form method="POST" action="{{route('lesson.delete',$lesson->id)}}" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                        </form>

                                                        <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>
                                        @else
                                            @if(auth()->user()->hasRole('أدمن'))
                                                <tr>

                                                    <td><a href="{{route('lesson.show',$lesson->id)}}">{{$lesson->name}}</a>  @if ($lesson->isNew())
                                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                        @endif</td>
                                                    <td>{{$lesson-> description}}</td>
                                                    <td>
                                                        {{$lesson->created_at->diffForHumans() }}
                                                    </td>
                                                    @if($lesson->status =='active')
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

                                                            <form method="POST" action="{{route('lesson.delete',$lesson->id)}}" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                            </form>

                                                            <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>

                                            @endif
                                        @endif
                                    @endforeach

                                    </tbody>
                                </table>
                                <nav class="mt-4" aria-label="Page navigation example">
                                    <ul class="pagination round-pagination">

                                        <!-- Previous Page Link -->
                                        @if ($lessons->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link"> < </span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $lessons->previousPageUrl() }}">< </a></li>
                                        @endif

                                        <!-- Pagination Links -->
                                        @foreach ($lessons->getUrlRange(1, $lessons->lastPage()) as $page => $url)
                                            @if ($page == $lessons->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($lessons->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $lessons->nextPageUrl() }}"> > </a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link"> > </span></li>
                                        @endif

                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>

            <!-- row closed  -->
        @endif
    </div>




@endsection
