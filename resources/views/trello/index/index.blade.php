@extends('trello.layout')

@section('body')
	<main>
		<div class="container">
			<div class="row">
				{{--<div class="col s12">--}}
				<h1>Please enter your trello username!</h1>
				<form action="{{route('trello-dashboard')}}" method="GET">
					<div class="input-field col s12">
						<select name="user_name">
							@foreach($users as $user)
								<option value="{{$user->id}}">{{$user->fullName}}</option>
							@endforeach
						</select>
						<label>User</label>
					</div>
					<div class="input-field col s12">
						<select name="project">
							<option value="all" selected>All</option>
							@foreach($boards as $board)
								<option value="{{$board->id}}">{{$board->name}}</option>
							@endforeach
						</select>
						<label>Project</label>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</form>
				{{--</div>--}}
			</div>
		
		</div>
	</main>
@stop

@section('js')
	<script>
		$(document).ready(function() {
			$('select').material_select();
		});
	</script>
@stop
