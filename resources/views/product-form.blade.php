@extends('layouts.master')

@section('style-script')

@endsection

@section('title', 'form product')
@section('header-title', 'Form Product')

@section('breadcrumb')
<li class="breadcrumb-item hover:underline"><a href="{{ route('admin.categories.index') }}">List product</a></li>
<li class="breadcrumb-item active">Form product</li>
@endsection

@section('content')
<form class="w-ful rounded overflow-hidden shadow-xl bg-white pt-6 pb-8 px-4" method="post" action="{{ $editmode ? route('admin.products.update', ['product' => $product]) : route('admin.products.store') }}" accept-charset="UTF-8">
  @csrf
  @if ($editmode)
    @method('PUT')
  @endif
  <div class="mb-4">
    <x-label class="block text-gray-700 text-sm font-bold mb-2" for="name_product">
      Name Product:
    </x-label>
    <x-input id="name_product" type="text" value="{{$editmode ? $product->name : ''}}" placeholder="Enter Name" name="name"/>
  </div>
  <div class="mb-4">
    <x-label for="slug_product">
      Slug Product:
    </x-label>
    <x-input 
      id="slug_product" 
      type="text" 
      value="{{$editmode ? $product->slug : '' }}" 
      placeholder="Enter Slug" name="slug"/>
  </div>
  <div class="mb-6">
    <x-label for="stock">
      Stock:
    </x-label>
    <x-input 
      id="stock_product" 
      value="{{$editmode ? $product->stock : '' }}" 
      type="text" 
      name="stock" 
      placeholder="Enter Stock"/>
  </div>
  <div class="mb-6">
    <x-label for="old_price">
      Old Price:
    </x-label>
    <x-input value="{{$editmode ? $product->old_price : '' }}" name="old_price" placeholder="Enter Old Price"/>
  </div>
  <div class="mb-6">
    <x-label for="price">
      Price:
    </x-label>
    <x-input id="price_product" value="{{ $editmode ? $product->price : '' }}" type="text" name="price" placeholder="Enter Price"/>
  </div>
  <div class="mb-6">
   <x-label for="category">
    Category:
    </x-label>
    <x-select name="category_id" widthClass="w-full">
      @foreach ($categories as $category)
        @if (count($category->children))
          @if ($editmode)
            @include('child_categories_combobox', ['childs' => $category->children, 'category_id' => $product->category_id])
          @else
            @include('child_categories_combobox', ['childs' => $category->children, 'category_id' => -1])
          @endif
        @else
          <option {{ $editmode ? ($category->id === $product->category_id ? 'selected' : '') : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
      @endforeach
    </x-select>
</div>

<div class="flex justify-end w-full">
  <x-primary-button>
    {{$editmode ? 'Update' : 'Create'}}
  </x-primary-button>
</div>

</form>
@endsection

@section('js-script')
  <script>
    $('#name_product').keyup(function(){
      $('#slug_product').val(titleToSlug($('#name_product').val()));
    });
  </script>
@endsection