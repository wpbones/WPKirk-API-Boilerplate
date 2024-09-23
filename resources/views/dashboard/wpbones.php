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

  <h2>Path</h2>
  <code>wp-content/plugins/WPKirk-API-Boilerplate/api/wpbones/v2/route.php</code>

  <h2>Route</h2>

  <pre>
    Route::get('/info', function () {
        return Route::response(["tag" => "v1.0.0"]);
    });
  </pre>

  <h2>Test</h2>

  <code>/wp-json/wpbones/v2/example</code>
  <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpbones/v2/info" frameborder="0"></iframe>


</div>