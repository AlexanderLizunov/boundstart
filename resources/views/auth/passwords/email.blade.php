@extends('admin.layout')

@section('body')
	<div class="login_page">
		<div class="filter">
		</div>

		{{--TODO::add flash messagging here!!!!--}}

		<div class='login_section'>
			<div class="login_card mdl-card mdl-shadow--2dp">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<h4>Отправить ссылку для восстановления пароля</h4>
				<form class="" role="form" method="POST" action="{{ url('/password/email') }}">
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
					<div class="form-group">
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent submit_login">
							<i class="fa fa-btn fa-envelope"></i> Восстановить пароль
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop