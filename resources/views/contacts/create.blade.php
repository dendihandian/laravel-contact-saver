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
      <form class="" action="{{ route('contacts.store') }}" method="post">
        @csrf
        @include('contacts.partials.form');
      </form>
    </div>
  </div>
</div>
@endsection
