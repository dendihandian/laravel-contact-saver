<div class="container">
  <div class="row justify-content-center justify-content-sm-end mb-4">
    <a href="{{ route('contacts.create') }}">
      <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp; Create New Contact</button>
    </a>
  </div>
  <div class="row justify-content-center">
    <table class="table table-bordered table-striped table-hover">
      <thead class="bg-dark text-light">
        <tr>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Email</th>
          <th scope="col" class="text-center" width="21%">Actions</th>
        </tr>
      </thead>
      <tbody class="">
        @if ($contacts->count())
          @foreach ($contacts as $contact)
            <tr>
              <td scope="row">{{ $contact->first_name }}</td>
              <td scope="row">{{ $contact->last_name }}</td>
              <td scope="row">{{ $contact->email }}</td>
              <td scope="row" class="text-center">
                <nav class="nav justify-content-center">
                  <a href="{{ route('contacts.show', $contact->id) }}" class="nav-link text-dark pt-0 pb-0"><i class="fas fa-eye text-info"></i></a>
                  <a href="{{ route('contacts.edit', $contact->id) }}" class="nav-link text-dark pt-0 pb-0"><i class="fas fa-edit text-success"></i></a>
                  <a href="{{ route('contacts.destroy', $contact->id) }}" class="nav-link text-dark pt-0 pb-0" data-toggle="modal" data-target="#exampleModal-{{ $contact->id }}"><i class="fas fa-trash-alt text-danger"></i></a>
                  <!-- Delete Form of the Contact -->
                  <form id="delete-contact-form-{{$contact->id}}" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </nav>
            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="exampleModal-{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete '{{ $contact->last_name }}' contact?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">Are you sure want to delete '<span class="font-weight-bold">'{{ $contact->last_name }}</span>' contact?</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-contact-form-{{$contact->id}}').submit();">Yes</button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <tr>
            <td colspan="4" class="text-center">No Contacts Found</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
