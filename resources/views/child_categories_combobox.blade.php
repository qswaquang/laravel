@foreach($childs as $category)
	 
	@if(count($category->children))
		@include('child_categories_combobox', ['childs' => $category->children])
	@else
		<option {{ $category->id === $category_id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }}</option>
	@endif
@endforeach
	{{-- expr --}}


