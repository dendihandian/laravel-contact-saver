@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        @include('groups.partials.sidebar-group-list')
      </div>
      <div class="col-sm-9">
        @include('contacts.partials.contact-list')
      </div>
    </div>
  </div>
@endsection
