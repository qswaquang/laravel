@extends('layouts.master')

@section('title', 'product')
@section('header-title', 'List Product')

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">List product</li>
@endsection

@section('content')

<x-card.card>
	<x-card.header 
		title-icon-class="fa-solid fa-magnifying-glass"
		title-text="Search"></x-card.header>
</x-card.card>

<x-card.card>
	<x-card.header 
		title-icon-class='fa-solid fa-table'
		title-text='Product Table'>
		<x-card.header-tool
			toolAddText="Add"
			toolAddHref="{{ route('admin.products.create') }}"></x-card.header-tool>		
	</x-card.header>
	<x-card.body>
		<x-table.table :headers="['Picture','Product name', 'Stock', 'Price', 'Category']">
			@foreach ($products as $product)
				<x-table.tr-body>
					<x-table.td class="">
						@foreach ($product->images as $image)
							<img style="width:100px;height:100px;" src="{{ $image->src }}" alt="{{ $image->alt }}"> 
							@break
						@endforeach
					</x-table.td>
					<x-table.td>{{ $product->name }}</x-table.td>
					<x-table.td>{{ $product->stock }}</x-table.td>
					<x-table.td>{{ $product->price }}</x-table.td>
					<x-table.td>{{ $product->category->name }}</x-table.td>
					<x-table.td-action 
						:actions='[
							[
								"action" => "delete",
								"href" => "/admin/products/$product->id",
							],
							[
								"action" => "edit",
								"href" => "/admin/products/$product->id/edit",
							],
						]'/>
				</x-table.tr-body>
			@endforeach
		</x-table.table>
	</x-card.body>
	<x-card.footer>
		@include('partitals.pagination', ['paginator' => $products])
	</x-card.footer>
</x-card.card>

@endsection