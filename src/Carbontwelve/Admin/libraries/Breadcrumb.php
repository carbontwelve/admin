<?php namespace Carbontwelve\Admin\Libraries;

use Carbontwelve\Admin\Interfaces\BreadcrumbInterface;
use Illuminate\Support\Facades\View;

/**
 * Class Breadcrumb
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.2
 * @package Carbontwelve\Bloggy\Library
 */
class Breadcrumb implements BreadcrumbInterface{

    protected $breadcrumbs = array();

    /**
     * Sets this->breadcrumbs to equal $breadcrumbs
     *
     * @param array $breadcrumbs
     * @return void
     */
    public function setBreadcrumbs ( array $breadcrumbs )
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Returns the value of this->breadcrumbs
     *
     * @return array
     */
    public function getBreadcrumbs ()
    {
        return $this->breadcrumbs;
    }

    /**
     * Appends the value of $value to this->breadcrumbs
     * If $value is a multi-dimension array then it will
     * loop over the children and add those.
     *
     * Example input:
     * $value = array ();
     * OR
     * $value = array ( array(), array(), array() ... )'
     *
     * @param array $value
     * @return void
     */
    public function addBreadcrumb ( array $value )
    {
        if ( isset( $value[0]) && is_array( $value[0] ) )
        {
            foreach ( $value as $array )
            {
                $this->addBreadcrumb( $array );
            }
        }else{
            $this->breadcrumbs[] = $value;
        }
    }

    /**
     * Updates this->breadcrumbs value where key = $key
     *
     * @param $key
     * @param $value
     * @return void
     * @throws \Exception
     */
    public function updateBreadcrumb ( $key, $value )
    {
        if ( ! isset( $this->breadcrumbs[ $key ] ) )
        {
            throw new \Exception( 'Breadcrumb $key ('. $key .') does not exist' );
        }

        $this->breadcrumbs[ $key ] = $value;

    }

    /**
     * Deletes a key from this->breadcrumbs and recreates
     * the array index
     *
     * @param $key
     * @return void
     * @throws \Exception
     */
    public function deleteBreadcrumb ( $key )
    {
        if ( ! isset( $this->breadcrumbs[ $key ] ) )
        {
            throw new \Exception( 'Breadcrumb $key ('. $key .') does not exist' );
        }

        unset( $this->breadcrumbs[ $key ] );
        $this->resetBreadcrumbIndex();
    }

    /**
     * Recreates this->breadcrumbs array index
     * @return void
     */
    public function resetBreadcrumbIndex ()
    {
        $this->breadcrumbs = array_values( $this->breadcrumbs );
    }

    /**
     * Renders the breadcrumb into html and returns the
     * result
     * @return string
     */
    public function render()
    {
        //@todo make this a configurable thing
        $output = View::make( 'Admin::backend.elements.breadcrumbs' )
            ->with( 'breadcrumbs', $this->breadcrumbs )
            ->render();

        return $output;
    }

}
