@extends('layouts.center')

@section('title')
    Contacts
@endsection

@section('content-mid')
  <div class="box is-info">
    <div class="columns is-centered">
        <div class="column is-narrow">
          <contact-modal></contact-modal>
        </div>
    </div>
  </div>
  <contacts-table :contacts="{{ $contacts }}"></contacts-table>
@endsection
