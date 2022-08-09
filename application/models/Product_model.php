<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model 
{

	function GetAllProducts()
    {
	   $this->db->order_by('frecno', 'DESC');;
       $this->db->select('*');
       $this->db->where('fmerchant_email', $this->session->merchant_email);
       return $this->db->get('tproducts')->result();  
    }

    function InsertProduct($data)
    {
        $this->db->insert('tproducts', $data);
		return $this->db->affected_rows();
		//var_dump($data);
	}

	function UpdateProduct($data, $id)
    {
	   $this->db->where('frecno', $id);
       $this->db->update('tproducts', $data);
       return $this->db->affected_rows();  
	}
	
	public function DeleteProduct($id)
	{
        $this->db->delete('tproducts', array('frecno' => $id));
        return $this->db->affected_rows();
	}
    
    

}