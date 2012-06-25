<?php

namespace RolesRemake
{
  class OptionsController extends \WpMvc\BaseController
  {
    public function index()
    {
      $this->render( $this, "index" );
    }
  }
}
