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
    public $locked     = false;

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

    public function merge( MenuItem $value)
    {
        if ($this->locked === false)
        {
            $this->text       = $value->text;
            $this->href       = $value->href;
            $this->icon       = $value->icon;
            $this->class      = $value->class;
            $this->current    = $value->current;
            $this->importance = $value->importance;
            $this->locked     = $value->locked;
        }

        $this->children = $this->children->merge( $value->children );
    }

    public function setCurrentUrl()
    {
        if ($this->children->count() > 0)
        {
            foreach ($this->children as $child)
            {
                if ( URL::current() == $child->href )
                {
                    $this->current = true;
                }
            }

        }else{
            if ( URL::current() == $this->href )
            {
                $this->current = true;
            }else{
                $this->current = false;
            }
        }
    }

}
