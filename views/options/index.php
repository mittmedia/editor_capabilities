<?php global $blog; global $roles_and_capabilities; ?>

<div class="wrap">
  <div id="icon-users" class="icon32"><br></div>
  <h2><?php _e( 'Editor Capabilities' ); ?></h2>
  <form action="<?php echo $blog->path; ?>wp-admin/users.php?page=editor_capabilities_options_menu" method="post">
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row"><?php _e( 'Capabilities' ); ?></th>
          <td>
            <input name="capabilities[switch_themes]" type="checkbox" id="capabilities_switch_themes" <?php echo $roles_and_capabilities['editor']['capabilities']['switch_themes'] ? "checked='checked'" : ''; ?>>
            <label for="capabilities_switch_themes"><?php _e( 'Switch Themes' ); ?></label><br />
            <input name="capabilities[edit_theme_options]" type="checkbox" id="capabilities_edit_theme_options" <?php echo $roles_and_capabilities['editor']['capabilities']['edit_theme_options'] ? "checked='checked'" : ''; ?>>
            <label for="capabilities_edit_theme_options"><?php _e( 'Edit Theme Options' ); ?></label><br />
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button-primary" value="Spara ändringar">
    </p>
  </form>
</div>
