@extends('templates.components.index')
@section('content')

    <h4 class="card-title m-40">الخطط المتوفرة</h4>
    <!-- row -->
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
                        <a class="btn btn-danger" href="https://wa.me/+905538762316/?text=مرحبا أريد الاشتراك بالمنصة">تواصل معنا للاشتراك</a>
                    </div>
                </div>
            </div><!-- COL-END -->

        @endforeach

    </div>
    <!-- /row -->
@endsection
