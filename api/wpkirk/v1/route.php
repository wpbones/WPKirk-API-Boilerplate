<?php

use WPKirk\WPBones\Routing\API\Route;

// Every route says who may call it, with a permission_callback. These demos are public on
// purpose, so they pass '__return_true'. A route without one is public too, but WP Bones 2.1.2
// raises a notice for it, and from 3.0 it will not be public.

// very simple example
Route::get('/example', function () {
  return 'Hello World!';
}, ['permission_callback' => '__return_true']);

// json response
Route::get('/example_json', function () {
  wp_send_json(["tag" => "v1.0.0"]);
}, ['permission_callback' => '__return_true']);

// right way to use a simple response
Route::get('/example_response', function () {
  return Route::response(["tag" => "v1.0.0"]);
}, ['permission_callback' => '__return_true']);

// invalid example
Route::get('/invalid', function () {
  return new WP_Error('no_author', 'Invalid author', ['status' => 404]);
}, ['permission_callback' => '__return_true']);

// right way to use an error response
Route::get('/error', function () {
  return Route::responseError('no_author', 'Invalid author', ['status' => 404]);
}, ['permission_callback' => '__return_true']);

// may use the same route for different methods
Route::get('/version', '\WPKirk\API\WPKirkV1Controller@version', ['permission_callback' => '__return_true']);

Route::post('/version', '\WPKirk\API\WPKirkV1Controller@version', ['permission_callback' => '__return_true']);

// another way to use the same route for different methods
Route::request(['get', 'POST'], '/multiple', '\WPKirk\API\WPKirkV1Controller@multiple', ['permission_callback' => '__return_true']);

// controller error example
Route::get('/error/controller', '\WPKirk\API\WPKirkV1Controller@error', ['permission_callback' => '__return_true']);

// controller args example
Route::get('/controller_args', '\WPKirk\API\WPKirkV1Controller@controller_args', ['permission_callback' => '__return_true']);

Route::get('/protected', function () {
  return 'Hello World!';
}, ['permission_callback' => function () {
  return false;
}]);

// very simple example with args
Route::get('/example_args', function (WP_REST_Request $request) {
  $value = var_export($request, true);

  $param = $request->get_param('hello');

  /**
   *   // You can access parameters via direct array access on the object:
   *   $param = $request['some_param'];
   *
   *   // Or via the helper method:
   *   $param = $request->get_param( 'some_param' );
   *
   *   // You can get the combined, merged set of parameters:
   *   $parameters = $request->get_params();
   *
   *   // The individual sets of parameters are also available, if needed:
   *   $parameters = $request->get_url_params();
   *   $parameters = $request->get_query_params();
   *   $parameters = $request->get_body_params();
   *   $parameters = $request->get_json_params();
   *   $parameters = $request->get_default_params();
   *
   *   // Uploads aren't merged in, but can be accessed separately:
   *   $parameters = $request->get_file_params();
   */

  return Route::response(
    [
      "param"   => $param,
      "request" => $value,
      "ROUTE"   => $request->get_route(),
    ]
  );
}, ['permission_callback' => '__return_true']);
