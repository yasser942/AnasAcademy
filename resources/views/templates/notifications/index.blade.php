@extends('templates.components.index')

@section('content')
    @include('templates.components.session-messages')
    @php
        \Carbon\Carbon::setLocale('ar');
    @endphp

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

        <div class="d-flex my-xl-auto right-content">
            @if(count($notifications)>0)
            <div class="pr-1 mb-3 mb-xl-0">
                <form method="POST" action="{{route('notification.delete-all')}}" class="ml-2">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-indigo btn-rounded btn-block" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                        <i class="mdi mdi-delete"> حذف جميع الإشعارات</i>
                    </button>
                </form>
            </div>
            @endif

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


                                             <form method="POST" action="{{route('notification.delete',$notification->id)}}" class="ml-2">

                                                 @csrf
                                                 @method('DELETE')

                                                 <button type="submit" class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                     <i class="mdi mdi-delete"></i>
                                                 </button>
                                             </form>
                                     </div>

                                 </div>


                             </div>

                     @else
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


                                                 <form method="POST" action="{{route('notification.delete',$notification->id)}}" class="ml-2">

                                                     @csrf
                                                     @method('DELETE')

                                                     <button type="submit" class="btn btn-danger btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                         <i class="mdi mdi-delete"></i>
                                                     </button>
                                                 </form>
                                 </div>

                             </div>


                         </div>


                     @endif
                 @endforeach


             </div>
             <div class="mg-lg-b-30"></div>
         </div>
     </div>

 @endif

@endsection
