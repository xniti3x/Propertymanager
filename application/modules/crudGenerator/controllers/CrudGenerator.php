<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CrudGenerator extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
    }

    public function index()
    {
        redirect('crudGenerator/form');
    }
    public function form()
    { 
        $this->layout->buffer('content', 'crudGenerator/form');
        $this->layout->render();
    }

    public function formPost()
    {   

        $data['items']=explode(';', str_replace(' ', '',$this->input->post("item_terms")));
        $data['title']=str_replace(' ','',$this->input->post("title"));

        //$data['title']="Raum";
        //$data['items']=array("title",	"raumNr",	"raumFl");

       // Desired directory structure
        $structure = APPPATH.'modules/'.lcfirst($data['title']).'/';
        $folder=array("controllers","models","views");
        // To create the nested structure, the $recursive parameter 
        // to mkdir() must be specified.
        if(!is_dir($structure.$folder[0])){
        if (!mkdir($structure.$folder[0], 0777, true)) {
            die('Failed to create directories...'.$folder[0]);
        }}
        if(!is_dir($structure.$folder[1])){
        if (!mkdir($structure.$folder[1], 0777, true)) {
            die('Failed to create directories...'.$folder[1]);
        }}
        if(!is_dir($structure.$folder[2])){
        if (!mkdir($structure.$folder[2], 0777, true)) {
            die('Failed to create directories...'.$folder[2]);
        }}

        $data["VARIABLEcontroller_Name"] = ucfirst($data['title']);
        $data["VARIABLEcontroller_MdlName"] ="mdl_".lcfirst($data['title']);
        $data["VARIABLEcontroller_ViewData"] =lcfirst($data['title']);
        $data["VARIABLEcontroller_Items"] = $data['items'];
        $data["VARIABLEmodel_TableName"] = "ip_".lcfirst($data['title']);
        $data["VARIABLEmodel_Name"] = $data['title'];
                
        $cont=$this->load->view('crudGenerator/generate/controller',$data,TRUE);
        $mdl=$this->load->view('crudGenerator/generate/model',$data,TRUE);
        $sqlFile=$this->load->view('crudGenerator/generate/sqlFile',$data,TRUE);

        $index=$this->load->view('crudGenerator/generate/index',$data,TRUE);
        $index=str_replace("VARIABLE_OPEN_PHP","<?php",$index);
        $index=str_replace("VARIABLE_CLOSE_PHP","?>",$index);
        $index=str_replace("VARIABLEcontroller_ViewData",$data["VARIABLEcontroller_ViewData"],$index);
        
        $partial_table=$this->load->view('crudGenerator/generate/partial_table',$data,TRUE);
        $partial_table=str_replace("VARIABLE_OPEN_PHP","<?php",$partial_table);
        $partial_table=str_replace("VARIABLE_CLOSE_PHP","?>",$partial_table);
        
        $edit=$this->load->view('crudGenerator/generate/edit',$data,TRUE);
        $edit=str_replace("VARIABLE_OPEN_PHP","<?php",$edit);
        $edit=str_replace("VARIABLE_CLOSE_PHP","?>",$edit);
        
        $view=$this->load->view('crudGenerator/generate/view',$data,TRUE);
        $view=str_replace("VARIABLE_OPEN_PHP","<?php",$view);
        $view=str_replace("VARIABLE_CLOSE_PHP","?>",$view);
        
        $add=$this->load->view('crudGenerator/generate/add',$data,TRUE);
        $add=str_replace("VARIABLE_OPEN_PHP","<?php",$add);
        $add=str_replace("VARIABLE_CLOSE_PHP","?>",$add);
        
        $controller=$structure.$folder[0]."/".ucfirst($data['title']).".php";
        $mdl_model=$structure.$folder[1]."/Mdl_".lcfirst($data['title']).".php";
        $sql_file=$structure.$folder[2]."/sqlFile.sql";
        $index_file=$structure.$folder[2]."/index.php";
        $partial_table_file=$structure.$folder[2]."/partial_".lcfirst($data['title'])."_table.php";
        $edit_file=$structure.$folder[2]."/edit.php";
        $view_file=$structure.$folder[2]."/view.php";
        $add_file=$structure.$folder[2]."/add.php";
        
        $files=array();
             if(write_file($controller,$cont)){ array_push($files,$controller);} 
             if(write_file($mdl_model,$mdl)){array_push($files,$mdl_model);}
             if(write_file($sql_file,$sqlFile)){array_push($files,$sql_file);} 
             if(write_file($index_file,$index)){array_push($files,$index_file);}
             if(write_file($partial_table_file,$partial_table)){array_push($files,$partial_table_file);}
             if(write_file($edit_file,$edit)) array_push($files,$edit_file);
             if(write_file($view_file,$view)) array_push($files,$view_file);
             if(write_file($add_file,$add)) array_push($files,$add_file);
               
        $this->layout->set(
            array(
                'files' => $files,
            )
        );
        $this->layout->buffer('content', 'crudGenerator/index',$files);
        $this->layout->render();
        
    }

}