@extends('templates.components.index')
@section('content')

    <div class="row row-xs wd-xl-80p mb-4">
        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('plan.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء خطة جديدة</a></div>
    </div>    <!-- row -->
    <div class="row">
        @foreach($plans as $plan)
            <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="panel price panel-color">
                    <div class="panel-heading bg-primary p-0 text-center">
                        <h3>{{$plan->name}}</h3>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead"><strong>{{$plan->price}} $</strong>  </p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>
                        <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>
                        <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>
                        <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>

                    </ul>
                    <div class="panel-footer text-center">
                        <a class="btn btn-warning" href="{{ route('plan.edit', $plan->id) }}">
                            <i class="fa fa-edit"></i> تعديل
                        </a>

                        <form method="POST" action="{{ route('plan.delete', $plan->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirmDelete(this.form, 'هل أنت متأكد من عملية الحذف ؟')">
                                <i class="fa fa-trash"></i> حذف
                            </button>
                        </form>
                    </div>

                </div>
            </div><!-- COL-END -->

        @endforeach

    </div>
    <!-- /row -->
@endsection
