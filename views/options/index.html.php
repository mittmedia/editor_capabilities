<?php global $blog; global $roles_and_capabilities; ?>

<div class="wrap">
  <div id="icon-users" class="icon32"><br></div>
  <h2><?php _e( 'Editor Capabilities', 'editor-capabilities' ); ?></h2>
  <?php

  $content = array(
    array(
      'title' => 'Capabilities',
      'name' => $blog->options->{"wp_{$blog->blog_id}_user_roles"}->option_name,
      'type' => 'checkboxes',
      'options' => array(
        'switch_themes' => array(
          'title' => 'Switch Theme',
          'default_value' => isset( $roles_and_capabilities['editor']['capabilities']['switch_themes'] ) ? true : false
        ),
        'edit_theme_options' => array(
          'title' => 'Edit Theme Options',
          'default_value' => isset( $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] ) ? true : false
        )
      )
    )
  );

  \WpMvc\FormHelper::render_form( $blog, $content );

  ?>
</div>