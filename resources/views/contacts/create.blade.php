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
      {!! Form::open(['route' => 'contacts.store', 'files' => true]) !!}
      @include('contacts.partials.form')
      <div class="form-group row">
        <div class="col-sm-12 text-center">
          {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
