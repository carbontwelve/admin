<?php namespace Carbontwelve\Admin\Libraries\Menu;

use Illuminate\Support\Collection as BaseCollection;

class Items extends BaseCollection
{

    public function order()
    {
        /** @var MenuItem $a */
        /** @var MenuItem $b */
        uasort($this->items, function($a, $b) {
            return $a->importance - $b->importance;
        });

        return $this;
    }

    public function mergeIntoKey( $key, $value)
    {
        $this->items[$key]->merge($value);
        return $this;
    }
}
