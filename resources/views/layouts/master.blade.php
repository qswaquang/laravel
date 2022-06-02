<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', config('app.name', '@Master Layout'))</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('style-script')
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('partitals.navbar')
		@include('partitals.sidebar')
			<div class="content-wrapper">
		    <div class="content-header">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 class="m-0">@yield('header-title')</h1>
		          </div>
		          <div class="col-sm-6">
		            <ol class="breadcrumb float-sm-right">
		            	@yield('breadcrumb')
		            </ol>
		          </div>
		        </div>
		      </div>
		    </div>

		    <section class="content">
		      <div class="container-fluid">
		      	@yield('content')
		      </div>	
				</section>
		</div>
		@include('partitals.footer')
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('js-script')
</body>

</html>