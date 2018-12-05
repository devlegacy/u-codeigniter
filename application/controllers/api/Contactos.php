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
        // header('Content-Type: application/json; charset=UTF-8');
        // header('Accept: application/json');
        $response = new stdClass();

        $contacts =  $id ? $this->contact->find($id) : $this->contact->all();

        if (!$id) {
            $response->data = $contacts;
        } else {
            $response = array_pop($contacts);
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }

    public function store()
    {
        // var_dump($this->input->is_ajax_request());
        // var_dump($this->input->post());
        // var_dump($this->input->raw_input_stream);
        // die();
        if ($this->input->post()) {
            $response = new stdClass();
            $responseCode = null;
            $this->form_validation->set_rules($this->validationRules);
            if ($this->form_validation->run()) {
                $responseCode = 201; // Created
                $newContactID = $this->contact->store($this->input->post());
                $contact = $this->contact->all()->where(['id' => $newContactID ])->get()->result();
                $response = array_pop($contacts);
            } else {
                $responseCode = 422; // Error
                $this->form_validation->set_error_delimiters('', '');
                $response->message = "The given data was invalid.";
                $response->errors = new stdClass();
                $response->old = new stdClass();
                foreach ($this->validationRules as $rules) {
                    $response->errors->{$rules['field']} = form_error($rules['field']);
                    $response->old->{$rules['field']} = set_value($rules['field']);
                }
            }
            http_response_code($responseCode);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
        }
    }

    public function update()
    {
    }
}
