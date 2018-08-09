@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center justify-content-sm-start">
      <a href="{{ route('contacts.index') }}">
        <button class="btn btn-sm btn-warning"><i class="fas fa-backward"></i>&nbsp; Back To Contact List</button>
      </a>
    </div>
    <div class="card mt-4 row">
      <div class="card-header bg-dark text-light">
        <div class="d-flex justify-content-between">
          <div>Contact Information</div>
          <div>
            <a href="{{ route('contacts.edit', $contact->id ) }}">
              <button class="btn btn-success btn-sm">Edit</button>
            </a>
            <a href="{{ route('contacts.destroy', $contact->id ) }}">
              <button class="btn btn-danger btn-sm">Delete</button>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body container row">
        <div class="col-sm-12 col-md-4 p-3">
          <div class="d-flex justify-content-center">
            @if (isset($contact->photo) && !empty($contact->photo))
              <img width="200px" class="img-fluid img-circle border" src="{{ asset('storage/' . $contact->photo) }}" alt="{{ $contact->last_name }}" />
            @else
              <img class="img-fluid img-circle border" src="{{ asset('storage/photo-placeholder.png') }}" alt="default contact photo" />
            @endif
          </div>
        </div>
        <div class="col-sm-12 col-md-4 pt-3">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">First Name</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->first_name }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Middle Name</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->middle_name }}" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->last_name }}" />
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 pt-3">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->phone }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Address</label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" value="{{ $contact->address }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
