<div>
    {{ $slot }}
    <a href="{{ $attributes['toolAddHref'] }}" class="font-medium text-base text-gray-700 hover:text-blue-600 hover:underline">
        <i class="fa-solid fa-file-circle-plus"></i>
        {{$attributes['toolAddText']}}
    </a>
</div>