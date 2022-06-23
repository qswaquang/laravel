<form class="py-4 px-5" method="post" action="{{ $attributes['action'] }}" accept-charset="UTF-8">
      @csrf
      {{ $slot }}
</form>