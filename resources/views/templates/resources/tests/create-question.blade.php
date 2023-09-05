
@extends('templates.components.index')

@section('content')

    @livewire('question-creator',['test_id'=>$test->id])
@endsection
