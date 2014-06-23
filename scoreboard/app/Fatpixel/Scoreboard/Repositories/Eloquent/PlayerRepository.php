<?php

namespace Fatpixel\Scoreboard\Repositories\Eloquent;

use Player;
use Score;
use Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface;

class PlayerRepository extends AbstractRepository implements PlayerRepositoryInterface
{

    /**
     * Create a new PlayerRepository instance.
     *
     * @param Player $player
     */
    public function __construct(Player $player)
    {
        $this->model = $player;
    }

    /**
     * Find all players.
     *
     * @param string $orderColumn
     * @param string $orderDir
     * @return \Illuminate\Database\Eloquent\Collection|Player[]
     */
    public function findAll($orderColumn = 'highscore', $orderDir = 'desc')
    {
        $players = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();

        return $players;
    }

    /**
     * Find a player by id.
     *
     * @param int $id
     * @return Player
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param Player $player
     *
     * @return bool
     */
    public function store(Player $player)
    {
        return $player->save();
    }
}
