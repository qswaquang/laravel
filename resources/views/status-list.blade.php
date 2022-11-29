@extends('layouts.master')

@section('title', 'status')
@section('header-title', 'List Status')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item active">List status</li>
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
		title-text='Order Table'>
	</x-card.header>
	<x-card.body>
		<x-table.table :headers="['Title']">
			@foreach ($statuses as $status)
				<x-table.tr-body>
					<x-table.td>{{ $status->title }}</x-table.td>
					<x-table.td-action 
						:actions='[
							[
								"action" => "edit",
								"href" => "{{ route(`admin.statuses.edit`, [`status` => $status]) }}",
							],
						]'/>
				</x-table.tr-body>
			@endforeach
		</x-table.table>
	</x-card.body>
{{-- 	<x-card.footer>
		@include('partitals.pagination', ['paginator' => $orders])
	</x-card.footer> --}}
</x-card.card>

@endsection