<div>
    <input type="{{ $attributes['type'] ? $attributes['name'] : 'text' }}" name="{{ $attributes['name'] }}" class="shadow appearance-none border rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $attributes['class'] }}" id="{{ $attributes['id'] }}" placeholder="{{ $attributes['placeholder'] }}" value="{{ $attributes['value'] }}" />
</div>