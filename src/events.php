<?php

    /** @var \Carbontwelve\Admin\Libraries\Menu\Menu $menuProvider */
    Event::listen('menu.register', function($menuProvider)
    {
        $dashboardMenuItem          = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardMenuItem->text    = 'Dashboard';
        $dashboardMenuItem->href    = route('administration.dashboard');
        $dashboardMenuItem->icon    = 'glyphicon-th';
        $dashboardMenuItem->importance = 0;

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Home';
        $dashboardChildItem->href   = route('administration.dashboard');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Network';
        $dashboardChildItem->href   = '#';
        $dashboardChildItem->importance = 2;
        $dashboardMenuItem->addChild($dashboardChildItem);

        $menuProvider->register($dashboardMenuItem, 'dashboard');

        $dashboardMenuItem          = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardMenuItem->text    = 'Configuration';
        $dashboardMenuItem->href    = '#';
        $dashboardMenuItem->icon    = 'glyphicon-wrench';
        $dashboardMenuItem->importance = 99;

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Users';
        $dashboardChildItem->href   = '#';
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Groups';
        $dashboardChildItem->href   = route('administration.groups.index');
        $dashboardMenuItem->addChild($dashboardChildItem);

        $dashboardChildItem         = new \Carbontwelve\Admin\Libraries\Menu\MenuItem();
        $dashboardChildItem->text   = 'Permissions';
        $dashboardChildItem->href   = '#';
        $dashboardMenuItem->addChild($dashboardChildItem);

        $menuProvider->register($dashboardMenuItem, 'configuration');

    });
