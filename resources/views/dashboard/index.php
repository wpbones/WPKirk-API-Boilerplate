<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="wp-kirk wrap">
  <h1><?php echo $plugin->Name; ?> main view</h1>
  <h3>PHP Version <?php echo phpversion(); ?></h3>

  <h2>The routes are defined in</h2>
  <code>wp-content/plugins/WPKirk-API-Boilerplate/api/wpkirk/v1/route.php</code>

  <h2>Routes</h2>

  <pre>
    // very simple example
    Route::get('/example', function () {
      return 'Hello World!';
    });
  </pre>

  <h2>Test</h2>

  <code>/wp-json/wpkirk/v1/example</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example" frameborder="0"></iframe>


  <h2>Route</h2>

  <pre>
    // json response
    Route::get('/example_json', function () {
      wp_send_json(["tag" => "v1.0.0"]);
    });
  </pre>

  <h2>Test</h2>
  <code>/wp-json/wpkirk/v1/example_json</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example_json" frameborder="0"></iframe>

  <h2>Route</h2>

  <pre>
    // right way to use a simple response
    Route::get('/example_response', function () {
      return Route::response(["tag" => "v1.0.0"]);
    });
  </pre>

  <h2>Test</h2>
  <code>/wp-json/wpkirk/v1/example_response</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example_response" frameborder="0"></iframe>

  <h2>Route</h2>

  <pre>
    Route::get('/invalid', function () {
      return new WP_Error('no_author', 'Invalid author', ['status' => 404]);
    });
  </pre>

  <h2>Test</h2>
  <code>/wp-json/wpkirk/v1/invalid</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/invalid" frameborder="0"></iframe>

  <h2>Route</h2>

  <pre>
    // right way to use an error response
    Route::get('/error', function () {
      return Route::responseError('no_author', 'Invalid author', ['status' => 404]);
    });
  </pre>

  <h2>Test</h2>
  <code>/wp-json/wpkirk/v1/error</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/error" frameborder="0"></iframe>

  <h2>Route</h2>

  <pre>
    // may use the same route for different methods
    Route::get('/version', '\WPKirk\API\WPKirkV1Controller@version');
  </pre>

  <h2>Test</h2>
  <code>/wp-json/wpkirk/v1/version</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/version" frameborder="0"></iframe>

  <h2>Route</h2>

  <pre>
  // very simple example with args
  Route::get('/example_args', function (WP_REST_Request $request) {
    $value = var_export($request, true);

    $param = $request->get_param( 'hello' );

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
  });
</pre>

  <form method="GET" action="/wp-json/wpkirk/v1/example_args">
    <input type="hidden" name="hello" value="world">
    <button type="submit">Submit</button>
  </form>