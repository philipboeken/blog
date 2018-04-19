@extends('layouts.center')

@section('title')
    Contacts
@endsection

@section('content-mid')
  <contacts-page :contacts="{{ $contacts }}"></contacts-table>
@endsection
