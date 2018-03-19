@section('footer')
	<footer class="footer-section">
		<div class="custom-container footer-container">
			<a href="{{route('index')}}">
				<img src="{{asset('img/images/logo.svg')}}"
					 alt="Boundstart predictable lead generation"
					 class="footer-item footer-logo">
			</a>
			<div class="social-links">
				<a itemprop="sameAs" href="@lang('general.footer.socials.insta')" class="footer-item social-link"
				   target="_blank">
					@include('pages.partials.svg._insta')
				</a>
				<a class="footer-item social-link fb" itemprop="sameAs" href="@lang('general.footer.socials.fb')"
				   target="_blank">
					@include('pages.partials.svg._fb')
				</a>
			</div>
			<div class="footer-item footer-contacts-block">
				<p class="contact-item">
					@lang('general.footer.contacts.heading')
				</p>
				<p class="contact-item">
					<a href="tel:@lang('general.footer.contacts.phone-1-clean')"> @lang('general.footer.contacts.phone-1')</a>
				</p>
				@if(App::getLocale() == 'ru')
					<p class="contact-item">
						<a href="tel:@lang('general.footer.contacts.phone-2')"> @lang('general.footer.contacts.phone-2')</a>
					</p>
					{{--<p class="contact-item">--}}
						{{--<a href="tel:@lang('general.footer.contacts.phone-3')"> @lang('general.footer.contacts.phone-3')</a>--}}
					{{--</p>--}}
				@else
					<p class="contact-item">
						@lang('general.footer.contacts.phone-2')
					
					</p>
					<p class="contact-item">
						@lang('general.footer.contacts.phone-3')
					</p>
				@endif
				
				
				<p class="contact-item">
					<a href="mailto:@lang('general.footer.contacts.email-clean')">@lang('general.footer.contacts.email')</a>
				
				</p>
			</div>
			<div class="inline-fake"></div>
		</div>
		<div class="footer-button_cover">
			<button class="footer-scroll-top"></button>
		</div>
		<meta itemprop="name" content="Boundstart">
	</footer>
@stop