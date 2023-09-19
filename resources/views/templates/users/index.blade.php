@extends('templates.components.index')
@php
    \Carbon\Carbon::setLocale('ar');
@endphp
@section('content')
    @include('templates.components.session-messages')


    <div class="row row-xs wd-xl-80p">
    </div>

    <div class="row mt-4">
        @if(count($users)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">قائمة المستخدمين</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                    <tr>

                                        <th class="wd-lg-8p"><span>الاسم</span></th>
                                        <th class="wd-lg-20p"><span></span></th>
                                        <th class="wd-lg-8p"><span>نوع المستخدم</span></th>
                                        <th class="wd-lg-8p"><span>الحالة</span></th>
                                        <th class="wd-lg-8p"><span>العضوية</span></th>
                                        <th class="wd-lg-8p"><span>الأيام المتبقية</span></th>
                                        <th class="wd-lg-8p"><span>الإيميل</span></th>
                                        <th class="wd-lg-20p"><span>تاريخ الإنشاء</span></th>
                                        <th class="wd-lg-20p">إجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{ $user->profile_photo_url }}">
                                            </td>

                                            <td><a href="">{{$user->name}}</a></td>
                                            @foreach($user->roles as $role)
                                                <td>{{$role->name}}</td>

                                            @endforeach
                                            @if($user->status =='active')
                                                <td class="text-center">
                                                    <span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>مفعل</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div>معطل</span>
                                                </td>
                                            @endif
                                            <td>
                                                @if($user->currentPlan())
                                                    {{$user->currentPlan()->name}}
                                                @else
                                                    <span class="label text-danger d-flex">لا يوجد</span>
                                                @endif

                                            </td>
                                            <td>{{$user->daysLeftInCurrentPlan()}}</td>
                                            <td>{{$user-> email}}</td>
                                            <td>
                                                {{$user->created_at->diffForHumans() }}

                                            </td>
                                            <td>
                                                <div class="btn-icon-list">
                                                    <form method="POST" action="{{route('user.delete',$user->id)}}" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                    </form>
                                                    <div class="dropdown ml-2">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-warning-gradient"
                                                                data-toggle="dropdown" type="button">الحالة<i class="fas fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            @if($user->status === 'active')
                                                                <a class="dropdown-item" href="{{ route('user.toggleStatus', [$user->id, 'deactivate']) }}">تعطيل</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ route('user.toggleStatus', [$user->id, 'activate']) }}">تفعيل</a>
                                                            @endif
                                                        </div>
                                                    </div>



                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info-gradient"
                                                                data-toggle="dropdown" type="button">الخطط<i class="fas fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            @foreach($plans as $plan)
                                                                <a class="dropdown-item" href="#">{{$plan->name}}</a>

                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <nav class="mt-4" aria-label="Page navigation example">
                                    <ul class="pagination round-pagination">

                                        <!-- Previous Page Link -->
                                        @if ($users->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link"> < </span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}"> < </a></li>
                                        @endif

                                        <!-- Pagination Links -->
                                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                            @if ($page == $users->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($users->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}"> > </a></li>
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
