@extends('layouts.master')

@section('style-script')

@endsection

@section('title', 'form category')
@section('header-title', 'Form Category')

@section('breadcrumb')
	<li class="breadcrumb-item hover:underline"><a href="{{ route('admin.categories.index') }}">List category</a></li>
	<li class="breadcrumb-item active">Form category</li>
@endsection

@section('content')
	<form class="w-ful rounded overflow-hidden shadow-xl bg-white pt-6 pb-8 px-4" method="post" action="{{ $editmode ? route('admin.categories.update', ['category' => $category]) : route('admin.categories.store') }}" accept-charset="UTF-8">
    @if ($editmode)
      @method('PUT')
    @endif
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name_category">
        Name Category:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name_category" type="text" value="{{$editmode ? $category->name : ''}}" placeholder="Name Category" name="name">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name_category">
        Slug Category:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug_category" type="text" value="{{$editmode ? $category->slug : '' }}" placeholder="slug Category" name="slug">
    </div>
    <div class="mb-6">
      <label class="text-gray-700 text-sm font-bold mr-2" for="password">
        Published:
      </label>
      <input class="w-3 h-3" {{$editmode ? ($category->published ? 'checked' : '') :'' }} name="published" type="checkbox">
    </div>
    <input type="hidden" value="{{ $editmode ? $category->parent_id : $parent_id }}" name="parent_id">
    <div class="flex justify-end w-full">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        {{$editmode ? 'Update' : 'Create'}}
      </button>
    </div>
        
    </form>
@endsection

@section('js-script')
  
@endsection