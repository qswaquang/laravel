@extends('layouts.master')

@section('title', 'product')
@section('header-title', 'List Product')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item active">List product v1</li>
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
			Product Table
		</div>
		<div>
			<a href="{{ route('admin.products.create') }}" class="font-medium text-base text-gray-700 hover:text-blue-600 hover:underline">
				<i class="fa-solid fa-file-circle-plus"></i>
				Add
			</a>
		</div>

	</div>
	<div class="overflow-x-auto">
		<table class="w-full text-sm text-left text-gray-500" id="table-tree">
			<thead class="text-xs border-y border-gray-300 bg-gray-500 text-white uppercase">
				<tr>
					<th scope="col" class="px-6 py-3">
						Product name
					</th>
					<th scope="col" class="px-6 py-3">
						Stock
					</th>
					<th scope="col" class="px-6 py-3">
						Price
					</th>
					<th scope="col" class="px-6 py-3">
						Category
					</th>
					<th scope="col" class="px-4 py-3 text-right">
						Action
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
				<tr class="border-t border-gray-300 text-gray-700 hover:bg-gray-100">
					<td scope="row" class="px-6 py-3">
						{{ $product->name }}
					</td>
					<td class="px-6 py-3">
						{{ $product->stock }}
					</td>
					<td class="px-6 py-3">
						{{ $product->price }}
					</td>
					<td class="px-6 py-3">
						{{ $product->category->name }}
					</td>
					<td class="px-6 py-3 text-right w-auto whitespace-nowrap">
						<form class="inline" id="deleteCategory" type="submit" action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST">
							@method('delete')
							<button type="submit" onclick="return confirm('Sure Want Delete?')" class="font-medium text-gray-700 hover:text-red-500 hover:underline hover:cursor-pointer">
								<i class="fa-solid fa-trash"></i>
								Delete
							</button>
						</form>
						<span class="border-l border-gray-700 mx-3"></span>
						<a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="font-medium text-gray-700 hover:text-yellow-500 hover:underline">
							<i class="fa-solid fa-pen-to-square"></i>
							Edit
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="px-6 pt-2 pb-3 flex justify-end border-t border-gray-300">
			@include('partitals.pagination', ['paginator' => $products])
		</div>
		
	</div>
</div>

@endsection