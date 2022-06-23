@extends('layouts.master')

@section('style-script')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
    title-icon-class='fa-solid fa-list-ul'
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

<x-card.card>
  <x-card.header
    title-icon-class='fa-solid fa-images'
    title-text='Assign Image'>
  </x-card.header>
  <x-card.body>
    @if($editmode)
      <h3 class="text-center my-3 font-bold">Upload Image</h3>
      <form class="px-10">
        <div class="border-4 border-blue-500 border-dotted m-auto" style="width: 12rem;height: 12rem;">
          <img class="w-full h-full" id="image" src="" alt="">
        </div>
        <x-form.file class="flex justify-center my-4" id="fileImageProduct" name="imageProduct"/>
        <x-form.control>
          <x-form.label for="title">Title:</x-form.label>
          <x-form.input name="title" placeholder="Enter Title Image"/>
        </x-form.control>
        <x-form.control>
          <x-form.label for="alt">Alt:</x-form.label>
          <x-form.input name="alt" placeholder="Enter Alt Image"/>
        </x-form.control>
        <div class="flex justify-end w-full mb-4">
          <x-form.primary-button>
            Assign
          </x-form.primary-button>
        </div>
      </form>
    @else
      <p class="py-4 text-center">You must create product first</p>
    @endif
    
  </x-card.body>
</x-card.card>

@endsection

@section('js-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
  <script>
    $('#name_product').keyup(function(){
      $('#slug_product').val(titleToSlug($('#name_product').val()));
    });

    $("#fileImageProduct").change(function() {
      if (!this.files || !this.files[0]) return;
        const FR = new FileReader();
        FR.addEventListener("load", function(evt) {
          $("#image").attr("src", evt.target.result);
          
        })
        FR.readAsDataURL(this.files[0]);
      });
  </script>
@endsection