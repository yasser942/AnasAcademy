
@extends('templates.components.index')

@section('content')

    @livewire('exam-question-creator',['exam_id'=>$exam->id])
@endsection
