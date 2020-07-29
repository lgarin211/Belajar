<?php
class Items_Model extends CI_Model
{
    public function get_all()
    {
        $data1=$this->db->get('item');
        return $data1->result();
    }
}
