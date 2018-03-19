@extends('admin.layout')

@section('body')
	<div class="login_page">
		<div class="filter">
		</div>

		{{--TODO::add flash messagging here!!!!--}}

		<div class='login_section'>
			<div class="login_card mdl-card mdl-shadow--2dp">
				<h4>Добро пожаловать!</h4>
				<form class="" role="form" method="POST" action="{{ url('/login') }}">
					{{ csrf_field() }}

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="mdl-textfield__label">E-Mail</label>
						<input id="email" type="email" class="mdl-textfield__input" name="email" value="{{ old('email') }}">
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
					<div class="form-group">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-remember">
							<input type="checkbox" id="checkbox-remember" class="mdl-checkbox__input" >
							<span class="mdl-checkbox__label">Запомнить меня</span>
						</label>
					</div>
					<div class="form-group">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent submit_login">
							<i class="fa fa-btn fa-sign-in"></i> Войти
						</button>
						<a class="forgot_link" href="{{ url('/password/reset') }}">Забыли пароль?</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop