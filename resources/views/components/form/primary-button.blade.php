<button id="{{ $attributes['id']}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline {{ $attributes['class'] }}" type="{{ $attributes['type'] ? $attributes['type']  : 'submit'}}">
    {{ $slot }}
</button>
