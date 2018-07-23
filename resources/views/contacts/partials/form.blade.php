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
    <input type="text" class="form-control" id="firstNameInput" name="first_name"
    @if (isset($contact->first_name) && !empty($contact->first_name))
      value="{{ $contact->first_name }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="middleNameInput" class="col-sm-2 col-form-label">Middle Name</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="middleNameInput" name="middle_name"
    @if (isset($contact->middle_name) && !empty($contact->middle_name))
      value="{{ $contact->middle_name }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="lastNameInput" class="col-sm-2 col-form-label">Last Name <span class="text-danger">*</span></label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="lastNameInput" name="last_name"
    @if (isset($contact->last_name) && !empty($contact->last_name))
      value="{{ $contact->last_name }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="emailInput" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="emailInput" name="email"
    @if (isset($contact->email) && !empty($contact->email))
      value="{{ $contact->email }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="phoneInput" class="col-sm-2 col-form-label">Phone</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="phoneInput" name="phone"
    @if (isset($contact->phone) && !empty($contact->phone))
      value="{{ $contact->phone }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="addressInput" class="col-sm-2 col-form-label">Address</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="addressInput" name="address"
    @if (isset($contact->address) && !empty($contact->address))
      value="{{ $contact->address }}"
    @endif
    @if (isset($disableForms) && $disableForms)
      {{ 'disabled' }}
    @endif
    />
  </div>
</div>
<div class="form-group row">
  <label for="groupInput" class="col-sm-2 col-form-label">Group</label>
  <div class="col-sm-10">
    @if (!isset($disableForms))
    <select class="form-control" id="groupInput" name="group">
      <option disabled> -- </option>
      @foreach ($groups as $group)
        <option value="{{ $group->id }}"
          @if (isset($group->id) && isset($contact->group_id) && $group->id === $contact->group_id)
            {{ 'selected' }}
          @endif
          >{{ $group->name }}</option>
      @endforeach
    </select>
    @else
      <input class="form-control" type="text" value="{{ $contact->address }}" disabled />
    @endif
  </div>
</div>
@if (!isset($disableForms))
<div class="form-group row">
  <div class="col-sm-12 text-center">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
@endif
