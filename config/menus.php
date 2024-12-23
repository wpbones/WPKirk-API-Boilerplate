<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
  'wp_kirk_slug_menu' => [
    "page_title" => "WP Kirk API",
    "menu_title" => "WP Kirk API",
    'capability' => 'read',
    'icon' => 'wpbones-logo-menu.png',
    'items' => [
      [
        "page_title" => "wpkirk routes",
        "menu_title" => "wpkirk routes",
        'capability' => 'read',
        'route' => [
          'get' => 'Dashboard\DashboardController@index'
        ],
      ],
      [
        "page_title" => "wpbones routes",
        "menu_title" => "wpbones routes",
        'capability' => 'read',
        'route' => [
          'get' => 'Dashboard\DashboardController@wpbones'
        ],
      ],
    ]
  ]
];
