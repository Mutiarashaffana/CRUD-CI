<?php defined('BASEPATH') OR exit('No direct script access allowed');
class supplier_model extends CI_Model
{
    private $_table = "supplier";
    public $suplier_id;
    public $supplier_name;
    public $supplier_address;
    public function rules()
    {
        return [
            ['field' => 'supplier_name',
            'label' => 'Name',
            'rules' => 'required'],
            ['field' => 'supplier_address',
            'label' => 'Address',
            'rules' => 'required']
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["suplier_id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();

        $this->supplier_name = $post["supplier_name"];
        $this->supplier_address = $post["supplier_address"];
        $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->suplier_id = $post["id"];
        $this->supplier_name = $post["supplier_name"];
        $this->supplier_address = $post["supplier_address"];
        $this->db->update($this->_table, $this, array('suplier_id' => $post['id']));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("suplier_id" => $id));
    }
}