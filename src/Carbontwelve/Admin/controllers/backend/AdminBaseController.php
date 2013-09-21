<?php namespace Carbontwelve\Admin\Controllers\Backend;

use Carbontwelve\Bloggy\Interfaces\BreadcrumbInterface;
use Carbontwelve\Bloggy\Libraries\Breadcrumb;
use Illuminate\Support\Facades\View;

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
class AdminBaseController extends \Controller
{

    /**
     * Package Name for admin view file resolving
     *
     * @var string
     */
    protected $package = 'admin';

    /** @var Breadcrumb */
    protected $breadcrumbProvider;

    private $administrationMenu;

    /**
     * Class Init
     *
     * @return void
     */
    public function __construct()
    {

        // Set the breadcrumb provider
        $this->setBreadcrumbProvider( new Breadcrumb() );

        // Ensure that the user is an admin
        $this->beforeFilter('admin-auth');

        // Build the menu ( this would be good to be abstracted )
        $this->administrationMenu = array(

            0 => array(
                'text' => 'Dashboard',
                'href' => null,
                'icon' => 'glyphicon-th',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'Home',
                        'href' => array(
                            'route' => 'administration.dashboard',
                            'attr' => array()
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Network',
                        'href' => array(
                            'route' => 'administration.network',
                            'attr' => array()
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            ),
            1 => array(
                'text' => 'Posts',
                'href' => null,
                'icon' => 'glyphicon-pushpin',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'All Posts',
                        'href' => array(
                            'route' => 'administration.content.type',
                            'attr' => array('contentType' => 'post')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Add New',
                        'href' => array(
                            'route' => 'administration.content.add',
                            'attr' => array('contentType' => 'post')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Categories',
                        'href' => array(
                            'route' => 'taxonomy.choice',
                            'attr' => array('category')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Tags',
                        'href' => array(
                            'route' => 'taxonomy.choice',
                            'attr' => array('post_tag')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            ),
            2 => array(
                'text' => 'Media',
                'href' => null,
                'icon' => 'glyphicon-picture',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'Library',
                        'href' => '#',
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Add New',
                        'href' => '#',
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            ),
            3 => array(
                'text' => 'Pages',
                'href' => null,
                'icon' => 'glyphicon-file',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'All Pages',
                        'href' => array(
                            'route' => 'administration.content.type',
                            'attr' => array('contentType' => 'page')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Add New',
                        'href' => array(
                            'route' => 'administration.content.add',
                            'attr' => array('contentType' => 'page')
                        ),
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            ),
            4 => array(
                'text' => 'Comments',
                'href' => '#',
                'icon' => 'glyphicon-comment',
                'class' => null,
                'badge' => '16',
                'children' => false
            ),
            5 => array(
                'text' => 'Links',
                'href' => null,
                'icon' => 'glyphicon-link',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'All Links',
                        'href' => null,
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Add New',
                        'href' => '#',
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Link Categories',
                        'href' => '#',
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            ),
        );

        View::share('administrationMenu', $this->administrationMenu);

    }

    /**
     * Encodes the permissions so that they are form friendly.
     *
     * @param  array  $permissions
     * @param  bool   $removeSuperUser
     * @return void
     */
    protected function encodeAllPermissions(array &$allPermissions, $removeSuperUser = false)
    {
        foreach ($allPermissions as $area => &$permissions)
        {
            foreach ($permissions as $index => &$permission)
            {
                if ($removeSuperUser == true and $permission['permission'] == 'superuser')
                {
                    unset($permissions[$index]);
                    continue;
                }

                $permission['can_inherit'] = ($permission['permission'] != 'superuser');
                $permission['permission']  = base64_encode($permission['permission']);
            }

            // If we removed a super user permission and there are
            // none left, let's remove the group
            if ($removeSuperUser == true and empty($permissions))
            {
                unset($allPermissions[$area]);
            }
        }
    }

    /**
     * Encodes user permissions to match that of the encoded "all"
     * permissions above.
     *
     * @param  array  $permissions
     * @return void
     */
    protected function encodePermissions(array &$permissions)
    {
        $encodedPermissions = array();

        foreach ($permissions as $permission => $access)
        {
            $encodedPermissions[base64_encode($permission)] = $access;
        }

        $permissions = $encodedPermissions;
    }

    /**
     * Decodes user permissions to match that of the encoded "all"
     * permissions above.
     *
     * @author Bruno Gaspar
     * @since  0.0.1
     * @param  array  $permissions
     * @return void
     */
    protected function decodePermissions(array &$permissions)
    {
        $decodedPermissions = array();

        foreach ($permissions as $permission => $access)
        {
            $decodedPermissions[base64_decode($permission)] = $access;
        }

        $permissions = $decodedPermissions;
    }

    /**
     * Admin View.
     *
     * @since  0.0.2
     * @param string $view
     * @param array $data
     * @param string $package
     * @return \Illuminate\Support\Facades\View
     */
    protected function adminView($view = '', array $data = array(), $package = null)
    {

        if ( is_null($package))
        {
            $package = $this->package;
        }

        $viewName = 'backend.' . $view;

        // Check to see if view has been overloaded by the host app
        if ( ! View::exists( $viewName ) )
        {
            // If not we should use our default view
            $viewName = $package . '::backend.' . $view;
        }

        return View::make( $viewName, $data );

    }

    /**
     * Package Name Setter
     *
     * @param $package
     */
    protected function setPackage( $package )
    {
        $this->package = $package;
    }

    /**
     * Package Name Getter
     *
     * @return string
     */
    protected function getPackage()
    {
        return $this->package;
    }

    /**
     * Sets the breadcrumb provider to use
     *
     * @param $breadcrumbs
     */
    protected function setBreadcrumbProvider ( BreadcrumbInterface $breadcrumb )
    {
        $this->breadcrumbProvider = $breadcrumb;
    }

    /**
     * Gets the current breadcrumb provider
     * @return Breadcrumb
     */
    protected function getBreadcrumbProvider ()
    {
        return $this->breadcrumbProvider;
    }

}
