<?php

namespace App\models\traits;

trait Helper
{
    public function from()
    {
        $this->db->from($this->contact->getTable());
        return $this->db;
    }

    public function all()
    {
        return $this->from()->get()->result();
    }

    public function find($value, $key = 'id')
    {
        return $this->from()->where([$key => $value])->get()->result();
    }

    public function store($data)
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
