<?php

use Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class PlayerApiController
 */
class PlayerApiController extends BaseController
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
     * @return JsonResponse
     */
    public function getIndex()
    {
        $data = $this->players->findAll();

        return with(new JsonResponse(compact('data'), 200, [], JSON_NUMERIC_CHECK))->setCallback(
            Input::get('callback')
        );
    }

    /**
     * Awards points to a particular Player
     *
     * @param $points
     * @param $player_id
     *
     * @return JsonResponse
     */
    public function awardPointsToPlayer($player_id, $points)
    {

        $player = $this->players->findById($player_id);

        $data = ['message' => 'Unknown Error', 'player' => $player];

        if ($player) {

            $scoreRepository = App::make('Fatpixel\Scoreboard\Repositories\ScoreRepositoryInterface');

            $score = new Score(compact('points', 'player_id'));
            $scoreRepository->store($score);

            if ($player->awardPoints($points)->save()) {

                $data = ['message' => 'Player awarded successfully!', 'player' => $player];

            } else {

                $data = ['message' => 'Player failed to save', 'player' => $player];

            }


            return with(new JsonResponse($data, 200, [], JSON_NUMERIC_CHECK))->setCallback(
                Input::get('callback')
            );
        } else {
            return with(new JsonResponse($data, 400, [], JSON_NUMERIC_CHECK))->setCallback(
                Input::get('callback')
            );
        }

    }
}
