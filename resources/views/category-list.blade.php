@extends('layouts.master')

@section('style-script')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-treetable/3.2.0/css/jquery.treetable.min.css">
  <style type="text/css">
    table.treetable tr.collapsed span.indenter a:before {
      font-family: 'Font Awesome\ 6 Free';
      font-size: 14px;
      font-weight: bold;
      content: '\f07b';
    }
    table.treetable tr.expanded span.indenter a:before {
      font-family: 'Font Awesome\ 6 Free';
      font-size: 14px;
      font-weight: bold;
      content: '\f07c';
    }
  </style>
@endsection

@section('title', 'category')
@section('header-title', 'List Category')

@section('breadcrumb')
	<li class="breadcrumb-item hover:underline"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">List category</li>
@endsection

@section('content')
	<div class="w-ful rounded overflow-hidden shadow-xl bg-white mb-4">
		<div class="px-6 py-3">
			<div class="font-bold">
				<i class="fa-solid fa-magnifying-glass"></i>
				Search
			</div>
		</div>
	</div>
	<div class="w-ful rounded overflow-hidden shadow-xl bg-white">
		<div class="px-6 py-3">
			<div class="font-bold">
				<i class="fa-solid fa-table"></i>
				Category Table
			</div>
		</div>
    <div class="overflow-x-auto">
		 <table class="w-full text-sm text-left text-gray-500" id="table-tree">
        <thead class="text-xs border-y border-gray-300 bg-gray-500 text-white uppercase">
            <tr>
            		<th scope="col" class="py-3 px-4">
                    <div class="flex items-center">
                        <input id="checkbox-all" type="checkbox" class="w-3 h-3">
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Category name
                </th>
                <th scope="col" class="px-6 py-3">
                    Published
                </th>
                <th scope="col" class="px-6 py-3">
                    Assigned products
                </th>
                <th scope="col" class="px-4 py-3 text-right">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
              <tr class="border-t border-gray-300 text-gray-700 hover:bg-gray-100" data-tt-id="{{$category->id}}">
                <td class="w-4 py-3 px-4">
                  <div class="flex items-center">
                    <input id="checkbox-table-1" type="checkbox" class="w-3 h-3">
                  </div>
                </td>
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
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@section('js-script')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-treetable/3.2.0/jquery.treetable.min.js"></script>
  <script>
    $("#table-tree").treetable({ 
      expandable: true,
      clickableNodeNames : true,
      column : 1
    });
  </script>
@endsection