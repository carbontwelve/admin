<?php namespace Carbontwelve\Admin\Libraries\Menu;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class MenuItem
{

    public $text       = '';
    public $href       = '';
    public $icon       = '';
    public $class      = '';
    public $current    = false;
    public $importance = 0;

    /** @var \Carbontwelve\Admin\Libraries\Menu\Items  */
    public $children;

    public function __construct( $items = null )
    {
        $this->children = $items ?: new Items();
    }

    public function addChild( MenuItem $child )
    {
        $this->children->push($child);
        $this->children->order();
    }

    public function render()
    {

        $output = '';

        if ($this->children->count() > 0)
        {
            /** @var MenuItem $child */
            foreach ($this->children as $child)
            {
                $output .= $child->render();
            }

            $this->setCurrentUrl();

            $output = View::make('admin::backend.elements.menu.parent-node')
                ->with('children', $output)
                ->with('text', $this->text)
                ->with('href', $this->href)
                ->with('class', $this->class)
                ->with('icon', $this->icon)
                ->with('current', $this->current)
                ->render();
        }else{
            $output = View::make('admin::backend.elements.menu.child-node')
                ->with('children', $output)
                ->with('text', $this->text)
                ->with('href', $this->href)
                ->with('class', $this->class)
                ->with('icon', $this->icon)
                ->with('current', $this->current)
                ->render();
        }

        return $output;

    }

    public function setCurrentUrl()
    {
        if ( URL::current() == $this->href )
        {
            $this->current = true;
        }else{
            $this->current = false;
        }
    }

}
