<?php echo "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');"; ?>


class Mdl_<?php echo $VARIABLEmodel_Name; ?> extends Response_Model {

    public $table = '<?php echo $VARIABLEmodel_TableName; ?>';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return true;
    }

}