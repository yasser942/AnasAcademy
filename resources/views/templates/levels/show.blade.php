@extends('templates.components.index')

@section('content')
    @include('templates.components.session-messages')

    <div class="row row-xs wd-xl-80p">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('unit.create',$level->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء وحدة جديدة</a></div>
        @endif
    </div>

    <div class="row mt-4">
        @if(count($level->units)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($level->units as $unit)
                @if($unit->status =='active')
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card card-success">
                            <div class="card-header pb-0">
                                <a href="{{route('unit.show',$unit->id)}}"><h5 class="card-title mb-0 pb-0">{{$unit->name}}</h5></a>
                            </div>
                            <div class="card-body text-success">
                                {{$unit->description}}
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                @if(auth()->user()->isAdmin())

                                <form method="POST" action="{{route('unit.delete',$unit->id)}}" class="ml-2">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                        <i class="typcn typcn-trash"></i>
                                    </button>
                                </form>

                                <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                    <i class="typcn typcn-edit"></i>
                                </a>
                                @endif

                                @if($unit->status=='active')
                                    <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                @else
                                    <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                @endif

                                <span class="badge badge-pill badge-danger-transparent mr-2">{{$level->name}}</span>
                                <span class="badge badge-pill badge-success-transparent mr-2">عدد الدروس {{count($unit->lessons)}}  </span>
                                @if ($unit->isNew())
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
                                    <a href="{{route('unit.show',$unit->id)}}"><h5 class="card-title mb-0 pb-0">{{$unit->name}}</h5></a>
                                </div>
                                <div class="card-body text-success">
                                    {{$unit->description}}
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('unit.delete',$unit->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                            <i class="typcn typcn-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-info-gradient btn-icon mr-2">
                                        <i class="typcn typcn-edit"></i>
                                    </a>
                                    @endif

                                    @if($unit->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$level->name}}</span>
                                    <span class="badge badge-pill badge-success-transparent mr-2">عدد الدروس {{count($unit->lessons)}}  </span>
                                    @if ($unit->isNew())
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
