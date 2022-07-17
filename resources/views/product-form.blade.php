@extends('layouts.master')

@section('style-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
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
                @include('child_categories_combobox', ['childs' => $category->children, 'category_id' => $product->category_id, 'pathParent' => $category->name.' > '])
              @else
                @include('child_categories_combobox', ['childs' => $category->children, 'category_id' => -1, 'pathParent' => $category->name.' > '])
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
    title-text='Edit Image'>
  </x-card.header>
  <x-card.body>
    
    @if($editmode)
      <x-table.table :headers="['Image', 'Display order', 'Alt', 'Title']">
        @foreach ($product->images as $image)
          <x-table.tr-body>
            <x-table.td>
              <img width="100" height="100" src="{{ $image->src }}">
            </x-table.td>
            <x-table.td> 
              <a href="" class="edit" data-url="{{ route('admin.images.update') }}" data-name="display_order" data-type="text" data-pk="{{ $image->id }}" data-title="Edit display order"> 
                {{ $image->display_order }} 
              </a> 
            </x-table.td>
            <x-table.td> 
              <a href="" class="edit" data-name="alt" data-type="text" data-pk="{{ $image->id }}" data-title="Edit alt"> 
                {{ $image->alt }} 
              </a>
            </x-table.td>
            <x-table.td> 
              <a href="" class="edit" data-name="title" data-type="text" data-pk="{{ $image->id }}" data-title="Edit title"> 
                {{ $image->title }} 
              </a> 
            </x-table.td>
            <x-table.td-action 
                :actions='[
                  [
                    "action" => "delete",
                    "href" => "/admin/images/$image->id",
                  ],
                ]'/>
          </x-table.tr-body>
        @endforeach
      </x-table.table>

      <div class="border-t border-gray-300"></div>

      <h3 class="text-center my-3 font-bold">Upload Image</h3>
      <form id="formImageProduct" action="{{ route('admin.images.store') }}" class="px-10" method="post" enctype="multipart/form-data">
        <input type="hidden" name="productId" value="{{$product->id}}">
        <div class="border-4 border-blue-500 border-dotted m-auto" style="width: 12rem;height: 12rem;">
          <img class="w-full h-full" id="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/-Insert_image_here-.svg/320px--Insert_image_here-.svg.png" alt="">
        </div>
        <x-form.file accept="image/*" class="flex justify-center my-4" id="fileImageProduct" name="imageProduct"/>
        <input class="text-capitalize" type="checkbox" id="imageProductEditAdvance">
        <label for="imageProductEditAdvance"> Edit advance image</label>
        <div id="zoneEditProductImageAdvance" class="hidden">
          <x-form.control>
            <x-form.label for="title">Title:</x-form.label>
            <x-form.input name="title" placeholder="Enter Title Image"/>
          </x-form.control>
          <x-form.control>
            <x-form.label for="alt">Alt:</x-form.label>
            <x-form.input name="alt" placeholder="Enter Alt Image"/>
          </x-form.control>
        </div>
        <div class="flex justify-end w-full mb-4">
          <x-form.primary-button type="button" id="submitImageProduct">
            Upload
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
  <script>$.fn.poshytip={defaults:null}</script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
  <script>
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $('.edit').editable({
       url: "{{ url('/admin/images/update') }}",
       success: function (response, val) {
         console.log(response);
       }
    });

    $("#submitImageProduct").click(function() {
      if ($("#fileImageProduct")[0].files.length === 0) {
        alert("Upload Image first");
      } else {
        $("#formImageProduct").submit();
      }
    });

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

    $('#imageProductEditAdvance').change(function() {
      if ($('#imageProductEditAdvance')[0].checked) {
        $('#zoneEditProductImageAdvance').attr('class', 'block');
      } else {
        $('#zoneEditProductImageAdvance').attr('class', 'hidden');
      }
    });
      
  </script>
@endsection