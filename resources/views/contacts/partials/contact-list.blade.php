<div class="container">
  <div class="row justify-content-end">
    <a href="{{ route('contacts.create') }}">
      <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp; Create New Contact</button>
    </a>
  </div>
  <div class="row justify-content-center mt-4">
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
        @if ($contacts->count())
          @foreach ($contacts as $contact)
          <tr>
            <td scope="row">{{ $contact->first_name }}</td>
            <td scope="row">{{ $contact->last_name }}</td>
            <td scope="row">{{ $contact->email }}</td>
            <td scope="row" class="text-center">
              <nav class="nav justify-content-center">
                <a href="{{ route('contacts.show', $contact->id) }}" class="nav-link text-dark pt-0 pb-0"><i class="fas fa-eye"></i></a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="nav-link text-dark pt-0 pb-0"><i class="fas fa-edit"></i></a>
                <a href="{{ route('contacts.destroy', $contact->id) }}" class="nav-link text-dark pt-0 pb-0" onclick="event.preventDefault();document.getElementById('delete-contact-form-{{$contact->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
                <form id="delete-contact-form-{{$contact->id}}" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </nav>
            </tr>
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
