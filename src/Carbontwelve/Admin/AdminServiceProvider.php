<?php namespace Carbontwelve\Admin;
/**
 * --------------------------------------------------------------------------
 * AdminServiceProvider
 * --------------------------------------------------------------------------
 *
 * @package  Carbontwelve\Admin
 * @category ServiceProvider
 * @since    0.0.1
 * @author   Simon Dann <simon@photogabble.co.uk>
 */

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminServiceProvider extends ServiceProvider {

    /**
     * --------------------------------------------------------------------------
     * Indicates if loading of the provider is deferred.
     * --------------------------------------------------------------------------
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * --------------------------------------------------------------------------
     * Package Init Script
     * --------------------------------------------------------------------------
     */
    public function boot()
    {
        /* Let Laravel Know what package we are */
        $this->package('Carbontwelve/Admin');

        /* Load package routes */
        require_once __DIR__.'/../../routes.php';

        /* Load package macros */
        require_once __DIR__.'/../../macros.php';

        /* Load package events */
        require_once __DIR__.'/../../events.php';
    }

    /**
     * --------------------------------------------------------------------------
     * Register the service provider.
     * --------------------------------------------------------------------------
     *
     * @return void
     */
    public function register()
    {
        // For some reason we have to register our view namespace. I do not
        // know why, I thought laravel did this automatically on boot();
        View::addNamespace('admin', __DIR__.'/../../views');
    }

    /**
     * --------------------------------------------------------------------------
     * Get the services provided by the provider.
     * --------------------------------------------------------------------------
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
