@extends('templates.components.index')

@section('content')
    @php
        \Carbon\Carbon::setLocale('ar');
    @endphp

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

        <div class="d-flex my-xl-auto right-content">

            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-delete"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-pen"></i></button>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
 @if(count($notifications)==0)
     <div class="card-body text-center">
         <img src="{{asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
         <h5 class="mg-b-10 mg-t-15 tx-18">لا يوجد شيء لعرضه</h5>
     </div>
 @else
     <div class="card">
         <div class="main-content-body main-content-body-mail card-body">
             <div class="main-mail-header">
                 <div>
                     <h4 class="main-content-title mg-b-5">الإشعارات</h4>
                     <p>{{count(auth()->user()->unreadNotifications)}} إشعار غير مقروء</p>
                 </div>
                 <div>
                     <span>1-50 of 1200</span>
                     <div class="btn-group" role="group">
                         <button class="btn btn-outline-secondary disabled" type="button"><i class="icon ion-ios-arrow-forward"></i></button> <button class="btn btn-outline-secondary" type="button"><i class="icon ion-ios-arrow-back"></i></button>
                     </div>
                 </div>
             </div><!-- main-mail-list-header -->
             <!-- main-mail-options -->
             <div class="main-mail-list">
                 @foreach($notifications as $notification)
                     @if($notification->read_at)
                             <div class="main-mail-item ">
                                 <a href="{{route('notification.show',$notification->id)}}">

                                 <div class="main-img-user"><img alt="" src=" {{\App\Models\User::find($notification->data['sender'])->profile_photo_url}}"></div>
                                 </a>

                                 <div class="main-mail-body">
                                     <div class="main-mail-from">
                                         {{\App\Models\User::find($notification->data['sender'])->name}}
                                     </div>

                                     <div class="main-mail-subject">
                                         <strong>{{$notification->data['subject']}}</strong>
                                         <div>
                                             <span>{{\Str::limit($notification->data['message'],100)}}</span>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="main-mail-date">
                                     {{$notification->created_at->diffForHumans()}}

                                 </div>

                                     <div class="d-flex my-xl-auto right-content">

                                         <div class="pr-1 mb-3 mb-xl-0">
                                             <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-delete"></i></button>
                                         </div>
                                         <div class="pr-1 mb-3 mb-xl-0">
                                             <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-pen"></i></button>
                                         </div>
                                     </div>


                             </div>

                     @else
                         <a href="{{route('notification.show',$notification->id)}}">
                             <div class="main-mail-item unread">
                                 <div class="main-mail-checkbox">
                                     <label class="ckbox"><input type="checkbox"> <span></span></label>
                                 </div>

                                 <div class="main-img-user"><img alt="" src=" {{\App\Models\User::find($notification->data['sender'])->profile_photo_url}}"></div>
                                 <div class="main-mail-body">
                                     <div class="main-mail-from">
                                         {{\App\Models\User::find($notification->data['sender'])->name}}
                                     </div>
                                     <div class="main-mail-subject">
                                         <strong>{{$notification->data['subject']}}</strong>
                                         <div>
                                             <span>{{\Str::limit($notification->data['message'],100)}}</span>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="main-mail-date">
                                     {{$notification->created_at->diffForHumans()}}
                                 </div>
                             </div>
                         </a>


                     @endif
                 @endforeach


             </div>
             <div class="mg-lg-b-30"></div>
         </div>
     </div>

 @endif

@endsection
