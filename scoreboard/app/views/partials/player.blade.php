<ul class="players  no-bullet">
    @foreach($players as $player)
    <li class="player" data-options="id:{{ $player->id }}" data-player>
        <span class="name">{{ $player->name }}</span>
        <span class="highscore">{{ $player->highscore }}</span>
    </li>
    @endforeach
</ul>
