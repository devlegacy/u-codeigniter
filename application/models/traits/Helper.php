<?php

namespace App\models\traits;

trait Helper {

  public function all() {
    return $this->db->get($this->table)->result();
  }

  public function create($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

}
