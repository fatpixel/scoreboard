

@section('player.form')
{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul class="no-bullet">
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>
		<li>
			{{ Form::label('highscore', 'Highscore:') }}
			{{ Form::text('highscore') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}
@stop
