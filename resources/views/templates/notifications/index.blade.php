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

                                                 <button type="submit" class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
                                                     <i class="mdi mdi-delete"></i>
                                                 </button>
                                             </form>
                                     </div>

                                 </div>


                             </div>

                     @else
                         <div class="main-mail-item unread ">
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

                                                     <button type="submit" class="btn btn-danger-gradient btn-icon" onclick="return confirmDelete(this.form,'هل أنت متأكد من عملية الحذف ؟')">
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
    <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination round-pagination">

            <!-- Previous Page Link -->
            @if ($notifications->onFirstPage())
                <li class="page-item disabled"><span class="page-link"> < </span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $notifications->previousPageUrl() }}"> < </a></li>
            @endif

            <!-- Pagination Links -->
            @foreach ($notifications->getUrlRange(1, $notifications->lastPage()) as $page => $url)
                @if ($page == $notifications->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($notifications->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $notifications->nextPageUrl() }}"> > </a></li>
            @else
                <li class="page-item disabled"><span class="page-link"> > </span></li>
            @endif

        </ul>
    </nav>

@endsection
