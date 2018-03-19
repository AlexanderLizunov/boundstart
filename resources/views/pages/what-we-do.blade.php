@extends('pages.layouts.layout')
@extends('pages.partials._footer')

@section('header-js')
	@include('pages.partials.mautic._header-conn')
@stop

@section('css')
	{!! Html::style('css/what-we-do.css') !!}
@stop

@section('body')
	<div class="main-section">
		<div class="main-bg-cover">
		</div>
		<div class="custom-container main-section-container">
			@include('pages.partials._header')
			
			@include('pages.partials.index._first-screen-no-form')
		</div>
	</div>
	<div id="section-2" class="steps-section">
		<div class="steps-cover">
			<div class="custom-container">
				<div class="steps-container step-container__right step-container-first">
					<div class="content-cover">
						<div class="content-block ">
							<h2 class="step-title-first step-title__right">{!! lang('brief.title') !!}</h2>
							{!! lang('brief.list') !!}
						</div>
					</div>
					<img src="{{asset('img/images/wedo-step1.png')}}" alt="Turn traffic to leads"
						 class="step-container_img step-container_img__left">
				</div>
			</div>
			<div class="steps-container step-container-second">
				<div class="custom-container">
					<div class="content-cover content-cover_second">
						<div class="content-block">
							<h2 class="step-title-second">{!! lang('creation-promo.title') !!}</h2>
							{!! lang('creation-promo.list') !!}
						</div>
					</div>
				</div>
				<img src="{{asset('img/images/wedo-step2.png')}}" alt="Launching advertising campaigns"
					 class="step-container_img step-container_image__right">
			</div>
			<div class="custom-container">
				<div class="steps-container step-container__right step-container-third">
					<div class="content-cover content-cover-third">
						<div class="content-block">
							<h2 class="step-title__right">{!! lang('campaign.title') !!} </h2>
							<p class="steps-title_small"></p>
							{!! lang('campaign.list') !!}
						</div>
					</div>
					<img src="{{asset('img/images/wedo-step3.png')}}" alt="Conversion of leads"
						 class="step-container_img step-container_img__left step-container-image-third ">
				</div>
			</div>
			<div class="steps-container step-container-fourth">
				<div class="custom-container">
					<div class="content-cover content-cover-fourth ">
						<div class="content-block">
							<h2 class="step-title-second">{!! lang('pop-up.title') !!} </h2>
							{!! lang('pop-up.list') !!}
						</div>
					</div>
				</div>
				<img src="{{asset('img/images/wedo-step4.png')}}" alt="Launching advertising campaigns"
					 class="step-container_img step-container_image__right step-container-image-fourth">
			</div>
			<div class="steps-container step-container__right step-container-fifth">
				<div class="custom-container">
					<div class="content-cover content-cover-fifth">
						<div class="content-block">
							<h2 class="step-title__right">{!! lang('email.title') !!} </h2>
							{!! lang('email.list') !!}
						</div>
					</div>
				</div>
				<img src="{{asset('img/images/wedo-step6.png')}}" alt="Conversion of leads"
					 class="step-container_img step-container_img__left step-container-image-fifth ">
			</div>
			<div class="steps-container step-container-sixth">
				<div class="custom-container">
					<div class="content-cover content-cover-sixth ">
						<div class="content-block">
							<h2 class="step-title-second">{!! lang('tracking.title') !!} </h2>
							<p class="steps-title_small">Visitors become traffic </p>
							{!! lang('tracking.list') !!}
						</div>
					</div>
				</div>
				<img src="{{asset('img/images/wedo-step5.png')}}" alt="Launching advertising campaigns"
					 class="step-container_img step-container_image__right step-container-image-sixth">
			</div>
			
			@include('pages.partials._what-you-get')
			
		</div>
		<div class="action-cover">
			<div class="custom-container action-container">
				<div class="call-to-action-block">
					<p class="action-title">
						{!! lang('more-text') !!}
					</p>
					<button class="main-button custom-action-button"> {!! lang('more-button') !!}</button>
				</div>
			</div>
		</div>
	</div>
	@include('pages.partials.mautic._form-ajax')
	@include('pages.partials.popups._get-demo')
@stop