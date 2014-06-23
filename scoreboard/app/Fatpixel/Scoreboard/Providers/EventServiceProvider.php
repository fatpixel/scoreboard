<?php

namespace Fatpixel\Scoreboard\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * @package Fatpixel\Scoreboard\Providers
 */
class EventServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
    public function boot()
    {
        $this->app['events']->listen(
            'PlayerScore.award',
            'Fatpixel\Scoreboard\Handlers\PlayerScoreEventHandler@handleAward'
        );
    }

    /**
	 * Register the service provider.
	 *
	 * @return void
     */
    public function register()
    {

    }
}
