<div class="container">
  <ul class="list-group">
      <li class="list-group-item bg-dark text-light font-weight-bold">Groups</li>
    @foreach ($groups as $group)
      <a class="list-group-item list-group-item-action
      @if ($group->id === $currentGroup->id)
        {{ 'bg-secondary text-light font-weight-bold' }}
      @endif
      " href="{{ route('groups.show', $group->slug) }}">{{ $group->name }}</a>
    @endforeach
  </ul>
</div>
