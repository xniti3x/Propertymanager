<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vertrag extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_vertrag');
        $this->load->model('clients/mdl_clients');
        $this->load->model('appartment/mdl_appartment');
        $this->load->library('session');
    }

    public function index()
    {
        $data['vertrags'] = $this->mdl_vertrag->getAllAppartmentVertragsWithClient();
        $this->layout->buffer('content', 'vertrag/index', $data);
        $this->layout->render();
    }

    public function addVertrag($id = null)
    {
        $this->layout->buffer(
            'content',
            'vertrag/add-vertrag',
            array(
                "client_id" => $id,
                "clients" => $this->mdl_clients->get()->result(),
                "appartments" => $this->mdl_appartment->getAll(),
            )
        );
        $this->layout->render();
    }

    public function addVertragPost()
    {
        if ($this->mdl_vertrag->run_validation('validation_rules')) {
            $data['client_id'] = $this->input->post('client_id');
            $data['appartment_id'] = $this->input->post('appartment_id');
            $data['vertrag_date'] = date_to_mysql($this->input->post('vertrag_date'));
            $data['kaltmiete'] = $this->input->post('kaltmiete');
            $data['nebenkosten'] = $this->input->post('nebenkosten');
            $data['kaution'] = $this->input->post('kaution');
            $data['kautionart'] = $this->input->post('kautionart');
            $data['begin'] = date_to_mysql($this->input->post('begin'));
            $data['ende'] = date_to_mysql($this->input->post('ende'));
            $last_id = $this->mdl_vertrag->insert($data);
            $this->session->set_flashdata('alert_success', 'Successfully added.');
            redirect('vertrag/index');
        }else{
            $this->addVertrag();
        }
        
    }

    public function editVertrag($vertrag_id)
    {
        $data['vertrag_id'] = $vertrag_id;
        $data['vertrag'] = $this->mdl_vertrag->getDataById($vertrag_id);
        $data['clients'] = $this->mdl_clients->get()->result();
        $data['appartments'] = $this->mdl_appartment->getAll();

        $this->layout->buffer('content', 'vertrag/edit-vertrag', $data);
        $this->layout->render();
    }

    public function editVertragPost()
    {
        $vertrag_id = $this->input->post('vertrag_id');
        if ($this->mdl_vertrag->run_validation('validation_rules')) {
            $data['client_id'] = $this->input->post('client_id');
            $data['appartment_id'] = $this->input->post('appartment_id');
            $data['vertrag_date'] = date_to_mysql($this->input->post('vertrag_date'));
            $data['kaltmiete'] = $this->input->post('kaltmiete');
            $data['nebenkosten'] = $this->input->post('nebenkosten');
            $data['kaution'] = $this->input->post('kaution');
            $data['kautionart'] = $this->input->post('kautionart');
            $data['begin'] = date_to_mysql($this->input->post('begin'));
            $data['ende'] = date_to_mysql($this->input->post('ende'));
            $edit = $this->mdl_vertrag->update($vertrag_id, $data);
            $this->session->set_flashdata('alert_success', 'Record successfully updated');
            redirect('vertrag/index');
        }else{
            $this->editVertrag($vertrag_id);
        }
    }

    public function viewVertrag($vertrag_id)
    {
        $vertrag = $this->mdl_vertrag->getDataById($vertrag_id);
        $appartment = $this->mdl_appartment->getDataById($vertrag->appartment_id);
        $client = $this->db->where('client_id', $vertrag->client_id)->get('ip_clients')->row();
        $user = $this->db->select('user_name,user_company,user_address_1,user_address_2,user_city,user_zip,user_mobile,user_email,user_iban')->where('user_id', '1')->get('ip_users')->row();
        
        $this->load->view('vertrag/view-vertrag', 
        array("user"=>$user,
         "vertrag" => $vertrag, 
         "client" => $client, 
         "appartment" => $appartment,
        ));
    }

    public function delVertrag($vertrag_id)
    {
        //$delete = $this->mdl_vertrag->delete($vertrag_id);
        $this->db->where('id', $vertrag_id);
        $this->db->delete('ip_vertrag');
        $this->session->set_flashdata('success', 'vertrag deleted');
        redirect('vertrag/index');
    }
}
