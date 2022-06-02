@foreach($childs as $category)
  @include('partitals.content-table-category',['category' => $category])
@endforeach
