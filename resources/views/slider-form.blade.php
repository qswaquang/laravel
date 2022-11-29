@extends('layouts.master')

@section('style-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'form product')
@section('header-title', 'Form Product')

@section('breadcrumb')
<li class="breadcrumb-item hover:underline"><a href="#">List product</a></li>
<li class="breadcrumb-item active">Form product</li>
@endsection

@section('content')
<x-card.card>
  <x-card.header
    title-icon-class='fa-solid fa-list-ul'
    title-text='Slider form'>
  </x-card.header>
  <x-card.body>
    <x-form.form-simple 
      action="{{ $editmode ? route('admin.sliders.update', ['slider' => $slider]) : route('admin.sliders.store') }}"
      editmode="{{ $editmode }}"
      :inputs='[
        [
          "type" => "text",
          "label" => "Caption: ",
          "name" => "caption",
          "value" => $editmode ? $slider->caption : "",
        ],
        [
          "type" => "textarea",
          "label" => "Content: ",
          "name" => "content",
          "value" => $editmode ? $slider->content : "",
        ],
        [
          "label" => "Banner:",
          "type" => "upload-image",
          "name" => "picture",
          "value" => $editmode ? $slider->picture : "",
        ],
      ]'>
      </x-form.form-simple>
    }
  </x-card.body>
</x-card.card>

@endsection

@section('js-script')
  
  <script>

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