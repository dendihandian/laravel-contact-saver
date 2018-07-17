@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <table class="table table-bordered table-striped table-hover">
        <thead class="bg-dark text-light">
          <tr>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="">
          @foreach ($contacts as $contact)
            <tr>
              <td scope="row">{{ $contact->first_name }}</td>
              <td scope="row">{{ $contact->last_name }}</td>
              <td scope="row">{{ $contact->email }}</td>
              <td scope="row" class="text-center"><a href="#" class="text-dark"><i class="fas fa-edit"></i></a>&nbsp;<a href="#" class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
