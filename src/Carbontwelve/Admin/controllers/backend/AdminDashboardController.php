<?php namespace Carbontwelve\Admin\Controllers\Backend;

use Carbontwelve\Admin\Interfaces\BreadcrumbInterface;
use Carbontwelve\Admin\Libraries\Breadcrumb;
use Illuminate\Support\Facades\View;
use Classification;

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
class AdminDashboardController extends AdminBaseController
{

    public function index()
    {
        $numberOfCategories = 0;

        $numberOfTags = 0;

        return $this->adminView( 'dashboard', array(
                'numberOfCategories' => $numberOfCategories,
                'numberOfTags'       => $numberOfTags
            ) );
    }

}
