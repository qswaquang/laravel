@extends('layouts.master')

@section('title', 'slider')
@section('header-title', 'List Slider')

@section('style-script')
	
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">List slider</li>
@endsection

@section('content')		
<x-card.card>
	<x-card.header 
		title-icon-class="fa-solid fa-magnifying-glass"
		title-text="Search">
	</x-card.header>
	<x-card.body>
		
	</x-card.body>
</x-card.card>

<x-card.card>
	<x-card.header 
		title-icon-class='fa-solid fa-table'
		title-text='Slider Table'>
		<x-card.header-tool
			toolAddText="Add"
			toolAddHref="{{ route('admin.sliders.create') }}"></x-card.header-tool>		
	</x-card.header>
	<x-card.body>
		<x-table.table :headers="['Picture', 'Caption']">
			@foreach ($sliders as $slider)
				<x-table.tr-body>
					<x-table.td><img width="200" height="100" src="{{$slider->picture}}"></x-table.td>
					<x-table.td>{{ $slider->caption }}</x-table.td>
					
					
					<x-table.td-action 
						:actions='[
							[
								"action" => "delete",
								"href" => "/admin/sliders/$slider->id",
							],
							[
								"action" => "edit",
								"href" => "/admin/sliders/$slider->id/edit",
							],
						]'/>
				</x-table.tr-body>
			@endforeach
		</x-table.table>
	</x-card.body>
	<x-card.footer>
		@include('partitals.pagination', ['paginator' => $sliders])
	</x-card.footer>
</x-card.card>

@endsection

@section('js-script')
	
@endsection