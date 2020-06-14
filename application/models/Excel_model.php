<?php

class Excel_model extends CI_Model{
    
    public function get_stocks()
    {
        $query = $this->db->select('*')
                          ->from('stock_main')
                          ->get();
        return $query->result();
    }
    
    public function insert_csv($insert_data)
    {
        $this->db->insert('stock_main',$insert_data);
        return $this->db->insert_id();
    }
    
    public function check_product_code($product_code)
    {
        $query = $this->db->select('product_code,stock_id')
                          ->from('stock_main')
                          ->where('product_code',$product_code)
                          ->get();
        return $query->row();
    }
    
    public function insert_diamond($diamond_array)
    {
        $this->db->insert('stock_diamond',$diamond_array);
    }
    
    public function insert_stone($stone_array)
    {
        $this->db->insert('stock_stone',$stone_array);
    }
    
    public function get_stock_by_product($product_code)
    {
        $query = $this->db->select('*')
                          ->from('stock_main')
                          ->where('product_code',$product_code)
                          ->get();
        return $query->row();
    }
    
    public function insert_transport($transport_array)
    {
        $this->db->insert('stock_transport',$transport_array);
        return $this->db->insert_id();
    }
    
    public function get_product_code()
    {
        $query = $this->db->query("SELECT SUBSTRING(product_code, 5, 9) AS ExtractString from stock_main");
        return $query->result();
        //print_r($this->db->last_query());exit();
        //print_r($query->result());exit();
    }
}

?>