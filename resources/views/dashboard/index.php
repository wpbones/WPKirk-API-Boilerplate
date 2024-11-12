<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<?php ob_start() ?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <?php wpkirk_section(__('Overview', 'wp-kirk')); ?>

    <p align="center">
      <a href="https://www.wpbones.com/docs/ServicesProvider/rest-api" class="button button-primary button-hero" target="_blank">
        <?php _e('Complete Documentation', 'wp-kirk'); ?> ↗</a>
    </p>

    <p>
      <?php _e('The routes are defined in', 'wp-kirk'); ?>
    </p>

    <?php wpkirk_code("@/api/wpkirk/v1/route.php"); ?>

    <?php wpkirk_section(__('Basic usage', 'wp-kirk')); ?>

    <?php wpkirk_code("// very simple example
Route::get('/example', function () {
  return 'Hello World!';
});"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/example"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example" frameborder="0"></iframe>

    <?php wpkirk_section(__('JSON', 'wp-kirk')); ?>

    <?php wpkirk_code("// json response
Route::get('/example_json', function () {
  wp_send_json(['tag' => 'v1.0.0']);
});"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/example_json"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example_json" frameborder="0"></iframe>

    <?php wpkirk_section(__('Response', 'wp-kirk')); ?>

    <?php wpkirk_code("// right way to use a simple response
Route::get('/example_response', function () {
  return Route::response(['tag' => 'v1.0.0']);
});"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/example_response"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/example_response" frameborder="0"></iframe>

    <?php wpkirk_section(__('Error', 'wp-kirk')); ?>

    <?php wpkirk_code("Route::get('/invalid', function () {
  return new WP_Error('no_author', 'Invalid author', ['status' => 404]);
});"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/invalid"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/invalid" frameborder="0"></iframe>

    <?php wpkirk_code("// right way to use an error response
Route::get('/error', function () {
  return Route::responseError('no_author', 'Invalid author', ['status' => 404]);
});"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/error"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/error" frameborder="0"></iframe>

    <?php wpkirk_section(__('Controller methods', 'wp-kirk')); ?>

    <?php wpkirk_code("// may use the same route for different methods
Route::get('/version', '\WPKirk\API\WPKirkV1Controller@version');"); ?>

    <?php wpkirk_code("/wp-json/wpkirk/v1/version"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpkirk/v1/version" frameborder="0"></iframe>

    <?php wpkirk_section(__('Arguments', 'wp-kirk')); ?>

    <?php wpkirk_code("// very simple example with args
Route::get('/example_args', function (WP_REST_Request \$request) {
  \$value = var_export($request, true);

  \$param = \$request->get_param( 'hello' );

  /**
    *   // You can access parameters via direct array access on the object:
    *   \$param = \$request['some_param'];
    *
    *   // Or via the helper method:
    *   \$param = \$request->get_param( 'some_param' );
    *
    *   // You can get the combined, merged set of parameters:
    *   \$parameters = \$request->get_params();
    *
    *   // The individual sets of parameters are also available, if needed:
    *   \$parameters = \$request->get_url_params();
    *   \$parameters = \$request->get_query_params();
    *   \$parameters = \$request->get_body_params();
    *   \$parameters = \$request->get_json_params();
    *   \$parameters = \$request->get_default_params();
    *
    *   // Uploads aren't merged in, but can be accessed separately:
    *   \$parameters = \$request->get_file_params();
    */

  return Route::response(
    [
      'param'   => \$param,
      'request' => \$value,
      'ROUTE'   => \$request->get_route(),
    ]
  );
});
"); ?>

    <p><?php _e('Test the route passing the parameter', 'wp-kirk'); ?></p>

    <?php wpkirk_code(
      htmlentities('<form method="GET" action="/wp-json/wpkirk/v1/example_args">
  <input type="hidden" name="hello" value="world">
  <button class="button" type="submit">Submit</button>
</form>'),
      ['language' => 'html']
    ); ?>

    <form method="GET" action="/wp-json/wpkirk/v1/example_args">
      <input type="hidden" name="hello" value="world">
      <button class="button" type="submit">Submit</button>
    </form>

  </div>

  <?php wpkirk_toc('API') ?>

</div>