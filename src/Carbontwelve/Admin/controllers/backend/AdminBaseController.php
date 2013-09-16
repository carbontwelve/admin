<?php namespace Carbontwelve\Admin\Controllers\Backend;
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
     * Class Init
     *
     * @return void
     */
    public function __construct()
    {
        // Ensure that the user is an admin
        $this->beforeFilter('admin-auth');
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

}
