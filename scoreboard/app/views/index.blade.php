@extends('layouts.master')


@section('templates')
<script id="template--players" type="text/x-hogan-template">
    <ul class="players  no-bullet">
        @{{#players}}
        <li class="player" data-player="@{{id}}">
            <span class="name">@{{name}}</span>
            <span class="highscore">@{{highscore}}</span>
        </li>
        @{{/players}}
    </ul>
</script>
@stop


@section('content')
<div class="row  scoreboard" id="scoreboard">
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
<script>
    (function (Scoreboard, selector) {

        'use strict';

        var $scoreboard = Scoreboard.init(selector);

        Scoreboard.refreshPlayers();

        $scoreboard
            .on('click', '[data-player]', function (event) {
                event.preventDefault();
                var $this = $(this);

                $('.selected', $scoreboard).removeClass('selected');

                $this.add($scoreboard).toggleClass('selected', (event.target !== this));

                $scoreboard.data('playerId', $this.attr('data-player'));

                $('#player-name').html($this.children('.name').first().text());

            })
            .on('click', '#award', function (event) {
                event.preventDefault();
                var id = $scoreboard.data('playerId');

                Scoreboard.award(id, 5);
            });


        return $scoreboard;

    }(window.Scoreboard, '#scoreboard'));

</script>
@append
