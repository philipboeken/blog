@extends('layouts.center')

@section('title')
    Agenda
@endsection

@section('content-mid')
    <calendar :events="{{ $events }}"></calendar>
    {{-- <calendar></calendar> --}}
@endsection
