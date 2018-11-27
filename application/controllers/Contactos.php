<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactos extends CI_Controller
{
    private $validationRules = [];
    public function __construct()
    {
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

    public function index($id = null)
    {
        $data = [
          'title' => 'Listar contactos',
          'name' => 'Samuel',
          'contacts' => $id ? $this->contact->get($id) : $this->contact->all(),
          'contents' => ['contactos/index'],
        ];
        $this->load->view('templates/main', $data);
    }


    public function create()
    {
        $data = [
          'title' => 'Crear contactos',
          'contents' => ['contactos/create'],
        ];
        $this->insert();
        $this->load->view('templates/main', $data);
    }

    public function edit($id = null) {
      $contact = $this->contact->get($id);
      $contact = array_pop($contact);
      $data = [
        'title' => 'Editar contacto '. ($contact->name ? $contact->name : ''),
        'contact' => $contact,
        'contents' => ['contactos/edit'],
      ];
      $this->update();
      $this->load->view('templates/main', $data);
    }

    private function insert()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules($this->validationRules);
            if ($this->form_validation->run()) {
                $id = $this->contact->create($this->input->post());
                $this->session->set_flashdata('new-contact', $id);
                redirect(base_url().'contactos/'.$id);
            }
        }
    }

    private function update() {
      if ($this->input->post()) {
        var_dump($this->input->post());
        die();
      }
    }
}
