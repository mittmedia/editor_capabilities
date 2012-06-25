<?php

namespace RolesRemake
{
  class OptionsController extends \WpMvc\BaseController
  {
    public function index()
    {
      global $roles_and_capabilities;

      $current_blog_id = get_current_blog_id();

      $blog = \WpMvc\Blog::find( $current_blog_id );

      $roles_and_capabilities = unserialize( $blog->options->{"wp_{$blog->blog_id}_user_roles"}->option_value );

      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if ( isset( $_POST['capabilities']['switch_themes'] ) ) {
          $roles_and_capabilities['editor']['capabilities']['switch_themes'] = true;
        } else {
          $roles_and_capabilities['editor']['capabilities']['switch_themes'] = false;
        }

        if ( isset( $_POST['capabilities']['edit_theme_options'] ) ) {
          $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] = true;
        } else {
          $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] = false;
        }

        $blog->options->{"wp_{$blog->blog_id}_user_roles"}->option_value = serialize( $roles_and_capabilities );

        $blog->save();
      }

      $this->render( $this, "index" );
    }
  }
}
