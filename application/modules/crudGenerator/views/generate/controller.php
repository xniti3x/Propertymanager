<?php echo "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');"; ?>

class <?php echo $VARIABLEcontroller_Name; ?> extends Admin_Controller{ 

 public function __construct() {
        parent::__construct();
        $this->load->model('<?php echo $VARIABLEcontroller_MdlName; ?>');
        $this->load->library('session');
    }

    public function index() { 
        $data['<?php echo $VARIABLEcontroller_ViewData; ?>s'] = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->getAll();
        $this->layout->buffer('content', '<?php echo $VARIABLEcontroller_ViewData; ?>/index',$data);
        $this->layout->render();
    }
    
    public function add() {
        $this->layout->buffer('content', '<?php echo $VARIABLEcontroller_ViewData; ?>/add');
        $this->layout->render();
    }
    
    public function addPost() {
        
        <?php foreach($VARIABLEcontroller_Items as $item){ ?>
        $data['<?php echo "$item"; ?>'] = $this->input->post('<?php echo "$item"; ?>');
        <?php } ?>

        $this-><?php echo $VARIABLEcontroller_MdlName; ?>->insert($data);
        $this->session->set_flashdata('alert_success', 'Successfully added');
        redirect('<?php echo $VARIABLEcontroller_ViewData; ?>/index');
    }
    
    public function edit($id) {
        $data['id']=$id;
        $data['<?php echo $VARIABLEcontroller_ViewData; ?>'] = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->getDataById($id);
        
        $this->layout->buffer('content', '<?php echo $VARIABLEcontroller_ViewData; ?>/edit', $data);
        $this->layout->render();
    }
    
    public function editPost() {
        $id = $this->input->post('id');
        $<?php echo $VARIABLEcontroller_ViewData; ?> = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->getDataById($id);
        
        <?php foreach($VARIABLEcontroller_Items as $item){ ?>
        $data['<?php echo "$item"; ?>'] = $this->input->post('<?php echo "$item"; ?>');
        <?php } ?>

        $edit = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->update($id,$data);
        if ($edit) {
            $this->session->set_flashdata('alert_success', 'Successfully updated');
            redirect('<?php echo $VARIABLEcontroller_ViewData; ?>/index');
        }
    }
    
    public function view($id) {
        $data['id'] = $id;
        $data['<?php echo $VARIABLEcontroller_ViewData; ?>'] = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->getDataById($id);
        
        $this->layout->buffer('content', '<?php echo $VARIABLEcontroller_ViewData; ?>/view', $data);
        $this->layout->render();
    }
    
    public function delete($id) {
        $delete = $this-><?php echo $VARIABLEcontroller_MdlName; ?>->delete($id);
        $this->session->set_flashdata('alert_error', '<?php echo $VARIABLEcontroller_ViewData; ?> deleted');
        redirect('index');
    }
    
}