<div class="main-content-cover">
	<div class="main-content-left">
		<p class="content-main-title">
			@lang('main-screen-form-block.main-title')
		</p>
		<p class="main-content-comment">
			@lang('main-screen-form-block.main-description')
		</p>
		<p class="main-content-comment-time">
			@lang('main-screen-form-block.main-description-time')
		</p>
		@lang('main-screen-form-block.main-list')
	</div>
	<div class="main-content-right">
		<div class="main-screen-form">
			@include('pages.partials.forms._main-form')
		</div>
	</div>
	{{--<div class="inline-fake"></div>--}}
</div>