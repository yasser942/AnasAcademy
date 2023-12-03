@php
    \Carbon\Carbon::setLocale('ar');
@endphp
<!-- main-header opened -->

<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/media/login.png')}}" class="logo-1" alt="logo"></a>
                <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/media/login.png')}}" class="dark-logo-1" alt="logo"></a>
                <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/media/login.png')}}" class="logo-2" alt="logo"></a>
                <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/media/login.png')}}" class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">
            <ul class="nav">

            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
												<button type="reset" class="btn btn-default">
													<i class="fas fa-times"></i>
												</button>
												<button type="submit" class="btn btn-default nav-link resp-btn">
													<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
												</button>
											</span>
                        </div>
                    </form>
                </div>
                
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>@if(count(auth()->user()->unreadNotifications)>0)<span class=" pulse"></span> @endif</a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary-gradient text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الإشعارات</h6>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">لديك {{count(auth()->user()->unreadNotifications)}} إشعار غير مقروءة</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            @foreach(auth()->user()->unreadNotifications as $notification)

                            <a class="d-flex p-3 border-bottom" href="{{route('notification.show',$notification->id)}}">
                                <div class="notifyimg bg-warning">
                                    <i class="la la-envelope-open text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">{{$notification->data['subject']}}</h5>
                                    <div class="notification-subtext">{{$notification->created_at->diffForHumans()}}</div>
                                </div>
                                <div class="mr-auto" >
                                    <i class="las la-angle-left text-left text-muted"></i>
                                </div>
                            </a>
                            @endforeach

                        </div>
                        <div class="dropdown-footer">
                            <a href="{{route('notification.index')}}">عرض الكل</a>
                        </div>
                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt="" src="{{auth()->user()->profile_photo_url}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary-gradient p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{auth()->user()->profile_photo_url}}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{auth()->user()->name}}</h6><span>
                                        @if(auth()->user()->currentPlan())
                                            {{auth()->user()->currentPlan()->name}}
                                        @else
                                            <span class="label text-danger d-flex">لا يوجد</span>
                                        @endif</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('profile.show')}}" target="_blank"><i class="bx bx-cog"></i> تعديل البروفايل</a>
                       <form form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item" ><i class="bx bx-log-out"></i> تسجيل الخروج</button>

                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
