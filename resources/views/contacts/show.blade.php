@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    {{ $contact->first_name }} -
    {{ $contact->last_name }} 
  </div>
</div>
@endsection
