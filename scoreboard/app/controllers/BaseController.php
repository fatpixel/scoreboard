<?php

use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    /**
     * The layout used by the controller.
     *
     * @var \Illuminate\View\View
     */
    protected $layout = 'layouts.master';

    /**
     * Blade template path
     *
     * @var Application
     */
    protected $app;


    public function __construct()
    {
        $this->app = App::getFacadeApplication();
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    /**
     * Set the specified view as content on the layout.
     *
     * @param string $view
     * @param array $data
     *
     */
    protected function render($view, $data = [])
    {
        return View::make($view, $data);
    }
}
