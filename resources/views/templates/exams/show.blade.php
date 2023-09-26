@extends('templates.components.index')

@section('content')
    @if(auth()->user()->isAdmin())

        <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('exam-question.create',$exam->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء أسئلة</a></div>
    @endif
    <livewire:exam-taker :exam_id="$exam->id" />



@endsection
