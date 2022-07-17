@extends('layouts.master')

@section('title', 'user')
@section('header-title', 'List user')

@section('style-script')
	
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">List user</li>
@endsection

@section('content')		
<x-card.card>
	<x-card.header 
		title-icon-class="fa-solid fa-magnifying-glass"
		title-text="Search">
	</x-card.header>
{{-- 	<x-card.body>
		<x-form.form action="{{ route('admin.roles.index') }}" method="POST">
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
	</x-card.body> --}}
</x-card.card>

<x-card.card>
	<x-card.header 
		title-icon-class='fa-solid fa-table'
		title-text='Role Table'>
		<x-card.header-tool
			toolAddText="Add"
			toolAddHref="{{ route('admin.users.create') }}"></x-card.header-tool>		
	</x-card.header>
	<x-card.body>
		<x-table.table :headers="['Name','email', 'role']">
			@foreach ($users as $user)
				<x-table.tr-body>
					<x-table.td>{{ $user->name }}</x-table.td>
					<x-table.td>{{ $user->email }}</x-table.td>
					<x-table.td>{{ $user->role->title }}</x-table.td>
					<x-table.td-action 
						:actions='[
							[
								"action" => "delete",
								"href" => "/admin/users/$user->id",
							],
							[
								"action" => "edit",
								"href" => "/admin/users/$user->id/edit",
							],
						]'/>
				</x-table.tr-body>
			@endforeach
		</x-table.table>
	</x-card.body>
	<x-card.footer>
		@include('partitals.pagination', ['paginator' => $users])
	</x-card.footer>
</x-card.card>

@endsection

@section('js-script')
	
@endsection