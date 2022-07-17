@foreach($childs as $child)
	@if(count($child->children))
		@include('child_categories_combobox', ['childs' => $child->children, 'pathParent' => $pathParent.$child->name.' > '])
	@else
		<option {{ $child->id == $category_id ? 'selected' : '' }} value="{{ $child->id }}">{{ $pathParent }} {{ $child->name }}</option>
	@endif
@endforeach
	{{-- expr --}}


