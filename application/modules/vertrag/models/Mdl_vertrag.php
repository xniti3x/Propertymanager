
<?php

class Mdl_Vertrag extends Response_Model{

    public function getAll() {
        return $this->db->get('ip_vertrag')->result();
    }

    public function getAllWithClient() {
        $this->db->select('*');
        $this->db->from('ip_vertrag');
        $this->db->join('ip_clients','ip_clients.client_id = ip_vertrag.client_id');   
        return $this->db->get()->result();
    }
    public function insert($data) {
        $this->db->insert('ip_vertrag', $data);
        return $this->db->insert_id();
    }

    public function getAllAppartmentVertragsWithClient(){
        return $this->db->query("select * from ip_appartment,ip_vertrag,ip_clients where  ip_vertrag.client_id=ip_clients.client_id and ip_vertrag.appartment_id=ip_appartment.appartment_id ;")->result();      
    }
    public function getAllVertragsWithClient(){
        return $this->db->query("select * from ip_vertrag,ip_clients where  ip_vertrag.client_id=ip_clients.client_id ;")->result();      
    }
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('ip_vertrag')->row();
    }
    public function getDataByClientId($id) {
        $this->db->from('ip_appartment');
        $this->db->where('client_id', $id);
        $this->db->where('ip_appartment.appartment_id=ip_vertrag.appartment_id');   
        return $this->db->get('ip_vertrag')->row();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('ip_vertrag', $data);
        return true;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('ip_vertrag');
        return true;
    }

    public function changeStatus($id) {
        $table=$this->getDataById($id);
             if($table[0]->status==0)
             {
                $this->update($id,array('status' => '1'));
                return "Activated";
             }else{
                $this->update($id,array('status' => '0'));
                return "Deactivated";
             }
    }
}