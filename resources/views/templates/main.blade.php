@extends('templates.components.index')

@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المستخدمين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($users)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المناهج</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($curriculums)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المستويات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($levels)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي الوحدات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($units)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المستخدمين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($users)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-teal-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المناهج</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($curriculums)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-purple-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي المستويات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($levels)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-pink-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي الوحدات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex d-flex justify-content-center align-items-center">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{count($units)}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
