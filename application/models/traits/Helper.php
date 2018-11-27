<?php

namespace App\models\traits;

trait Helper
{
    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->result();
    }

    public function select($select = "") {
      $select = implode(',',$this->attributes).($select ? ",{$select}":'');
      $this->db->select($select);
      $this->db->from($this->table);
      return $this->db;
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
