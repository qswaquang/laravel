<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('style-script')
	
</head>
<body class="bg-blue-50">
	<div class="wrapper">
		<div class="mt-5">
			<h1 class="text-center text-2xl font-bold capitalize"> @yield('header-title') </h1>
			<form class="w-full mt-3">
				<div class="block flex justify-center">
					<div class="p-6 w-1/3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
						@yield('form-content')
					</div>
				</div>
				<div class="flex justify-center mt-3">
					@yield('form-submit')
				</div>
			</form>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('js-script')
</body>

</html>