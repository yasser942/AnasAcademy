<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

    <!-- Title -->
    <title>أكاديمية أنس</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/media/login.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">



    <!--  Right-sidemenu css -->
    <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('assets/css-rtl/sidemenu.css')}}">

    <!--  Custom Scroll bar-->
    <link href="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

    <!--- Style css-->
    <link href="{{asset('assets/css-rtl/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

</head>

<body class="main-body app sidebar-mini">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- Page -->
<div class="page">

    @include('templates.components.sidebar')

    <!-- main-content -->
    <div class="main-content app-content">

        <!-- main-header opened -->
        @include('templates.components.header')
        <!-- /main-header -->

        <!-- container opened -->
        <div class="container-fluid">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Charts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Morris-charts</span>
                    </div>
                </div>
                <div class="d-flex my-xl-auto right-content">
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
                    </div>
                    <div class="mb-3 mb-xl-0">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-primary">14 Aug 2019</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                                <a class="dropdown-item" href="#">2015</a>
                                <a class="dropdown-item" href="#">2016</a>
                                <a class="dropdown-item" href="#">2017</a>
                                <a class="dropdown-item" href="#">2018</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb -->

            <!-- row -->
            <div class="row row-sm">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Line Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisLine1"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Line Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisLine2"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row row-sm">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Area Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisArea1"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Area Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisArea2"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
            </div>

            <!-- row -->
            <div class="row row-sm">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Stacked Bar Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisBar3"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Stacked Bar Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisBar4"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
            </div>
            <!-- /row -->


            <!-- /row -->

            <!-- row -->
            <div class="row row-sm">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Bar Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisBar1"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Bar Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-wrapper-demo" id="morrisBar2"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row row-sm">
                <div class="col-md-6">
                    <div class="card mg-b-md-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                Donut Chart
                            </div>
                            <p class="mg-b-20">Basic Charts Of Valex template.</p>
                            <div class="morris-donut-wrapper-demo" id="morrisDonut1"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                الاشتركات النشطة
                            </div>
                            <p class="mg-b-20">عدد المشتركين النشطين بكل خطة</p>
                            <div class="morris-donut-wrapper-demo" id="morrisDonut2"></div>
                        </div>
                    </div>
                </div><!-- col-6 -->
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <!-- your-view.blade.php -->






    <script>
        const planData = {!! json_encode($planCounts) !!};

        const donutData = Object.keys(planData).map(label => ({
            label: label,
            value: planData[label]
        }));


    </script>


    <!-- Footer opened -->
    @include('templates.components.footer')

    <!-- Footer closed -->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<!--Internal  Datepicker js -->
<script src="../../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

<!-- Bootstrap Bundle js -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Ionicons js -->
<script src="../../assets/plugins/ionicons/ionicons.js"></script>

<!-- Moment js -->
<script src="../../assets/plugins/moment/moment.js"></script>

<!-- Internal Select2 js-->
<script src="../../assets/plugins/select2/js/select2.min.js"></script>

<!-- P-scroll js -->
<script src="../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- eva-icons js -->
<script src="../../assets/js/eva-icons.min.js"></script>

<!--Internal  Morris js -->
<script src="../../assets/plugins/raphael/raphael.min.js"></script>
<script src="../../assets/plugins/morris.js/morris.min.js"></script>

<!--Internal Chart Morris js -->
<script src="../../assets/js/chart.morris.js"></script>

<!-- Rating js-->
<script src="../../assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="../../assets/plugins/rating/jquery.barrating.js"></script>

<!-- Custom Scroll bar Js-->
<script src="../../assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Left-menu js-->
<script src="../../assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="../../assets/plugins/sidebar/sidebar-rtl.js"></script>
<script src="../../assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- Sticky js -->
<script src="../../assets/js/sticky.js"></script>
<script src="../../assets/js/modal-popup.js"></script>

<!-- custom js -->
<script src="../../assets/js/custom.js"></script>
@include('templates.components.notification')
</body>
</html>
