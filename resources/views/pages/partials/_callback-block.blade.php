<div class="callback-block">
	<div class="custom-container">
		<h4 class="heading cta-title">
			@if (isset($heading) && $heading == 'alt')
				@lang('forms.callback-form.block-heading-alt')
			@else
				@lang('forms.callback-form.block-heading')
			@endif
		</h4>
		@if (isset($heading) && $heading == 'alt')
			@include('pages.partials.forms._callback-mautic-form-alt')
		@else
			@include('pages.partials.forms._callback-mautic-form')
		@endif
	</div>
</div>