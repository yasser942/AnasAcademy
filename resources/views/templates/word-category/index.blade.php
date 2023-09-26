@extends('templates.components.index')
@php
    \Carbon\Carbon::setLocale('ar');
@endphp
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
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('word-category.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء مجموعة جديدة</a></div>
        @endif
    </div>

    <div class="row mt-4">
        @if(count($wordCategories)==0)
            <div class="card-body text-center">
                <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
                <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
            </div>
        @else

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="wd-lg-8p"><span>اسم المجموعة</span></th>
                                        <th class="wd-lg-8p"><span>وصف المجموعة</span></th>
                                        <th class="wd-lg-20p"><span>تاريخ الإنشاء</span></th>
                                        <th class="wd-lg-20p"><span>عدد الكلمات</span></th>
                                        <th class="wd-lg-20p"><span>الحالة</span></th>
                                        @if(auth()->user()->isAdmin())
                                        <th class="wd-lg-20p">إجراء</th>
                                            @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wordCategories as $category)
                                        @if($category->status=='active')
                                            <tr>

                                                <td><a href="{{route('word-category.show',$category->id)}}">{{$category->name}}</a>
                                                    @if ($category->isNew())
                                                        <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                @endif
                                                <td>{{$category-> description}}</td>

                                                <td>
                                                    {{$category->created_at->diffForHumans() }}

                                                </td>
                                                <td>{{$category-> cards->count()}}</td>

                                                @if($category->status =='active')
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

                                                        <form method="POST" action="{{route('word-category.delete',$category->id)}}" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                        </form>

                                                        <a href="{{route('word-category.edit',$category->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
                                                        @endif
                                                    </div>

                                                </td>
                                            </tr>
                                        @else
                                            @if(auth()->user()->hasRole('أدمن'))
                                                <tr>

                                                    <td><a href="{{route('word-category.show',$category->id)}}">{{$category->name}}</a> @if ($category->isNew())
                                                            <div class="badge bg-success-gradient text-white m-2 ">جديد</div>
                                                        @endif</td>
                                                    <td>{{$category-> description}}</td>

                                                    <td>
                                                        {{$category->created_at->diffForHumans() }}   <div class="badge bg-success text-white ">جديد</div>

                                                    </td>
                                                    <td>{{$category-> cards->count()}}</td>

                                                    @if($category->status =='active')
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

                                                            <form method="POST" action="{{route('word-category.delete',$category->id)}}" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button  class="btn btn-danger-gradient btn-icon"  onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')"><i class="typcn typcn-trash"></i></button>
                                                            </form>

                                                            <a href="{{route('word-category.edit',$category->id)}}" class="btn btn-info-gradient btn-icon"><i class="typcn typcn-edit"></i></a>
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
                                        @if ($wordCategories->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link"> < </span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $wordCategories->previousPageUrl() }}"> < </a></li>
                                        @endif

                                        <!-- Pagination Links -->
                                        @foreach ($wordCategories->getUrlRange(1, $wordCategories->lastPage()) as $page => $url)
                                            @if ($page == $wordCategories->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($wordCategories->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $wordCategories->nextPageUrl() }}"> > </a></li>
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
