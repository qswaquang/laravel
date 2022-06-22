@extends('layouts.master')

@section('title', 'order')
@section('header-title', 'List Order')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item active">List order</li>
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
		<x-table.table :headers="['User', 'Order Status', 'Order Total']">
			@foreach ($orders as $order)
				<x-table.tr-body>
					<x-table.td>{{ $order->user->name }}</x-table.td>
					<x-table.td><x-order-status status="{{ $order->order_status->title }}">{{ $order->order_status->title }}</x-order-status></x-table.td>
					<x-table.td>{{ $order->order_total}}</x-table.td>
					<x-table.td-action 
						:actions='[
							[
								"action" => "view",
								"href" => "{{ route(`admin.orders.destroy`, [`order` => $order]) }}",
							],
						]'/>
				</x-table.tr-body>
			@endforeach
		</x-table.table>
	</x-card.body>
	<x-card.footer>
		@include('partitals.pagination', ['paginator' => $orders])
	</x-card.footer>
</x-card.card>

@endsection