<?php
/*
Plugin Name: Editor Capabilities
Plugin URI: https://github.com/mittmedia/editor_capabilities
Description: It lets you edit capabilities for the editor role.
Version: 1.0.0
Author: Fredrik Sundström
Author URI: https://github.com/fredriksundstrom
License: MIT
*/

/*
Copyright (c) 2012 Fredrik Sundström

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/

require_once( 'wp_mvc-1.0.0/init.php' );

$editor_capabilities_app = new \WpMvc\Application();

$editor_capabilities_app->init( 'EditorCapabilities', WP_PLUGIN_DIR . '/editor_capabilities' );

// WP: Add pages
add_action( "admin_menu", "editor_capabilities_add_pages" );
function editor_capabilities_add_pages()
{
  add_users_page( "Editor Capabilities Options", "Editor Capabilities", "Super Administrator", "editor_capabilities_options_menu", "editor_capabilities_options_page" );
}

function editor_capabilities_options_page()
{
  global $editor_capabilities_app;
  
  $editor_capabilities_app->options_controller->index();
}

if ( isset( $_GET['editor_capabilities_updated'] ) ) {
  add_action( 'admin_notices', 'editor_capabilities_updated_notice' );
}

function editor_capabilities_updated_notice()
{
  $html = \WpMvc\ViewHelper::admin_notice( __( 'Settings saved.' ) );

  echo $html;
}
