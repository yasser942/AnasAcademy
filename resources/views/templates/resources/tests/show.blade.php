@extends('templates.components.index')

@section('content')
    <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a href="{{route('question.create',$test->id)}}" class="btn btn-outline-indigo btn-rounded btn-block">إنشاء أسئلة</a></div>
    <h1 class="mt-2">{{ $test->name }}</h1>

    <livewire:test-taker :test_id="$test->id" />



@endsection
