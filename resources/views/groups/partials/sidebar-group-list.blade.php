<div class="container">
  <ul class="list-group">
      <li class="list-group-item bg-dark text-light">Groups</li>
    @foreach ($groups as $group)
      <a class="list-group-item list-group-item-action
      @if ($group->id === $currentGroup->id)
        {{ 'active' }}
      @endif
      " href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a>
    @endforeach
  </ul>
</div>
