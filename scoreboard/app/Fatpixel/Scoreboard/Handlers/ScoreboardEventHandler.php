<?php

namespace Fatpixel\Scoreboard\Handlers;

use Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface;
use Fatpixel\Scoreboard\Repositories\ScoreRepositoryInterface;
use \Illuminate\Session\Store;

class ScoreboardEventHandler
{
    /**
     * Player repository instance.
     *
     * @var \Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface
     */
    protected $players;

    /**
     * Session store instance.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;
    /**
     * @var \Fatpixel\Scoreboard\Repositories\ScoreRepositoryInterface
     */
    protected $score;

    /**
     * @param  \Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface $players
     * @param ScoreRepositoryInterface $score
     * @param  \Illuminate\Session\Store $session
     *
     * @return \Fatpixel\Scoreboard\Handlers\ScoreboardEventHandler
     */
    public function __construct(PlayerRepositoryInterface $players, ScoreRepositoryInterface $score, Store $session)
    {
        $this->players = $players;
        $this->session = $session;
        $this->score = $score;
    }
}
