@extends('trello.layout')

@section('body')
	<main>
		<div class="container">
			<div class="row">
				<ul class="collection with-header">
					<li class="collection-header"><h4>Tasks (Total: {{$cardsTotal}} - Opened: {{count($cards)}})</h4></li>
					<li class="collection-header"><h4>FuckedUp Tasks - {{$fuckedUpTasks['quantity']}}</h4></li>
					<li class="collection-header"><h4>FuckedUp Tasks - {{sprintf("%.2f", $fuckedUpTasks['percentage'])}} %</h4></li>
					@foreach($cards as $card)
						<li class="collection-item
							@if ($card->due != null &&
								 $card->due < Carbon\Carbon::today()->addDays(6) &&
								 $card->due > Carbon\Carbon::today()->addDays(3) &&
								 $card->due >= Carbon\Carbon::now())
								soon
							@endif
						@if ($card->due != null &&
							 $card->due < Carbon\Carbon::today()->addDays(3) &&
							 $card->due >= Carbon\Carbon::now())
								urgent
							@endif
						@if ($card->due != null &&
							 $card->due < Carbon\Carbon::now())
								fuckedUp
							@endif">
							<div>
								<b>{{$card->boardName}}</b> - до
								@if ($card->due != null)
									{{$card->due->format("d-m-Y H:i")}}
								@else
									БЕЗ СРОКОВ
								@endif
								- {{$card->name}}
								<a href="{{$card->url}}" target="_blank" class="secondary-content">
									<i class="material-icons">send</i>
								</a>
							</div>
						</li>
						{{--<div class="col s12 m6">--}}
						{{--<div class="card blue-grey darken-1">--}}
						{{--<div class="card-content white-text">--}}
						{{--<span class="card-title">{{$card['due']->format("d-m-Y H:i")}}</span>--}}
						{{--<span class="card-title">{{$card['name']}}</span>--}}
						{{--</div>--}}
						{{--<div class="card-action">--}}
						{{--<a href="{{$card['url']}}">Go to card</a>--}}
						{{--</div>--}}
						{{--</div>--}}
						{{--</div>--}}
					@endforeach
				</ul>
			</div>
		</div>
	</main>
@stop

