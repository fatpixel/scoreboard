<?php

namespace Fatpixel\Scoreboard\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 *
 * @package Fatpixel\Scoreboard\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Fatpixel\Scoreboard\Repositories\PlayerRepositoryInterface',
            'Fatpixel\Scoreboard\Repositories\Eloquent\PlayerRepository'
        );
        $this->app->bind(
            'Fatpixel\Scoreboard\Repositories\ScoreRepositoryInterface',
            'Fatpixel\Scoreboard\Repositories\Eloquent\ScoreRepository'
        );
    }
}
