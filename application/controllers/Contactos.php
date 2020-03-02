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

    public function index(int $id = null)
    {
        $data = [
          'title' => 'Listar contactos',
          'name' => 'Samuel',
          'contacts' => $id ? $this->contact->find($id) : $this->contact->all(),
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
        $this->store();
        $this->load->view('templates/main', $data);
    }

    public function edit(int $id = null)
    {
        $contact = $this->contact->find($id);
        $contact = array_pop($contact);
        if (!$contact) {
            show_404();
        }
        $data = [
          'title' => 'Editar contacto '. ($contact->name ? $contact->name : ''),
          'contact' => $contact,
          'contents' => ['contactos/edit'],

        ];

        $this->update();
        $this->load->view('templates/main', $data);
    }

    public function delete(int $id = null)
    {
        $this->contact->delete($id);
        redirect(base_url().'contactos');
    }

    private function store()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules($this->validationRules);
            if ($this->form_validation->run()) {
                $id = $this->contact->store($this->input->post());
                $this->session->set_flashdata('new-contact', $id);
                redirect(base_url().'contactos/'.$id);
            }
        }
    }

    private function update()
    {
        if ($this->input->post()) {
            $this->validationRules[1] = [
              'field' => 'email',
              'label' => 'Correo electrónico',
              'rules' => 'trim|required|valid_email|callback_email_update_check[contacts.email]',
            ];
            $this->form_validation->set_rules($this->validationRules);
            if ($this->form_validation->run()) {
                $id = $this->contact->update($this->input->post());
                $this->session->set_flashdata('edit-contact', $id);
                redirect(base_url().'contactos/'.$id);
            }
        }
    }

    public function email_update_check($str, $field)
    {
        list($table, $field) = explode('.', $field);
        $data = $this->contact->db->get_where($table, [$field => $str])->result();
        $rows = count($data);
        if ($rows === 1) {
            $data = array_pop($data);
            if ($data->id !== $this->input->post('id')) {
                $this->form_validation->set_message('email_update_check', 'El {field} debe ser un registro único');
                return false;
            }
        } elseif ($rows > 1) {
            $this->form_validation->set_message('email_update_check', 'El {field} debe ser un registro único');
            return false;
        }
        return true;
    }

    /**
     * To test
     */
    public function change_db()
    {
        if (!$this->session->userdata('db')) {
            $this->session->set_userdata('db', 'grupo_2');
        } else {
            $this->session->set_userdata('db', ($this->session->userdata('db') == 'default' ? 'grupo_2' : 'default'));
        }
        var_dump($this->session->userdata('db'));
        var_dump($this->session->db);
    }
}
