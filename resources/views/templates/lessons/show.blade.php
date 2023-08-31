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

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"> <button data-toggle="dropdown" class="btn btn-indigo btn-block">إنشاء مصدر <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
            <div class="dropdown-menu">
                <a href="{{route('pdf.create',$lesson->id)}}" class="dropdown-item">PDF</a>
                <a href="" class="dropdown-item">نص</a>
                <a href="" class="dropdown-item">إختبار</a>
                <a href="" class="dropdown-item">فيديو</a>
            </div><!-- dropdown-menu --></div>
    </div>

    <div class="row mt-4">
        @if(count($lesson->pdfs)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else
            @foreach($lesson->pdfs as $pdf)
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <div class="card card-warning">
                        <div class="card-header pb-0">
                            <a href="{{route('pdf.show',$pdf->id)}}"><h5 class="card-title mb-0 pb-0">{{$pdf->name}}</h5></a>
                        </div>
                        <div class="card-body text-warning">
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
        @endif
    </div>




@endsection
