<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactos extends CI_Controller
{
    private $validationRules = [];
    public function __construct() {
      parent::__construct();
      $this->load->model('contact');
      $this->validationRules = [
        [
          'field' => 'name',
          'label' => 'Nombre',
          'rules' => 'trim|required|min_length[3]'
        ],
        [
          'field' => 'email',
          'label' => 'Correo electrónico',
          'rules' => 'trim|required|valid_email|is_unique[contacts.email]',
        ],
        [
          'field' => 'phone',
          'label' => 'Teléfono',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'birthdate',
          'label' => 'Fecha de nacimiento',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'status',
          'label' => 'Estado',
          'rules' => 'trim|required|in_list[0,1]'
        ]
      ];
    }

    public function index($id)
    {
        $data = [
          'title' => 'Listar contactos',
          'name' => 'Samuel',
          'contacts' => $this->contact->all(),
        ];
        $this->load->view('contactos/index', $data);
    }

    public function create() {
      $data = [
        'title' => 'Crear contactos',
      ];
      $this->insert();
      $this->load->view('contactos/create', $data);
    }

    private function insert() {
      if ($this->input->post()) {
          $this->form_validation->set_rules($this->validationRules);
          if ($this->form_validation->run()) {
              $this->session->set_flashdata('insert', $this->contact->create($this->input->post()));
              redirect(base_url().'contactos/'.$id);
          }
      }
    }
}
