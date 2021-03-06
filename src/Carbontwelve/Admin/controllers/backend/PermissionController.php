<?php namespace Carbontwelve\Admin\Controllers\Backend;

use Illuminate\Support\Facades\View;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

/**
 * Class AdminBaseController
 *
 * Some stuff borrowed from Bruno Gaspar's laravel4 starter kit because its awesome sauce:
 * https://github.com/brunogaspar/laravel4-starter-kit/blob/master/app/controllers/AdminController.php
 *
 * Other stuff borrowed from Christopher Pitt's Laravel4 ACL tutorial:
 * https://medium.com/on-coding/a7f2fa1f9791
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.1
 * @package Carbontwelve\Admin\Controllers\Backend
 */
class PermissionController extends AdminBaseController
{

    public function __construct()
    {
        // I do this first as the AdminBaseController __construct() sets up breadcrumbs and stuff
        parent::__construct();

        // Lets add the class base breadcrumb here
        $this->getBreadcrumbProvider()->addBreadcrumb(
            array( 'href' => route('administration.permissions.index'), 'text' => 'Permission Management' )
        );
    }

    public function index()
    {
        // Find all permissions
        $permissions = array();

        // Display the users index page
        return $this->adminView( 'permissions.index', compact('permissions') );
    }

    public function add()
    {
        $this->getBreadcrumbProvider()->addBreadcrumb(
            array( 'href' => route('administration.permissions.add'), 'text' => 'Create New Record' )
        );

        // Display the groups add page
        return $this->adminView( 'permissions.create' );
    }

}
