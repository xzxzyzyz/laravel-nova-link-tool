@if ($parent['router'])
    <router-link tag="h3" :to="{name: '{{ $parent['link'] }}'}" class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
        {!! $icon !!}
        <span class="sidebar-label">
            {{ $parent['label'] }}
        </span>
    </router-link>
@elseif (! empty($parent['link']))
    <a tag="h3" href="{{ $parent['link'] }}" class="flex items-center font-normal text-white mb-6 text-base no-underline">
        {!! $icon !!}
        <span class="sidebar-label">
            {{ $parent['label'] }}
        </span>
    </a>
@else
    <h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
        {!! $icon !!}
        <span class="sidebar-label">
            {{ $parent['label'] }}
        </span>
    </h3>
@endif

@if (count($links))
    <ul class="list-reset mb-8">
        @foreach($links as $link)
            <li class="leading-tight mb-4 ml-8 text-sm">
                @if ($link['router'])
                    <router-link :to="{name: '{{ $link['url'] }}'}" class="text-white text-justify no-underline dim" target="{{ $link['target'] }}">
                        {{ $link['label'] }}
                    </router-link>
                @else
                    <a href="{{ $link['url'] }}" class="text-white text-justify no-underline dim" target="{{ $link['target'] }}">
                        {{ $link['label'] }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
@endif
