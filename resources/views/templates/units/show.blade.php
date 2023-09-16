@extends('templates.components.index')
@php
    \Carbon\Carbon::setLocale('ar');
@endphp
@section('content')
    @include('templates.components.session-messages')


    <div class="row row-xs wd-xl-80p">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('lesson.create',$unit->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء درس جديد</a></div>
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
                                <h4 class="card-title mg-b-0">USERS TABLE</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
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
                                        <th class="wd-lg-20p">إجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($unit->lessons as $lesson)
                                        <tr>

                                            <td><a href="{{route('lesson.show',$lesson->id)}}">{{$lesson->name}}</a></td>
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
                                                    <form method="POST" action="{{route('lesson.delete',$lesson->id)}}" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                    </form>

                                                    <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                   </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination mt-4 mb-0 float-left">
                                <li class="page-item page-prev disabled">
                                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item page-next">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>

            <!-- row closed  -->
        @endif
    </div>




@endsection
