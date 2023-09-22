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
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('curriculum.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء منهج جديد</a></div>
    </div>


    <!-- row opened -->
    <div class="row row-sm mt-4">
        @if(count($curriculums)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else

            @foreach($curriculums as $curriculum)
                @if($curriculum->status =='active')
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            <img class="card-img-top w-100" src="{{asset('assets/img/levels/cover.png')}}" alt="">
                            <div class="card-body">
                                <a href="{{route('curriculum.show',$curriculum->id)}}"> <h4 class="card-title mb-3">{{$curriculum->name}}</h4></a>
                                <p class="card-text">{{$curriculum->description}}</p>
                                <div class="btn-icon-list">
                                    <form method="POST" action="{{route('curriculum.delete',$curriculum->id)}}" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من ذلك  ؟')" ><i class="typcn typcn-trash"></i></button>
                                    </form>

                                    <a href="{{route('curriculum.edit',$curriculum->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                    @if($curriculum->status=='active')
                                        <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                    @else
                                        <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>

                                    @endif
                                    <span class="badge badge-pill badge-primary-transparent mr-2">عدد المستويات {{count($curriculum->levels)}}  </span>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @if(auth()->user()->hasRole('أدمن'))
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="card">
                                <img class="card-img-top w-100" src="{{asset('assets/img/levels/cover.png')}}" alt="">
                                <div class="card-body">
                                    <a href="{{route('curriculum.show',$curriculum->id)}}"> <h4 class="card-title mb-3">{{$curriculum->name}}</h4></a>
                                    <p class="card-text">{{$curriculum->description}}</p>
                                    <div class="btn-icon-list">
                                        <form method="POST" action="{{route('curriculum.delete',$curriculum->id)}}" class="ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من ذلك  ؟')" ><i class="typcn typcn-trash"></i></button>
                                        </form>

                                        <a href="{{route('curriculum.edit',$curriculum->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                        @if($curriculum->status=='active')
                                            <span class="badge badge-pill badge-success mr-2">مفعل</span>
                                        @else
                                            <span class="badge badge-pill badge-danger mr-2"> غير مفعل</span>

                                        @endif
                                        <span class="badge badge-pill badge-primary-transparent mr-2">عدد المستويات {{count($curriculum->levels)}}  </span>

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


