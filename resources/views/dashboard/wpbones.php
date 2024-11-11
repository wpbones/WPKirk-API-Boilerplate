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
    <?php wpkirk_code("@/api/wpbones/v2/route.php"); ?>

    <?php wpkirk_code("/wp-json/wpbones/v2/info"); ?>
    <iframe style="width: 100%;border-radius: 8px;margin: 8px 0" src="/wp-json/wpbones/v2/info" frameborder="0"></iframe>

  </div>

  <?php wpkirk_toc('Hooks') ?>

</div>