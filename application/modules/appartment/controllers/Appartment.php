<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Appartment extends Admin_Controller{ 

 public function __construct() {
        parent::__construct();
        $this->load->model('mdl_appartment');
        $this->load->model('mdl_clients');
        $this->load->library('session');
    }

    public function index() { 
        $data['appartments'] = $this->mdl_appartment->getAll();
        $this->layout->buffer('content', 'appartment/index',$data);
        $this->layout->render();
    }
    
    public function add() {
        $this->layout->buffer('content', 'appartment/add');
        $this->layout->render();
    }
    
    public function addPost() {
        
        $data['title'] = $this->input->post('title');
        $data['raume'] = $this->input->post('raume');
        $data['qm'] = $this->input->post('qm');
        $data['kellerraum'] = $this->input->post('kellerraum');
        $data['stellplatz'] = $this->input->post('stellplatz');
        $data['client_id'] = $this->input->post('client_id');
        
        $this->mdl_appartment->insert($data);
        $this->session->set_flashdata('alert_success', 'Successfully added');
        redirect('appartment/index');
    }
    
    public function edit($id) {
        $data['id']=$id;
        $data['appartment'] = $this->mdl_appartment->getDataById($id);
        
        $this->layout->buffer('content', 'appartment/edit', $data);
        $this->layout->render();
    }
    
    public function editPost() {
        $id = $this->input->post('id');
        $appartment = $this->mdl_appartment->getDataById($id);
        
                $data['title'] = $this->input->post('title');
                $data['raume'] = $this->input->post('raume');
                $data['qm'] = $this->input->post('qm');
                $data['kellerraum'] = $this->input->post('kellerraum');
                $data['stellplatz'] = $this->input->post('stellplatz');
                $data['client_id'] = $this->input->post('client_id');
        
        $edit = $this->mdl_appartment->update($id,$data);
        if ($edit) {
            $this->session->set_flashdata('alert_success', 'Successfully updated');
            redirect('appartment/index');
        }
    }
    
    public function view($id) {
        $data['id'] = $id;
        $data['appartment'] = $this->mdl_appartment->getDataById($id);
        
        $this->layout->buffer('content', 'appartment/view', $data);
        $this->layout->render();
    }
    
    public function delete($id) {
        $delete = $this->mdl_appartment->delete($id);
        $this->session->set_flashdata('alert_error', 'appartment deleted');
        redirect('index');
    }
    
}