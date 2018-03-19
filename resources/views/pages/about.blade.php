@extends('pages.layouts.layout')
@extends('pages.partials._footer')

@section('css')
	{!! Html::style('css/about.css') !!}
@stop

@section('body')
	<div class="main-section">
		<div class="main-bg-cover">
			<img src="{{asset('img/images/about-bg-3.png')}}" class="main-img-bg" alt="Meet our team of marketing wizards. Our mission is to help companies increase sales and revenue with internet marketing. | Boundstart">
		</div>
		<div class="custom-container main-section-container">
			@include('pages.partials._header')
			<h1 class="main-title">{!! lang('main-title') !!}</h1>
		</div>
	</div>
	
	<div class="details-section">
		<div class="custom-container details-container">
			<div class="details-item details-item-first">
				<div id="circle-1" class="details-item-label details-label-first">
					{!! lang('details.1.title') !!}
				</div>
				<p class="details-item-text">
					{!! lang('details.1.text') !!}
				</p>
			</div>
			<div class="details-item details-item-second">
				<div id="circle-2" class="details-item-label details-label-second">
					@include('pages.partials.svg._about-step-2')
				</div>
				
				<p class="details-item-title">
					{!! lang('details.2.title') !!}
				</p>
				<p class="details-item-text">
					{!! lang('details.2.text') !!}
				</p>
			</div>
			@include('pages.partials.svg._about-line')
		</div>
	</div>
	
	<div class="details-section details-section-second">
		<div class="custom-container details-container">
			<div class="details-item details-item-third">
				<div id="circle-3" class="details-item-label details-label-third">
					@include('pages.partials.svg._about-step-3')
				</div>
				<p class="details-item-title">
					{!! lang('details.3.title') !!}
				</p>
				<p class="details-item-text">
					{!! lang('details.3.text') !!}
				</p>
			</div>
			<div class="details-item details-item-fourth">
				<div id="circle-4" class="details-item-label details-label-fourth">
					@include('pages.partials.svg._about-step-4')
				</div>
				<p class="details-item-title">
					{!! lang('details.4.title') !!}
				</p>
				<p class="details-item-text">
					{!! lang('details.4.text') !!}
				</p>
			</div>
		</div>
	</div>
	
	<div class="details-section ">
		<div class="custom-container details-container">
			
			<div class="details-item details-item-fifth">
				<div id="circle-5" class="details-item-label details-label-fifth">
					@include('pages.partials.svg._about-step-5')
				</div>
				<p class="details-item-title">
					{!! lang('details.5.title') !!}
				</p>
				<p class="details-item-text">
					{!! lang('details.5.text') !!}
				</p>
			</div>
			<div class="details-item details-item-sixth">
				<div id="circle-6" class="details-item-label details-label-sixth">
					@include('pages.partials.svg._about-step-6')
				</div>
				<p class="details-item-title">
					{!! lang('details.6.title') !!}
				</p>
				<p class="details-item-text">
					{!! lang('details.6.text') !!}
				</p>
			</div>
		</div>
	</div>
	
	<div class="team-section">
		<div class="gallery-block-cover">
			<div class="custom-container team-container">
				<div class="team-title-block">
					<img class="team-bg-image" src="{{asset('img/images/WE.png')}}" alt="we">
				</div>
				<div class="gallery-block ">
					<div class="gallery-item gallery-item__low">
						<img src="{{asset('img/images/dmitriy.jpg')}}" alt="Dan - CEO at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Dan <span class="command-gallery-position">CEO</span>
						</p>
					</div>
					<div class="gallery-item">
						<img src="{{asset('img/images/worker-1.png')}}" alt="Nick - Marketing Strategist at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Nick <span
									class="command-gallery-position">Marketing Strategist</span>
						</p>
					</div>
					<div class="gallery-item gallery-item__low">
						<img src="{{asset('img/images/worker-3-min.png')}}" alt="Bogdan - COO at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Bogdan <span class="command-gallery-position">COO</span>
						</p>
					</div>
					<div class="gallery-item gallery-item__low gallery-row-2">
						
						<img src="{{asset('img/images/ani.jpg')}}" alt="Ani - Marketing Strategist at Boundstart”" class="gallery-image">
						<p class="command-gallery_name">Ani<span
									class="command-gallery-position">Marketing Strategist</span>
						</p>
					</div>
					<div class="gallery-item gallery-row-2">
						<img src="{{asset('img/images/worker-2.png')}}" alt="Ann - Lead Designer at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Ann <span class="command-gallery-position">Lead Designer</span>
						</p>
					</div>
					<div class="gallery-item gallery-item__low gallery-row-2">
						<img src="{{asset('img/images/alex.jpg')}}" alt="Alex - Lead Developer at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Alex <span
									class="command-gallery-position">Lead Developer</span>
						</p>
					</div>
					<div class="gallery-item gallery-item__low gallery-row-2">
						<img src="{{asset('img/images/david.jpg')}}" alt="David - Account Executive at Boundstart" class="gallery-image">
						<p class="command-gallery_name">David <span
									class="command-gallery-position">Account Executive</span>
						</p>
					</div>
					<div class="gallery-item gallery-row-2">
						<img src="{{asset('img/images/yar.jpg')}}" alt="Rick - Project Manager at Boundstart" class="gallery-image">
						<p class="command-gallery_name">Rick <span
									class="command-gallery-position">Project Manager</span>
						</p>
					</div>
					<div class="gallery-item gallery-item__low gallery-item-upload ">
						<img src="{{asset('img/images/you.png')}}" alt="And more members behind the scenes!"
							 class="gallery-image fake-upload-button gallery-image-upload ">
						<p class="command-gallery_name">And more
						</p>
					</div>
					<div class="inline-fake"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="photo-section">
		<div class="photo-line-block">
			<img src="{{asset('img/images/group-1-2.jpg')}}" alt="Boundstart is a digital marketing agency based in Vancouver, BC. We help businesses with generating leads through our fully-managed, custom made campaigns. | Team" class="photo-image">
			<img src="{{asset('img/images/group-1-3.jpg')}}" alt="Boundstart is a digital marketing agency based in Vancouver, BC. We help businesses with generating leads through our fully-managed, custom made campaigns. | Team" class="photo-image">
			<img src="{{asset('img/images/group-1-1.jpg')}}" alt="Boundstart is a digital marketing agency based in Vancouver, BC. We help businesses with generating leads through our fully-managed, custom made campaigns. | Team" class="photo-image">
		</div>
	</div>
@stop