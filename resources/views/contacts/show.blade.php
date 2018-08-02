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
        @if (isset($contact->photo) && !empty($contact->photo))
          <img src="{{ asset('storage/' . $contact->photo) }}" alt="{{ $contact->last_name }}" style="max-height:100px;">
        @else
          <img src="{{ asset('storage/photo-placeholder.png') }}" alt="default contact photo" style="max-height:100px;">
        @endif
      </div>
    </div>
  </div>
@endsection
