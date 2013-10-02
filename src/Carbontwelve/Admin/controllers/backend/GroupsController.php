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
class GroupController extends AdminBaseController
{

    public function index()
    {

        // Find all groups
        $groups = Sentry::getGroupProvider()->createModel()->paginate();

        // Display the groups index page
        return $this->adminView( 'groups.index', compact('groups') );

    }

}
