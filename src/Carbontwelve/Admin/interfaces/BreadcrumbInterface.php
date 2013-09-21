<?php namespace Carbontwelve\Bloggy\Interfaces;

/**
 * Class BreadcrumbInterface
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.2
 * @package Carbontwelve\Bloggy\Interfaces
 */
interface BreadcrumbInterface {

    /**
     * Sets this->breadcrumbs to equal $breadcrumbs
     *
     * @param array $breadcrumbs
     * @return void
     */
    public function setBreadcrumbs ( array $breadcrumbs );

    /**
     * Returns the value of this->breadcrumbs
     *
     * @return array
     */
    public function getBreadcrumbs ();

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
     * @return mixed
     */
    public function addBreadcrumb ( array $value );

    /**
     * Updates this->breadcrumbs value where key = $key
     *
     * @param $key
     * @param $value
     * @return boolean
     */
    public function updateBreadcrumb ( $key, $value );

    /**
     * Deletes a key from this->breadcrumbs and recreates
     * the array index
     *
     * @param $key
     * @return boolean
     */
    public function deleteBreadcrumb ( $key );

    /**
     * Recreates this->breadcrumbs array index
     * @return void
     */
    public function resetBreadcrumbIndex ();

    /**
     * Renders the breadcrumb into html and returns the
     * result
     * @return string
     */
    public function render();

}
