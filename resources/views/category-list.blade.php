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
		<div class="px-6 py-3 flex justify-between">
			<div class="font-bold">
				<i class="fa-solid fa-table"></i>
				Category Table
			</div>
      <div>
        <a href="{{ route('admin.categories.create', ['id' => 0]) }}" class="font-medium text-base text-gray-700 hover:text-blue-500 hover:underline">
          <i class="fa-solid fa-file-circle-plus"></i>
          Add root
        </a>
      </div>
      
		</div>
    <div class="overflow-x-auto">
		 <table class="w-full text-sm text-left text-gray-500" id="table-tree">
        <thead class="text-xs border-y border-gray-300 bg-gray-500 text-white uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category name
                </th>
                <th scope="col" class="px-6 py-3">
                    Published
                </th>
                <th scope="col" class="px-6 py-3">
                    Num of product
                </th>
                <th scope="col" class="px-4 py-3 text-right">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            @include('partitals.content-table-category',['category' => $category])
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
      column : 0
    });
  </script>
@endsection