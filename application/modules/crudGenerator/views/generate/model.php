<?php echo "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');"; ?>


class Mdl_<?php echo $title; ?> extends Response_Model {

    public $table = 'ip_<?php echo $title; ?>';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getDataById($id) {
        $this->db->where('<?php echo $title; ?>_id', $id);
        return $this->db->get($this->table)->row();
    }

    public function update($id,$data) {
        $this->db->where('<?php echo $title; ?>_id', $id);
        $this->db->update($this->table, $data);
        return true;
    }

    public function delete($id) {
        $this->db->where('<?php echo $title; ?>_id', $id);
        $this->db->delete($this->table);
        return true;
    }

}