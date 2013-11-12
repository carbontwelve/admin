<?php

    /** @var \Carbontwelve\Admin\Libraries\Menu\Menu $menuProvider */
    Event::listen('menu.register', function($menuProvider)
    {
        $dashboardMenuItem          = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardMenuItem->text    = 'Dashboard';
        $dashboardMenuItem->href    = route('administration.dashboard');
        $dashboardMenuItem->icon    = 'glyphicon-th';

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Home';
        $dashboardChildItem->href   = route('administration.dashboard');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Network';
        $dashboardChildItem->href   = '#';
        $dashboardChildItem->importance = 2;
        $dashboardMenuItem->addChild($dashboardChildItem);

        $menuProvider->register($dashboardMenuItem);

        $dashboardMenuItem          = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardMenuItem->text    = 'Configuration';
        $dashboardMenuItem->href    = '#';
        $dashboardMenuItem->icon    = 'glyphicon-wrench';

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Users';
        $dashboardChildItem->href   = route('administration.dashboard');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Groups';
        $dashboardChildItem->href   = route('administration.groups.index');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Permissions';
        $dashboardChildItem->href   = route('administration.dashboard');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $menuProvider->register($dashboardMenuItem);


        /*
         * 6 => array(
                'text' => 'Configuration',
                'href' => '#',
                'icon' => 'spanner',
                'class' => null,
                'children' => array(
                    array(
                        'text' => 'Taxonomy Units',
                        'href' => null,
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    ),
                    array(
                        'text' => 'Taxons',
                        'href' => null,
                        'icon' => null,
                        'class' => null,
                        'children' => array(),
                    )
                )
            )
         */

    });
