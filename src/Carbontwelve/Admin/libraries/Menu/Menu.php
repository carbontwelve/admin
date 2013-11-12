<?php namespace Carbontwelve\Admin\Libraries\Menu;

use Carbontwelve\Admin\Interfaces\MenuInterface;
use Illuminate\Support\Facades\View;

/**
 * Class Menu
 *
 * @author  Simon Dann <simon@photogabble.co.uk>
 * @since   0.0.3
 * @package Carbontwelve\Bloggy\Library
 */
class Menu implements MenuInterface{

    /** @var \Carbontwelve\Admin\Libraries\Menu\Items  */
    protected $items;

    public function __construct( $items = null )
    {
        $this->items = $items ?: new Items();
    }

    public function register( $value = null, $key = null )
    {
        if (is_null($key) )
        {
            $this->items->push($value);
        }else{

            if ( $this->items->has($key) ){

                $this->items->mergeIntoKey($key, $value);

            }else{
                $this->items->put($key, $value);
            }
        }
        $this->items->order();
    }

    public function output()
    {
        return $this->items->all();
    }

    public function render()
    {

        $output = array();
        /** @var MenuItem $item */
        foreach ($this->items->all() as $item)
        {
            $output[] = $item->render();
        }
        return $output;

    }

}
