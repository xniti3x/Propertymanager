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

        $title=lcfirst(str_replace(' ','',$this->input->post("title")));
        $data['title']=$title;
        $data['items']=explode(';',str_replace(' ', '',$this->input->post("item_terms")));
        

       // Desired directory structure
        $structure = APPPATH.'modules/'.($title).'/';
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
                
        $cont=$this->load->view('crudGenerator/generate/controller',$data,TRUE);
        $mdl=$this->load->view('crudGenerator/generate/model',$data,TRUE);
        $sqlFile=$this->load->view('crudGenerator/generate/sqlFile',$data,TRUE);

        $index=$this->load->view('crudGenerator/generate/index',$data,TRUE);
        $index=str_replace("VARIABLE_OPEN_PHP","<?php",$index);
        $index=str_replace("VARIABLE_CLOSE_PHP","?>",$index);
        
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
        
        $controller=$structure.$folder[0]."/".ucfirst($title).".php";
        $mdl_model=$structure.$folder[1]."/Mdl_".($title).".php";
        $sql_file=$structure.$folder[2]."/sqlFile.sql";
        $index_file=$structure.$folder[2]."/index.php";
        $partial_table_file=$structure.$folder[2]."/partial_".($title)."_table.php";
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