@extends('templates.components.index')
@section('content')
    @include('templates.components.session-messages')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">إرسال إشعار جديد</h3>
    </div>
    <div class="card-body">
        <form action="{{route('notification.store')}}" method="POST">
            @csrf
            <input type="hidden" name="sender" value="{{auth()->user()->id}}">

            <div class="form-group">
                <div class="row align-items-center">
                    <label class="col-sm-2">الموضوع</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" required value="{{old('subject')}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row ">
                    <label class="col-sm-2">النص</label>
                    <div class="col-sm-10">
                        <textarea rows="10" class="form-control" name="message" required >{{old('message')}}</textarea>
                    </div>
                </div>
            </div>
            <button  type="submit" class="btn btn-success-gradient btn-space">إرسال</button>

        </form>
    </div>
    <div class="card-footer d-sm-flex">




    </div>
</div>
@endsection
