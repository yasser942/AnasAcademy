@extends('templates.components.index')

@section('content')




    <!-- row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">إجمالي المستخدمين</h5>
                            <h2 class="counter mb-0 text-white">{{count($users)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">إجمالي المناهج</h5>
                            <h2 class="counter mb-0 text-white">{{count($curriculums)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3">إجمالي المستويات</h5>
                            <h2 class="counter mb-0 text-white">{{count($levels)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="tx-13 tx-white-8 mb-3"> إجمالي الامتحانات</h5>
                            <h2 class="counter mb-0 text-white">{{count($exams)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">المشتركين</div>

                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                        <hr />



                    </div>

                </div>
            </div>
        </div>
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}

    @include('templates.components.notification')

@endsection
