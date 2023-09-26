@extends('templates.components.index')
@section('content')

    <div class="row row-xs wd-xl-80p mb-4">
        @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('plan.create')}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء خطة جديدة</a></div>
        @endif
    </div>    <!-- row -->
    @if(auth()->user()->isPlanExpired())
        <div  class="col-sm-6 col-md-" >
            <div class="alert alert-danger" role="alert">
                <strong>تنبيه!</strong> لا يوجد لديك اشتراك حالياً, يرجى الاشتراك بخطة لتتمكن من استخدام النظام و ذلك بالضغط على زر التواصل مع الإدارة.
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($plans as $plan)
            @if($plan->name !='تجريبي' && $plan->name != "مفتوح")
                @if(auth()->user()->currentPlan()->name==$plan->name)
                <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="panel price panel-color">
                        <div class="panel-heading bg-warning-gradient p-0 text-center">
                            <h3>{{$plan->name}} (الخطة الحالية)</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p class="lead"><strong>{{$plan->price}} $</strong>  </p>
                        </div>

                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>


                        </ul>
                        <div class="panel-footer text-center">
                            @if(auth()->user()->isAdmin())

                            <a class="btn btn-warning-gradient" href="{{ route('plan.edit', $plan->id) }}">
                                <i class="fa fa-edit"></i> تعديل
                            </a>

                            <form method="POST" action="{{ route('plan.delete', $plan->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger-gradient" onclick="return confirmDelete(this.form, 'هل أنت متأكد؟ سوف يتم حذف الاشتراكات المرتبطة بهذه الخطة.')">
                                    <i class="fa fa-trash"></i> حذف
                                </button>
                            </form>
                            @endif
                        </div>

                    </div>
                </div><!-- COL-END -->
                @else
                    <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="panel price panel-color">
                            <div class="panel-heading bg-primary-gradient p-0 text-center">
                                <h3>{{$plan->name}}</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead"><strong>{{$plan->price}} $</strong>  </p>
                            </div>

                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><strong>{{$plan->description}} <br></strong></li>


                            </ul>
                            <div class="panel-footer text-center">
                                @if(auth()->user()->isAdmin())

                                <a class="btn btn-warning-gradient" href="{{ route('plan.edit', $plan->id) }}">
                                    <i class="fa fa-edit"></i> تعديل
                                </a>

                                <form method="POST" action="{{ route('plan.delete', $plan->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger-gradient" onclick="return confirmDelete(this.form, 'هل أنت متأكد؟ سوف يتم حذف الاشتراكات المرتبطة بهذه الخطة.')">
                                        <i class="fa fa-trash"></i> حذف
                                    </button>
                                </form>
                                @endif
                            </div>

                        </div>
                    </div><!-- COL-END -->

                @endif

            @endif

        @endforeach

    </div>
    <!-- /row -->
@endsection
