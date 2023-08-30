@extends('templates.components.index')

@section('content')
    @if(session('success'))

        <script>


            // Automatically trigger the function when the page loads
            window.onload = function() {
                not7('نجاح ', "{{session('success')}}");
            };
        </script>
    @endif

    <div class="row row-xs wd-xl-80p">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('unit.create',$level->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء وحدة جديدة</a></div>
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button class="btn btn-outline-secondary btn-rounded btn-block">Secondary</button></div>
    </div>

    <div class="row mt-4">
        @if(count($level->units)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($level->units as $unit)
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <div class="card card-success">
                        <div class="card-header pb-0">
                            <a href="{{route('unit.show',$unit->id)}}"><h5 class="card-title mb-0 pb-0">{{$unit->name}}</h5></a>
                        </div>
                        <div class="card-body text-success">
                            {{$unit->description}}
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <form method="POST" action="{{route('unit.delete',$unit->id)}}" class="ml-2">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                    <i class="typcn typcn-trash"></i>
                                </button>
                            </form>

                            <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-info btn-icon mr-2">
                                <i class="typcn typcn-edit"></i>
                            </a>

                            @if($unit->status=='active')
                                <span class="badge badge-pill badge-success mr-2">مفعل</span>
                            @else
                                <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>
                            @endif

                            <span class="badge badge-pill badge-danger-transparent mr-2">{{$level->name}}</span>
                            <span class="badge badge-pill badge-success-transparent mr-2">عدد الدروس {{count($unit->lessons)}}  </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>




@endsection
