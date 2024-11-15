<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<?php ob_start() ?>

<div class="wp-kirk wrap wp-kirk-sampl">

  <div class="wp-kirk-toc-content">

    <?php wpkirk_section(__('Folders and versions', 'wp-kirk')); ?>

    <p align="center">
      <a href="https://www.wpbones.com/docs/ServicesProvider/rest-api" class="button button-primary button-hero" target="_blank">
        <?php _e('Complete Documentation', 'wp-kirk'); ?> ↗</a>
    </p>

    <p><?php _e('Here is an example of a different route', 'wp-kirk'); ?></p>

    <?php wpkirk_code("@/api/wpbones/v2/route.php"); ?>

    <?php wpkirk_code("/wp-json/wpbones/v2/info"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpbones/v2/info" frameborder="0"></iframe>

  </div>

  <?php wpkirk_toc('API') ?>

</div>