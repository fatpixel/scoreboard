<?php

namespace Fatpixel\Scoreboard\Repositories;

use Player;
use Score;

/**
 * Interface ScoreRepositoryInterface
 *
 * @package Fatpixel\Scoreboard\Repositories
 */
interface ScoreRepositoryInterface
{

    /**
     * Find a score by id.
     *
     * @param  mixed $id
     * @return Score
     */
    public function findById($id);

    /**
     * Find all scores.
     *
     * @param string $orderDir
     *
     * @return \Illuminate\Database\Eloquent\Collection|Score[]
     */
    public function findAll($orderDir = 'desc');

    /**
     * Find a score by player_id.
     *
     * @param int $player_id
     *
     * @return Score
     */
    public function findByPlayerId($player_id);

    /**
     * @param Score $score
     *
     * @return bool
     */
    public function store(Score $score);
}
