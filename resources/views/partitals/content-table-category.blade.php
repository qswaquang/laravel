<tr class="border-t border-gray-300 text-gray-700 hover:bg-gray-100" data-tt-id="{{$child->id}}" data-tt-parent-id="{{$child->parent_id == null ? '' : $child->parent_id}}">
    <td class="w-4 py-3 px-4">
          <div class="flex items-center">
              <input id="checkbox-table-1" type="checkbox" class="w-3 h-3">
          </div>
      </td>
    <td scope="row" class="px-6 py-3 cursor-pointer text-gray-700 hover:text-blue-500">
      {{ $child->name }}
    </td>
    <td class="px-6 py-3">
        @if ($category->published === 1)
           <i class="fa-solid fa-check ml-3 text-green-500"></i>
        @else
            <i class="fa-solid ml-3 text-red-500 fa-xmark"></i>
        @endif
    </td>
    <td class="px-6 py-3">
        $2999
    </td>
    <td class="px-6 py-3 text-right w-auto whitespace-nowrap">
        <a href="#" class="font-medium text-gray-700 hover:text-red-500 hover:underline">
          <i class="fa-solid fa-trash"></i>
          Delete
        </a>
        <span class="border-l border-gray-700 mx-3"></span>
        <a href="#" class="font-medium text-gray-700 hover:text-yellow-500 hover:underline">
          <i class="fa-solid fa-pen-to-square"></i>
          Edit
        </a>
    </td>
    @if(count($category->children))
      @include('child_categories',['childs' => $category->children])
    @endif
</tr>