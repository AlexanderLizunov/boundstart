<div id="section-3" class="works-section">
	<div class="custom-container works-container">
		<h2 class="slider-main_title step-title__right"> {!! lang('works-title') !!}</h2>
		<img src="{{asset('img/images/WORK.png')}}" alt="work" class="work-bg_image">
		<div class="works-slider-block">
			@foreach($portfolioItems as $item)
				{!! $item['img']!!}
			@endforeach
		</div>

		<div class="slider-content-block">
			@foreach($portfolioItems as $item)
				{!!  $item['description']!!}
			@endforeach

		</div>
		<button class=" slider-control works-control-item works-control-right" data-direction="next"></button>
		<button class=" slider-control works-control-item works-control-left" data-direction="prev"></button>
	</div>
	<div class="custom-container works-container works-bottom">
		<div class="works-bottom_cover works-item-1">
		</div>
		<div class="works-bottom_cover works-item-2">
		</div>
		<div class="works-bottom_cover works-item-3">
		</div>
		<div class="works-bottom_cover works-item-4">
		</div>
		<div class="inline-fake"></div>
	</div>
</div>