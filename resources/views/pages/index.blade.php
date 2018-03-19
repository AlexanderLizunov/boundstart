@extends('pages.layouts.layout')
@extends('pages.partials._footer')

@section('header-js')
	@include('pages.partials.mautic._header-conn')
@stop

@section('css')
	{!! Html::style('css/index.css') !!}
@stop

@section('body')
	<div class="main-section">
		<div class="main-bg-cover">
			{!! lang('main-bg') !!}
		</div>
		<div class="video-cover">
		</div>
		<div class="custom-container main-section-container main-screen-form-block">
			@include('pages.partials._header')
			
			@if(App::getLocale() == 'en')
				@include('pages.partials.index._first-screen-no-form')
			@else
				@include('pages.partials._main-screen-form-block')
			@endif
		</div>
	</div>
	
	<div id="section-2" class="steps-section">
		<div class="steps-cover">
			<div class="steps-container">
				<div class="custom-container">
					<div class="content-cover">
						<div class="content-block">
							<h2>{!! lang('steps.1.title') !!}</h2>
							<p class="steps-title_small">{!! lang('steps.1.title-small') !!} </p>
							{!! lang('steps.1.list') !!}
							<img src="{{asset('img/images/01.png')}}" alt="01" class="step-block_img">
						</div>
					</div>
					{!! lang('steps.1.img') !!}
				</div>
			</div>
			<div class="custom-container">
				<div class="steps-container step-container__right">
					<div class="content-cover">
						<div class="content-block content-block__second">
							<h2 class="step-title__right">{!! lang('steps.2.title') !!}</h2>
							<p class="steps-title_small">{!! lang('steps.2.title-small') !!}</p>
							{!! lang('steps.2.list') !!}
							<img src="{{asset('img/images/02.png')}}" alt="02"
								 class="step-block_img step-block_img__second">
						</div>
					</div>
					{!! lang('steps.2.img') !!}
				</div>
			</div>
			<div class="custom-container">
				<div class="steps-container step-container__last">
					<div class="content-cover">
						<div class="content-block">
							<h2>{!! lang('steps.3.title') !!}</h2>
							<p class="steps-title_small">{!! lang('steps.3.title-small') !!}</p>
							<img src="{{asset('img/images/03.png')}}" alt="03" class="step-block_img">
							{!! lang('steps.3.list') !!}
						
						</div>
					</div>
					{!! lang('steps.3.img') !!}
				</div>
			</div>
			<div class="step-circle-cover">
				<p id="circle-1" class="step-circle">social</p>
			</div>
			<p id="circle-2" class="step-circle circle-second">audience</p>
			<p id="circle-3" class="step-circle circle-third">leads</p>
			<p id="circle-4" class="step-circle circle-fourth">clients</p>
			<p id="circle-5" class="step-circle circle-fifth">sales</p>
			@include('pages.partials.svg._line')
		</div>
	</div>
	
	@if(App::getLocale() == 'ru')
		@include('pages.partials._callback-block')
	@endif
	
	@include('pages.partials._portfolio')
	
	<div id="section-quote" class="quote-section">
		<div class="custom-container quote-container">
			<img src="{{asset('img/images/quote.png')}}" alt="Boundstart reviews" class="quote-image">
			{!! lang('quote-main-title') !!}
			<div class="quote-cover" id="quotesSlider">
				@foreach($quotesItems as $item)
					{!! $item['text'] !!}
				@endforeach
			
			</div>
			<button class="slider-control quote-control_button quote-control-left" data-direction="prev"
					data-target="#quotesSlider"></button>
			<button class="slider-control quote-control_button quote-control-right" data-direction="next"
					data-target="#quotesSlider"></button>
		</div>
	</div>
	
	@if(App::getLocale() == 'ru')
		@include('pages.partials._who-can-use')
	@endif
	
	@if(App::getLocale() == 'ru')
		@include('pages.partials._callback-block', ['heading' => 'alt'])
	@endif
	
	<div class="team-section">
		<div class="custom-container team-container">
			<div class="team-title-block">
				
				@lang('index.team.title')
				@lang('index.team.comment')
				<img class="team-bg-image" src="{{asset('img/images/WE.png')}}" alt="we">
			</div>
			<div class="gallery-block ">
				<div class="gallery-item gallery-item__low">
					<img src="{{asset('img/images/dmitriy.jpg')}}" alt="Dan - CEO at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Dan<span class="team-gallery-position">CEO</span>
					</p>
				</div>
				<div class="gallery-item">
					<img src="{{asset('img/images/worker-1.png')}}" alt="Nick - Marketing Strategist at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Nick <span
								class="team-gallery-position">Marketing Strategist</span>
					</p>
				</div>
				<div class="gallery-item gallery-item__low">
					<img src="{{asset('img/images/worker-3-min.png')}}" alt="Bogdan - COO at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Bogdan <span class="team-gallery-position">COO</span>
					</p>
				</div>
				<div class="gallery-item gallery-item__low gallery-row-2">
					
					<img src="{{asset('img/images/ani.jpg')}}" alt="Ani - Marketing Strategist at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Ani <span
								class="team-gallery-position">Marketing Strategist</span>
					</p>
				</div>
				<div class="gallery-item gallery-row-2">
					<img src="{{asset('img/images/worker-2.png')}}" alt="Ann - Lead Designer at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Ann <span class="team-gallery-position">Lead Designer</span>
					</p>
				</div>
				<div class="gallery-item gallery-item__low gallery-row-2">
					<img src="{{asset('img/images/alex.jpg')}}" alt="Alex - Lead Developer at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Alex <span class="team-gallery-position">Lead Developer</span>
					</p>
				</div>
			</div>
			<a href="{{route('about')}}" class="slider-content_link gallery-link">@lang('general.more')</a>
		</div>
	</div>
	@include('pages.partials.mautic._form-ajax')
	
	@if(App::getLocale() == 'en')
		@include('pages.partials._google-structured-data')
	@endif
	
	@if(App::getLocale() == 'en')
		@include('pages.partials.popups._get-demo')
	@endif
	
	@if(App::getLocale() == 'ru')
		@include('pages.partials.popups._get-presentations')
	@endif
@stop
