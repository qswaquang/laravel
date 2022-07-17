@extends('layouts.master')

@section('title', 'product')
@section('header-title', 'List Product')

@section('style-script')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
	<style type="text/css">
		.irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single {
			font-size: 12px;
		}
		.irs-grid-text {
			font-size: 10px;
		}
	</style>
	
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">List product</li>
@endsection

@section('content')		
<x-card.card>
	<x-card.header 
		title-icon-class="fa-solid fa-magnifying-glass"
		title-text="Search">
	</x-card.header>
	<x-card.body>
		<x-form.form action="{{ route('admin.products.index') }}" method="POST">
			@method('GET')
			<div class="grid grid-cols-2 gap-x-10">
				<x-form.control>
					<x-form.label>Name: </x-form.label>
					<x-form.input value="{{ $filters->name }}" name="name" placeholder="Enter Name"/>
				</x-form.control>

				<x-form.control>
					<x-form.label>Price: </x-form.label>
					<x-form.input value="{{ $filters->price }}" name="price" id="priceRangeSlider"/>
				</x-form.control>
				<x-form.control>
					<x-form.label>Category: </x-form.label>
					<x-form.select name="category">
						<option value="-1">~~ ALL ~~</option>
						@foreach ($categories as $category)
							@if (count($category->children))
								@include('child_categories_combobox', ['childs' => $category->children, 'category_id' => $filters->category, 'pathParent' => $category->name.' > '])
							@else
								<option {{ $category->id == $filters->category ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
							@endif
						@endforeach
					</x-form.select>
				</x-form.control>
				<x-form.control>
					<x-form.label>Stock: </x-form.label>
					<x-form.input value="{{ $filters->stock }}" name="stock" id="stockRangeSlider"/>
				</x-form.control>
			</div>

			<div class="flex justify-end">
				<x-form.primary-button>
					Find
				</x-form.primary-button>
			</div>
				
		</x-form.form>
	</x-card.body>
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
					<x-table.td>@money($product->price)</x-table.td>
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

@section('js-script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
	<script type="text/javascript">

		$("#priceRangeSlider").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 10000000000,
        step: 10000,
        postfix: " đ",
        prettify_enabled: true,
        prettify_separator: " "
    });

    $("#stockRangeSlider").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 100,
    });
    
	</script>
@endsection