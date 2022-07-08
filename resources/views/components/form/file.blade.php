<div class="{{ $attributes['class'] }}">
    <input class="my-4 hidden" type="file" {{ $attributes['accept'] }} id="{{ $attributes['id'] }}" name="{{ $attributes['name'] }}">
    <input class="m-auto border rounded-full px-3 py-2 bg-gradient-to-r from-purple-200 to-blue-200 hover:from-purple-300 hover:to-blue-300" type="button" value="Upload File" onclick="$('#{{ $attributes['id'] }}').click();"/>
</div>