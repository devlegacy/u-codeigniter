<?php

defined('BASEPATH') or exit('No direct script access allowed');
use App\models\traits\Helper;

class Contact extends CI_Model
{
    use Helper;
    private $table = 'contacts';
    private $attributes = [
      'id',
      'name',
      'email',
      'phone',
      'birthdate',
      'status',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $this->db->update($this->table, $data, ['id' => $id]);
        return $id;
    }

    public function delete(int $id)
    {
        $this->db->delete($this->table, array('id' => $id));
    }
}
