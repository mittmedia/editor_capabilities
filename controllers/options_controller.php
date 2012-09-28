<?php

namespace EditorCapabilities
{
  class OptionsController extends \WpMvc\BaseController
  {
    public function index()
    {
      global $blog;
      global $roles_and_capabilities;

      $current_blog_id = get_current_blog_id();

      if ($current_blog_id == 1)
        wp_die(__("This is the main site which only the super admin can change, thus there's no need for increased capabilities."));

      $blog = \WpMvc\Blog::find( $current_blog_id );

      $roles_and_capabilities = unserialize( $blog->option->{"wp_{$blog->blog_id}_user_roles"}->option_value );

      if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_GET['page'] ) && $_GET['page'] == 'editor_capabilities_options_menu' ) {
        if ( isset( $_POST['blog']["wp_{$blog->blog_id}_user_roles"]['switch_themes'] ) ) {
          $roles_and_capabilities['editor']['capabilities']['switch_themes'] = true;
        } else {
          unset( $roles_and_capabilities['editor']['capabilities']['switch_themes'] );
        }

        if ( isset( $_POST['blog']["wp_{$blog->blog_id}_user_roles"]['edit_theme_options'] ) ) {
          $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] = true;
        } else {
          unset( $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] );
        }

        $blog->option->{"wp_{$blog->blog_id}_user_roles"}->option_value = serialize( $roles_and_capabilities );

        $blog->save();

        static::redirect_to( "{$_SERVER['REQUEST_URI']}&editor_capabilities_updated=1" );
      }

      $this->render( $this, "index" );
    }
  }
}
