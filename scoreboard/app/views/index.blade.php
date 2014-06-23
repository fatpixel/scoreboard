@extends('layouts.master')

@section('players')
<ul class="players  no-bullet">
    @foreach($players as $player)
    <li class="player" data-options="id:{{ $player->id }}" data-player>
        <span class="name">{{ $player->name }}</span>
        <span class="highscore">{{ $player->highscore }}</span>
    </li>
    @endforeach
</ul>
@stop


@section('scoreboard')
<div class="row" id="scoreboard">
    <div class="small-12 small-centered medium-9 medium-centered large-6 large-centered columns end">
        <ul class="players  no-bullet">

        </ul>
    </div>

    <div class="small-12 small-centered medium-9 medium-centered large-6 large-centered columns end">
        <div class="none  text-center">
            <small>Click a player to select</small>
        </div>
        <div class="details">
            <h5 id="player-name" class="name"></h5>
            <a class="button secondary expand award" id="award" href="#">Award player 5 points</a>
        </div>
    </div>
</div>
@stop

@section('javascript')
    @parent
<script>
    (function (Scoreboard) {

        'use strict';
        var $scoreboard = Scoreboard.init('#scoreboard');

        Scoreboard.fetchPlayers(Scoreboard.renderPlayers);

        $scoreboard
            .on('click', '[data-player]', function (event) {
                var $this = $(this);
                $('.selected', $scoreboard).removeClass('selected');

                $this.add($scoreboard).toggleClass('selected', (event.target !== this));

                $('#award').data('player_id', $this.attr('data-player-id'));

                $('#player-name').html($this.attr('data-player-name'));

            })
            .on('click', '#award', function (event) {
                event.preventDefault();
                var id = $(this).data('player_id');
                if (id) {
                    Scoreboard.award(id, 5, function () {
                        Scoreboard.fetchPlayers(Scoreboard.renderPlayers)
                            .always(function(){
                                $('[data-player-id="' + id + '"]').addClass('selected');
                            });
                    });
                }
            });

    })( window.Scoreboard );

</script>
@append

@section('content')

@yield('scoreboard')

@overwrite
