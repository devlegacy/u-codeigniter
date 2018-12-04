<?php

namespace App\models\traits;

trait Helper
{
    public function all()
    {
        return $this->from();
    }

    public function from()
    {
        $this->db->from($this->contact->getTable());
        return $this->db;
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function select($select = "")
    {
        $select = implode(',', $this->attributes).($select ? ",{$select}":'');
        $this->db->select($select);
        $this->db->from($this->table);
        return $this->db;
    }

    public function getTable()
    {
        return $this->table;
    }
}
