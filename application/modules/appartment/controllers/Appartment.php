<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Appartment extends Admin_Controller{ 

 public function __construct() {
        parent::__construct();
        $this->load->model('mdl_appartment');
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
        
        $data['appartment_title'] = $this->input->post('appartment_title');
        $data['appartment_raume'] = $this->input->post('appartment_raume');
        $data['appartment_qm'] = $this->input->post('appartment_qm');
    
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
        
        $data['appartment_title'] = $this->input->post('appartment_title');
        $data['appartment_raume'] = $this->input->post('appartment_raume');
        $data['appartment_qm'] = $this->input->post('appartment_qm');
    
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
        redirect('appartment/index');
    }
    
}