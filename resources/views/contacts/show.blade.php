@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-sm-start">
      <a href="{{ route('contacts.index') }}">
        <button class="btn btn-sm btn-warning"><i class="fas fa-backward"></i>&nbsp; Back To Contact List</button>
      </a>
    </div>
    <div class="row justify-content-center mt-4">
      <div class="container">
        <p>Well, we cannot use html collective for show</p>
      </div>
    </div>
  </div>
@endsection
