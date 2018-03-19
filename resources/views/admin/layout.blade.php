<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=1200'>
	<title>Boundstart - админ панель</title>
	<link rel="shortcut icon" href="{{ asset('img/markup/favicon_admin.ico') }}">

	{{--MATERIAL DESIGN--}}
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-light_blue.min.css" />
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	{{--CUSTOM STYLES--}}
	<link rel="stylesheet" href="{{ URL::asset('css/admin/admin.css') }}" />
{{--	{{ HTML::script('ckeditor/ckeditor.js') }}--}}
	@yield('css')
</head>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	@yield('header')
	@yield('drawer')
	<main class="mdl-layout__content mdl-color--grey-100">
		<div class="mdl-grid page-content">
			@include('flash::message')

			@yield('body')
		</div>
	</main>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{--{{ HTML::script('js/admin/admin.js') }}--}}
<script>
	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@yield('js')
</body>
</html>