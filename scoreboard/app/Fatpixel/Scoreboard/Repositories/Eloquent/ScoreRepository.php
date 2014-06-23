<?php

namespace Fatpixel\Scoreboard\Repositories\Eloquent;

use Player;
use Score;
use Fatpixel\Scoreboard\Repositories\ScoreRepositoryInterface;

class ScoreRepository extends AbstractRepository implements ScoreRepositoryInterface
{

    /**
     * Create a new ScoreRepository instance.
     *
     * @param Score $score
     */
    public function __construct(Score $score)
    {
        $this->model = $score;
    }

    /**
     * Find all scores.
     *
     * @param string $orderDir
     *
     * @return \Illuminate\Database\Eloquent\Collection|Score[]
     */
    public function findAll($orderDir = 'desc')
    {
        $scores = $this->model
            ->orderBy('id', $orderDir)
            ->get();

        return $scores;
    }

    /**
     * Find a score by id.
     *
     * @param  mixed $id
     * @return Score
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a score by player_id.
     *
     * @param int $player_id
     *
     * @return Score
     */
    public function findByPlayerId($player_id)
    {
        return $this->model->where('player_id', '=', $player_id)->get();
    }

    /**
     * @param Score $score
     *
     * @return bool
     */
    public function store(Score $score)
    {
        return $score->save();
    }
}
