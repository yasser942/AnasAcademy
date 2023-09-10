@extends('templates.components.index')

@section('content')
@include('templates.components.session-messages')

  @livewire('favorite', ['cards' => $cards])

@endsection
