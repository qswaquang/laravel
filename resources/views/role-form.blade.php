@extends('layouts.master')

@section('style-script')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #EEEEEE;
      color: black;
    }
  </style>
  
@endsection

@section('title', 'form role')
@section('header-title', 'Form Role')

@section('breadcrumb')
<li class="breadcrumb-item hover:underline"><a href="{{ route('admin.roles.index') }}">List role</a></li>
<li class="breadcrumb-item active">Form role</li>
@endsection

@section('content')

<x-card.card>
  <x-card.header
    title-icon-class='fa-solid fa-list-ul'
    title-text='Role form'>
  </x-card.header>
  <x-card.body>
      @php

        $optionPermissions = [];
        

        foreach ($permissions as $permission) {
          array_push($optionPermissions, [
            'value' => $permission->id,
            'text' => $permission->title,
          ]);
        }
        if ($editmode) {
            $optionSelected = [];

            foreach ($role->permissions as $permission) {
              array_push($optionSelected, $permission->id);
          }
        }

        $inputs = [
          [
            "type" => "text",
            "placeholder" => "Enter title",
            "name" => "title",
            "label" => "Title:",
            "value" => $editmode ? $role->title : "",
          ],
          [
            "type" => "textarea",
            "label" => "Description:",
            "placeholder" => "Enter Description",
            "name" => "description",
            "value" => $editmode ? $role->description : "",
          ],
          [
            "type" => "select-multiple",
            "id" => "selectMultiPicker",
            "label" => "Permission:",
            "name" => "permissions[]",
            "options" => $optionPermissions,
            "value" => $editmode ? $optionSelected : ""
          ],
        ];

      @endphp
      <x-form.form-simple
        action="{{ $editmode ? route('admin.roles.update', ['role' => $role]) : route('admin.roles.store') }}"
        editmode="{{$editmode}}"
        :inputs="$inputs">

    </x-form.form-simple>
  </x-card.body>
</x-card.card>

@endsection

@section('js-script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#selectMultiPicker').select2({
          placeholder: "Select a state",
          allowClear: true,
        });
    });
</script>
@endsection