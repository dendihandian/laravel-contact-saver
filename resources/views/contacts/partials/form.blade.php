@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<div class="form-group row">
  <label for="firstNameInput" class="col-sm-2 col-form-label">First Name</label>
  <div class="col-sm-10">
    {!! Form::text("first_name", null, ['class' => 'form-control', 'id' => 'firstNameInput']) !!}
  </div>
</div>
<div class="form-group row">
  <label for="middleNameInput" class="col-sm-2 col-form-label">Middle Name</label>
  <div class="col-sm-10">
    {!! Form::text("middle_name", null, ['class' => 'form-control', 'id' => 'middleNameInput']) !!}
  </div>
</div>
<div class="form-group row">
  <label for="lastNameInput" class="col-sm-2 col-form-label">Last Name</label>
  <div class="col-sm-10">
    {!! Form::text("last_name", null, ['class' => 'form-control', 'id' => 'lastNameInput']) !!}
  </div>
</div>
<div class="form-group row">
  <label for="emailInput" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    {!! Form::email("email", null, ['class' => 'form-control', 'id' => 'emailInput']) !!}
  </div>
</div>
<div class="form-group row">
  <label for="phoneInput" class="col-sm-2 col-form-label">Phone</label>
  <div class="col-sm-10">
    {!! Form::text("phone", null, ['class' => 'form-control', 'id' => 'phoneInput']) !!}
  </div>
</div>
<div class="form-group row">
  <label for="addressInput" class="col-sm-2 col-form-label">Address</label>
  <div class="col-sm-10">
    {!! Form::textarea("address", null, ['class' => 'form-control', 'id' => 'addressInput', 'rows' => 2]) !!}
  </div>
</div>
<div class="form-group row">
  <label for="groupInput" class="col-sm-2 col-form-label">Group</label>
  <div class="col-sm-10">
    @if (isset($contact->group))
      {!! Form::select("group", $groups, $contact->group->id, ['class' => 'form-control', 'placeholder' => 'Select the contact group']) !!}
    @else
      {!! Form::select("group", $groups, null, ['class' => 'form-control', 'placeholder' => 'Select the contact group']) !!}
    @endif
  </div>
</div>
<div class="form-group row">
  <label for="photoInput" class="col-sm-2 col-form-label">Photo</label>
  <div class="col-sm-10">
    {!! Form::file("photo", null, ['class' => 'form-control', 'id' => 'photoInput']) !!}
  </div>
</div>
