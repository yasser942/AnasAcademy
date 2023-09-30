@extends('templates.components.index')

@section('content')
   @include('templates.components.session-messages')

    <div class="row row-xs wd-xl-80p">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('level.create',$curriculum->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء مستوى جديد</a></div>
        @endif
    </div>


    <!-- row opened -->
    <div class="row row-sm mt-4">
        @if(count($curriculum->levels )==0)
                <div class="card-body text-center">
                    <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                    <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
                </div>
        @else

        @foreach($curriculum->levels as $level)
            @if($level->status =='active')
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            @if($level->image)
                                <img src="{{Storage::url('levels/'.$level->image->filename)}}" alt="..." class="card-img">

                            @else
                                <img src="{{asset('assets/img/noimg.png')}}" alt="..." class="card-img">

                            @endif                            <div class="card-body">
                                <a href="{{route('level.show',$level->id)}}"><h4 class="card-title mb-3">{{$level->name}}</h4></a>
                                <p class="card-text">{{$level->description}}</p>
                                <div class="btn-icon-list">
                                    @if(auth()->user()->isAdmin())

                                    <form method="POST" action="{{route('level.delete',$level->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')

                                        <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                    </form>

                                    <a href="{{route('level.edit',$level->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                    @endif
                                    @if($level->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>

                                    @endif

                                    <span class="badge badge-pill badge-danger-transparent mr-2">{{$curriculum->name}}</span>
                                    <span class="badge badge-pill badge-primary-transparent mr-2">عدد الوحدات {{count($level->units)}}  </span>
                                    @if ($level->isNew())
                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            @else
                @if(auth()->user()->hasRole('أدمن'))
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="card">
                                @if($level->image)
                                    <img src="{{Storage::url('levels/'.$level->image->filename)}}" alt="..." class="card-img">

                                @else
                                    <img src="{{asset('assets/img/noimg.png')}}" alt="..." class="card-img">

                                @endif
                                    <div class="card-body">
                                    <a href="{{route('level.show',$level->id)}}"><h4 class="card-title mb-3">{{$level->name}}</h4></a>
                                    <p class="card-text">{{$level->description}}</p>
                                    <div class="btn-icon-list">
                                        @if(auth()->user()->isAdmin())

                                        <form method="POST" action="{{route('level.delete',$level->id)}}" class="ml-2">
                                            @csrf
                                            @method('DELETE')

                                            <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                        </form>

                                        <a href="{{route('level.edit',$level->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                        @endif
                                        @if($level->status=='active')
                                            <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                        @else
                                            <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>

                                        @endif

                                        <span class="badge badge-pill badge-danger-transparent mr-2">{{$curriculum->name}}</span>
                                        <span class="badge badge-pill badge-primary-transparent mr-2">عدد الوحدات {{count($level->units)}}  </span>
                                        @if ($level->isNew())
                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            @endif

        @endforeach
        @endif
    </div>
    <!-- row closed -->



@endsection


