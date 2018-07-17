@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="container">
      <form class="" action="{{ route('contacts.update', $contact->id) }}" method="post">
        @csrf
        @include('contacts.partials.form');
      </form>
    </div>
  </div>
</div>
@endsection
