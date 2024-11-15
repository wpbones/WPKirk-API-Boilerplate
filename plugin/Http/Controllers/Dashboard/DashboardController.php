<?php

namespace WPKirk\Http\Controllers\Dashboard;

use WPKirk\Http\Controllers\Controller;

if (!defined('ABSPATH')) {
  exit();
}

class DashboardController extends Controller
{
  public function index()
  {
    return WPKirk()
    ->view('dashboard.index')
    ->withAdminStyle('prism')
    ->withAdminScript('prism')
    ->withAdminStyle('wp-kirk-common');
  }

  public function wpbones()
  {
    return WPKirk()
    ->view('dashboard.wpbones')
    ->withAdminStyle('prism')
    ->withAdminScript('prism')
    ->withAdminStyle('wp-kirk-common');
  }
}
