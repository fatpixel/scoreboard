<?php

namespace Fatpixel\Scoreboard\Repositories;

use Player;

/**
 * Interface PlayerRepositoryInterface
 *
 * @package Fatpixel\Scoreboard\Repositories
 */
interface PlayerRepositoryInterface
{

    /**
     * Find all players.
     *
     * @param string $orderColumn
     * @param string $orderDir
     * @return \Illuminate\Database\Eloquent\Collection|Player[]
     */
    public function findAll($orderColumn = 'highscore', $orderDir = 'desc');

    /**
     * Find a player by id.
     *
     * @param  mixed $id
     * @return Player
     */
    public function findById($id);

    /**
     * @param Player $player
     *
     * @return bool
     */
    public function store(Player $player);
}
