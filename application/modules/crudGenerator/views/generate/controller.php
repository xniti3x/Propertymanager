<?php echo "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');"; ?>

class <?php echo ucfirst($title); ?> extends Admin_Controller{ 

 public function __construct() {
        parent::__construct();
        $this->load->model('mdl_<?php echo $title; ?>');
        $this->load->library('session');
    }

    public function index() { 
        $data['<?php echo $title; ?>s'] = $this->mdl_<?php echo $title; ?>->getAll();
        $this->layout->buffer('content', '<?php echo $title; ?>/index',$data);
        $this->layout->render();
    }
    
    public function add() {
        $this->layout->buffer('content', '<?php echo $title; ?>/add');
        $this->layout->render();
    }
    
    public function addPost() {
        
    <?php foreach($items as $item){ ?>
    $data['<?php echo $title."_".$item; ?>'] = $this->input->post('<?php echo $title."_".$item; ?>');
    <?php } ?>

        $this->mdl_<?php echo $title; ?>->insert($data);
        $this->session->set_flashdata('alert_success', 'Successfully added');
        redirect('<?php echo $title; ?>/index');
    }
    
    public function edit($id) {
        $data['id']=$id;
        $data['<?php echo $title; ?>'] = $this->mdl_<?php echo $title; ?>->getDataById($id);
        
        $this->layout->buffer('content', '<?php echo $title; ?>/edit', $data);
        $this->layout->render();
    }
    
    public function editPost() {
        $id = $this->input->post('id');
        $<?php echo $title; ?> = $this->mdl_<?php echo $title; ?>->getDataById($id);
        
    <?php foreach($items as $item){ ?>
    $data['<?php echo $title."_".$item; ?>'] = $this->input->post('<?php echo $title."_".$item; ?>');
    <?php } ?>

        $edit = $this->mdl_<?php echo $title; ?>->update($id,$data);
        if ($edit) {
            $this->session->set_flashdata('alert_success', 'Successfully updated');
            redirect('<?php echo $title; ?>/index');
        }
    }
    
    public function view($id) {
        $data['id'] = $id;
        $data['<?php echo $title; ?>'] = $this->mdl_<?php echo $title; ?>->getDataById($id);
        
        $this->layout->buffer('content', '<?php echo $title; ?>/view', $data);
        $this->layout->render();
    }
    
    public function delete($id) {
        $delete = $this->mdl_<?php echo $title; ?>->delete($id);
        $this->session->set_flashdata('alert_error', '<?php echo $title; ?> deleted');
        redirect('<?php echo $title; ?>/index');
    }
    
}