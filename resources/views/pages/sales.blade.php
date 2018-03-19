@extends('pages.layouts.layout')
@extends('pages.partials._footer')

@section('header-js')
	@include('pages.partials.mautic._header-conn')
@stop

@section('css')
	{!! Html::style('css/sales.css') !!}
@stop

@section('body')
	<div class="main-section sales-section">
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
	
	<div class="sales-what-we-do">
		<div class="custom-container bound-container">
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/brief.png')}}" alt="Бриф | Boundstart"></div>
				<p class="sales-step-num">1</p>
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.brief.title') !!}</h4>
					<p>{!! lang('what-we-do.brief.description') !!}</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/screen.png')}}" alt="Акция или Конкурс | Boundstart"></div>
				<p class="sales-step-num">2</p>
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.promo.title') !!}</h4>
					<p>{!! lang('what-we-do.promo.description') !!}</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/ad.jpg')}}" alt="Реклама в соц сетях | Boundstart"></div>
				<p class="sales-step-num">3</p>
				
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.ads.title') !!}</h4>
					<p>{!! lang('what-we-do.ads.description') !!}</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/popup.jpg')}}" alt="Всплывающее окно | Boundstart"></div>
				<p class="sales-step-num">4</p>
				
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.popup.title') !!}</h4>
					<p>{!! lang('what-we-do.popup.description') !!}</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/letter.png')}}" alt="Email-расслыка | Boundstart"></div>
				<p class="sales-step-num">5</p>
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.email.title') !!}</h4>
					<p>{!! lang('what-we-do.email.description') !!}</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="screen"><img src="{{asset('img/images/sales/software.png')}}" alt="База клиентов - рост продаж | Boundstart"></div>
				<p class="sales-step-num">6</p>
				<div class="description">
					<h4 class="heading">{!! lang('what-we-do.tracking.title') !!}</h4>
					<p>{!! lang('what-we-do.tracking.description') !!}</p>
				</div>
			</div>
		</div>
	</div>
	
	@include('pages.partials._callback-block')
	
	<div class="sales-who-can-use">
		@include('pages.partials._who-can-use')
	</div>
	
	@include('pages.partials._portfolio')
	
	@include('pages.partials._callback-block', ['heading' => 'alt'])
	
	
	<div class="team-section sales-team">
		<div class="custom-container team-container">
			<div class="team-title-block">
				
				@lang('sales.team.title')
				@lang('sales.team.comment')
				<img class="team-bg-image" src="{{asset('img/images/WE.png')}}" alt="we">
			</div>
			<div class="gallery-block ">
				<div class="gallery-item gallery-item__low">
					<img src="{{asset('img/images/dmitriy.jpg')}}" alt="Dan - CEO at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Ден<span class="team-gallery-position">CEO</span>
					</p>
				</div>
				<div class="gallery-item">
					<img src="{{asset('img/images/worker-1.png')}}" alt="Nick - Marketing Strategist at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Ник <span
								class="team-gallery-position">Marketing Strategist</span>
					</p>
				</div>
				<div class="gallery-item gallery-item__low">
					<img src="{{asset('img/images/worker-3-min.png')}}" alt="Bogdan - COO at Boundstart" class="gallery-image">
					<p class="team-gallery_name">Богдан <span class="team-gallery-position">COO</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	@include('pages.partials._what-you-get')
	
	@include('pages.partials.popups._get-presentations')
	@include('pages.partials.mautic._form-ajax')

@stop