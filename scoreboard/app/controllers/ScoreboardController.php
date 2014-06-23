<?php

use Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface;

/**
 * Class ScoreboardController
 */
class ScoreboardController extends BaseController
{

    /**
     * @var Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface
     */
    protected $players;

    /**
     * @param PlayerRepositoryInterface $players
     */
    public function __construct(PlayerRepositoryInterface $players)
    {
        parent::__construct();

        $this->players = $players;
    }

    /**
     * Show the homepage.
     *
     * @return \Response
     */
    public function getIndex()
    {
        $players = $this->players->findAll();

        return $this->render('index', compact('players'));
    }

    /**
     * Show the about page.
     *
     * @return \Response
     */
    public function getAbout()
    {
        return $this->render('about');
    }
}
