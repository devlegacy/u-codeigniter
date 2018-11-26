<?php

defined('BASEPATH') or exit('No direct script access allowed');
use App\models\traits\Helper;

class Contact extends CI_Model {
  use Helper;
  private $table = 'contacts';

  public function __construct() {
    parent::__construct();
  }



}
