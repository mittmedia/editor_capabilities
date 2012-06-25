<?php global $site; global $theme_names; ?>

<div class="wrap">
  <div id="icon-options-general" class="icon32"><br></div>
  <h2><?php _e( 'Roles Remake Options' ); ?></h2>
  <?php
    global $wp_roles;

    echo wp_hash_password( 'rattmuff11?' );

    $id = 69;

    $blog = \WpMvc\Blog::find( $id );


    \WpMvc\DevHelper::dump( $blog );


    $roles_and_capabilities = unserialize( $blog->options->{"wp_{$id}_user_roles"}->option_value );

    \WpMvc\DevHelper::dump( $roles_and_capabilities );

    $roles_and_capabilities['editor']['capabilities']['switch_themes'] = true;
    $roles_and_capabilities['editor']['capabilities']['edit_themes'] = false;
    $roles_and_capabilities['editor']['capabilities']['update_themes'] = false;
    $roles_and_capabilities['editor']['capabilities']['delete_themes'] = false;
    $roles_and_capabilities['editor']['capabilities']['install_themes'] = false;
    $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] = true;

    $blog->options->{"wp_{$id}_user_roles"}->option_value = serialize( $roles_and_capabilities );

    $blog->save();
  ?>
</div>
