<tr class="border-t border-gray-300 text-gray-700 hover:bg-gray-100" data-tt-id="{{$category->id}}" data-tt-parent-id="{{$category->parent_id === null ? '' : $category->parent_id}}">
  <td scope="row" class="px-6 py-3 cursor-pointer text-gray-700 hover:text-blue-500">
    {{ $category->name }}
  </td>
  <td class="px-6 py-3">
    @if ($category->published === 1)
       <i class="fa-solid fa-check ml-3 text-green-500"></i>
    @else
        <i class="fa-solid ml-3 text-red-500 fa-xmark"></i>
    @endif
  </td>
  <td class="px-6 py-3">
      {{ $category->products_count }}
  </td>
  <td class="px-6 py-3 text-right w-auto whitespace-nowrap">
    <a href="{{ route('admin.categories.create', ['id' => $category->id]) }}" class="font-medium text-gray-700 hover:text-blue-500 hover:underline">
      <i class="fa-solid fa-file-circle-plus"></i>
      Add child
    </a>
    <span class="border-l border-gray-700 mx-3"></span>
    <form class="inline" id="deleteCategory" type="submit" action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
      @method('delete')
      <button type="submit" onclick="return confirm('Sure Want Delete?\nIf You Delete This All Child Of This And Produts Assgined Will Be Delete')" class="font-medium text-gray-700 hover:text-red-500 hover:underline hover:cursor-pointer">
        <i class="fa-solid fa-trash"></i>
        Delete
      </button>
    </form>
    <span class="border-l border-gray-700 mx-3"></span>
    <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="font-medium text-gray-700 hover:text-yellow-500 hover:underline">
      <i class="fa-solid fa-pen-to-square"></i>
      Edit
    </a>
  </td>
    @if(count($category->children))
      @include('child_categories',['childs' => $category->children])
    @endif
</tr>