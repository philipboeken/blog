@extends('layouts.center')

@section('title')
    Alle berichten
@endsection

@section('content-mid')
    <posts-page :posts="{{ $posts }}" :filter="{{ $filter }}"></posts-page>
@endsection
