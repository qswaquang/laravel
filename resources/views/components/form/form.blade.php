<form class="py-4 px-4" method="post" action="{{ $attributes['action'] }}" accept-charset="UTF-8">
      @csrf
      {{ $slot }}
</form>