@if ($navigation)
  <ul class="my-menu flex flex-col xl:flex-row xl:items-center lx:flex-nowrap">
    @foreach ($navigation as $item)
      <li class="my-menu-item xl:ml-2 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
        <a class="my-5 xl:px-2.5 hover:underline lg:hover:no-underline xl:hover:text-secondary" href="{{ $item->url }}">
          {{ $item->label }}
        </a>
        @if ($item->children)
          <ul class="my-child-menu">
            @foreach ($item->children as $child)
              <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">
                <a href="{{ $child->url }}">
                  {{ $child->label }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif