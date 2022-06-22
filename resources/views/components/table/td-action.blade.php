<td class="px-6 py-3 text-right w-auto whitespace-nowrap">
  @foreach ($actions as $action)
    @switch($action['action'])
      @case('delete')
        @if (!$loop->first)
          <span class="border-l border-gray-700 mx-3"></span>
        @endif
        
        <form class="inline" type="submit" action="{{$action['href']}}" method="POST">
          @method('delete')
          <button 
            type="submit" 
            onclick="return confirm('{{ isset($action['confirm']) ? $action['confirm'] : "Sure Want Delete?" }}')" 
            class="font-medium text-gray-700 hover:text-red-500 hover:underline hover:cursor-pointer">
            <i class="fa-solid fa-trash"></i>
            {{isset($action['text']) ? $action['text'] : "Delete"}}
          </button>
        </form>
        @break

      @case('edit')
        @if (!$loop->first)
          <span class="border-l border-gray-700 mx-3"></span>
        @endif
        <a href="{{ $action['href'] }}" class="font-medium text-gray-700 hover:text-yellow-500 hover:underline">
          <i class="fa-solid fa-pen-to-square"></i>
          {{isset($action['text']) ? $action['text'] : "Edit"}}
        </a>
        @break

      @case('view')
        @if (!$loop->first)
          <span class="border-l border-gray-700 mx-3"></span>
        @endif
        <a href="{{ $action['href'] }}" class="font-medium text-gray-700 hover:text-blue-500 hover:underline">
          <i class="fa-solid fa-eye"></i>
          {{isset($action['text']) ? $action['text'] : "View"}}
        </a>
        @break

      @default
        <div></div>
    @endswitch
  @endforeach
</td>