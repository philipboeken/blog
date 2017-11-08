@extends('layouts.app')

@section('title')
    {{ $timeline->title }}
@endsection

@section('content')

    <div>
        {{ $timeline }}
    </div>

@endsection