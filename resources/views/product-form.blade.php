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
<x-card.card>
  <x-card.header
    title-icon-class='fa-solid fa-align-justify'
    title-text='Product form'>
  </x-card.header>
  <x-card.body>
      <x-form.form
        action="{{ $editmode ? route('admin.products.update', ['product' => $product]) : route('admin.products.store') }}">
        @if ($editmode)
          @method('PUT')
        @endif
      <x-form.control>
        <x-form.label for="name_product">Name Product:</x-form.label>
        <x-form.input id="name_product" type="text" value="{{$editmode ? $product->name : ''}}" placeholder="Enter Name" name="name"/>
      </x-form.control>

      <x-form.control>
        <x-form.label for="slug_product">Slug Product:</x-form.label>
        <x-form.input 
          id="slug_product" 
          type="text" 
          value="{{$editmode ? $product->slug : '' }}" 
          placeholder="Enter Slug" name="slug"/>
      </x-form.control>

      <x-form.control>
        <x-form.label for="stock">Stock: </x-form.label>
        <x-form.input 
          id="stock_product" 
          value="{{$editmode ? $product->stock : '' }}" 
          type="text" 
          name="stock" 
          placeholder="Enter Stock"/>
      </x-form.control>

      <x-form.control>
        <x-form.label for="old_price">Old Price:</x-form.label>
        <x-form.input value="{{$editmode ? $product->old_price : '' }}" name="old_price" placeholder="Enter Old Price"/>
      </x-form.control>

      <x-form.control>
        <x-form.label for="price">
          Price:
        </x-form.label>
        <x-form.input id="price_product" value="{{ $editmode ? $product->price : '' }}" type="text" name="price" placeholder="Enter Price"/>
      </x-form.control>

      <x-form.control>
       <x-form.label for="category">
        Category:
        </x-form.label>
        <x-form.select name="category_id" widthClass="w-full">
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
        </x-form.select>
    </x-form.control>

    <div class="flex justify-end w-full">
      <x-form.primary-button>
        {{$editmode ? 'Update' : 'Create'}}
      </x-form.primary-button>
    </div>

    </x-form.form>
  </x-card.body>
</x-card.card>

@endsection

@section('js-script')
  <script>
    $('#name_product').keyup(function(){
      $('#slug_product').val(titleToSlug($('#name_product').val()));
    });
  </script>
@endsection