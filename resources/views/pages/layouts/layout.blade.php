<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="utf-8">
	@include('pages.partials.meta._meta')
	<meta content="Boundstart" name="author">
	@if (App::getLocale() == 'en')
		<link rel="alternate" hreflang="ru" href="https://ru.boundstart.com/" />
	@else
		<link rel="alternate" hreflang="en" href="https://boundstart.com/" />
	@endif
	
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	
	<link rel="shortcut icon" href="{{ asset('img/images/favicon.ico') }}">
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto:300,700,900&amp;subset=cyrillic,cyrillic-ext"
		  rel="stylesheet">

	
	@yield('css')
	
	<script src="https://use.typekit.net/omz4awy.js" async=""></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	@yield('header-js')
	
	@include('pages.partials.socials._fb-header-conn')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92012717-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-92012717-1');
	</script>
	

</head>
<body @if(App::getLocale() == 'ru') class="language-ru" @endif>
	@yield('header')
	@yield('body')
	@yield('footer')
	@yield('js')
	{!! Html::script('js/script.js') !!}
	@if(App::getLocale() == 'ru')
		<script>
			var __REPLAIN_ = '171877ea-734d-4a72-af3e-c22905d3c7b5';
			(function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
				var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
			})('https://widget.replain.cc/dist/client.js');
		</script>
	@endif
</body>
</html>
