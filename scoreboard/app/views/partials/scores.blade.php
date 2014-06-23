{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('player_id', 'Player_id:') }}
			{{ Form::text('player_id') }}
		</li>
		<li>
			{{ Form::label('points', 'Points:') }}
			{{ Form::text('points') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}
