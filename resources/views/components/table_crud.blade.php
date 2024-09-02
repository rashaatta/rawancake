<div class="btn-group">
    <button class="btn btn-block btn-secondary dropdown-toggle  " data-toggle="dropdown"  type="button" >
        <i class='fas fa-bars'></i>
        {{trans('general.take_action')}}
    </button>
    <div class="dropdown-menu" role="menu">
        {{-- view --}}
        @if(!empty($showViewButton))
            <a class="dropdown-item" href="{{ route('dashboard.' . $entity->blob . '.show', $entity) }}">
{{--                <i class='fas fa-eye'></i>--}}
                {{trans('general.view')}}
            </a>
        @endif

        {{-- edit --}}
        @if(!empty($showEditButton))
            <a class="dropdown-item" href="{{ route('dashboard.' . $entity->blob . '.edit', $entity) }}">
{{--                <i class='fas fa-edit'></i>--}}
                {{trans('general.edit')}}
            </a>
        @endif
        {{-- edit --}}
        @if(isset($showOptionsButton)&&!empty($showOptionsButton))
            <a class="dropdown-item" href="{{ route('dashboard.' . $entity->blob . '.options', $entity) }}">
{{--                <i class='fas fa-edit'></i>--}}
                {{trans('general.options')}}
            </a>
        @endif
        {{-- delete --}}
        @if(!empty($showDeleteButton))
            <a class="dropdown-item" onclick="deleteItem('{{ route('dashboard.' . $entity->blob . '.delete', $entity) }}')" href="#" >
{{--                <i class='fas fa-delete'></i>--}}
                {{trans('general.delete')}}
            </a>
        @endif
        @foreach ($otherUrls ?? [] as $otherUrl)
            <a class="dropdown-item" href="{{ $otherUrl['url'] }}">
                <i class='{{ $otherUrl['icon'] }}'></i>
                @langucw($otherUrl['title'])
            </a>
        @endforeach


    </div>

</div>
