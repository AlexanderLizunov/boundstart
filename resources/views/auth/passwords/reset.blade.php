@extends('admin.layout')

@section('body')
	<div class="login_page">
		<div class="filter">
		</div>

		{{--TODO::add flash messagging here!!!!--}}

		<div class='login_section'>
			<div class="login_card mdl-card mdl-shadow--2dp">
				<h4>Восстановление пароля</h4>
				<form class="" role="form" method="POST" action="{{ url('/password/reset') }}">
					{{ csrf_field() }}
					<input type="hidden" name="token" value="{{ $token }}">

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="mdl-textfield__label">E-Mail</label>
						<input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ $email or old('email') }}">
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="mdl-textfield__label">Пароль</label>
						<input id="password" type="password" class="mdl-textfield__input" name="password" autocomplete="off">
						@if ($errors->has('password'))
							<span class="help-block">
                            	<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<label for="password-confirm" class="mdl-textfield__label">Подтвержнение пароля</label>
						<input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation" autocomplete="off">
						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent submit_login">
							<i class="fa fa-btn fa-refresh"></i> Восстановить пароль
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop