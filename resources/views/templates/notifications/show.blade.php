@extends('templates.components.index')
@section('content')
    @php
        \Carbon\Carbon::setLocale('ar');
    @endphp
    @include('templates.components.session-messages')
    <div class="card">
    <div class="card-body">
        <div class="email-media">
            <div class="mt-0 d-sm-flex">
                <img class="ml-2 rounded-circle avatar-xl" src="{{\App\Models\User::find($notification->data['sender'])->profile_photo_url}}" alt="avatar">
                <div class="media-body">
                    <div class="float-left d-none d-md-flex fs-15">
                        <span class="mr-3">{{$notification->created_at->diffForHumans()}}</span>
                       </div>
                    <div class="media-title  font-weight-bold mt-3">{{\App\Models\User::find($notification->data['sender'])->name}}</div>
                    <p class="mb-0">{{$notification->data['subject']}}</p>
                    <small class="mr-2 d-md-none"> {{$notification->created_at->diffForHumans()}}</small>
                    <small class="mr-2 d-md-none"><i class="fe fe-star text-muted" data-toggle="tooltip" title="" data-original-title="Rated"></i></small>
                    <small class="mr-2 d-md-none"><i class="fa fa-reply text-muted" data-toggle="tooltip" title="" data-original-title="Reply"></i></small>
                </div>
            </div>
        </div>
        <div class="eamil-body mt-5">

           <p class="mb-0">{{$notification->data['message']}}</p>
        </div>
    </div>
    </div>
@endsection
