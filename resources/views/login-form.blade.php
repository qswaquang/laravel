@extends('layouts.form-login-page')

@section('title')
	{{-- expr --}}
@endsection

@section('style-script')
	{{-- expr --}}
@endsection

@section('header-title')
	Login page
@endsection

@section('form-content')
	<div class="mb-6">
		<x-label>Your email</x-label>
		<x-input/>
	</div>
	<div class="mb-6">
		<x-label>Your password</x-label>
		<x-input/>
	</div>
	
@endsection

@section('form-submit')
	<x-primary-button class="w-full">Login</x-primary-button>
@endsection

@section('js-script')
	{{-- expr --}}
@endsection