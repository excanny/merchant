<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Imported_model extends CI_Model 
{

    function GetAllDomains()
    {
	   $this->db->order_by('frecno', 'DESC');;
       $this->db->select('*');
       return $this->db->get('tdomains')->result();  
    }

    function GetMerchantOrders()
    {
	   $this->db->order_by('frecno', 'DESC');;
       $this->db->select('*');
       $this->db->where('fmerchant_email', $this->session->merchant_email);
       return $this->db->get('tsales_details')->result();  
    }

    function GetMerchantSales($merchant_id)
    {
	   $this->db->order_by('frecno', 'DESC');;
       $this->db->select('*');
       $this->db->where('fmerchant_id', $merchant_id);
       return $this->db->get('tsales')->result();  
    }

    function InsertMessage($data)
    {
        $this->db->insert('tmessages', $data);
		return $this->db->affected_rows();
		//var_dump($data);
    }

    function GetMerchantMessages($merchant_id)
    {
	   $this->db->order_by('frecno', 'DESC');;
       $this->db->select('*');
       $this->db->where('fauthor_id', $merchant_id);
       return $this->db->get('tmessages')->result();  
    }

    public function FindMessage($id)
	{
		return $this->db->get_where('tmessages', array('fsubject_id' => $id))->result();
	}

    function GetAllMainCategories($domain)
    {
	   $this->db->order_by('name', 'ASC');;
       $this->db->select('*');
       $this->db->where('fdomain', $domain);
       $this->db->where('parentId', 0);
       $query = $this->db->get('tmenus');
       $returned = $this->db->affected_rows();
       if($returned > 0)
       {
            $output = '<option value="">Select one</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option value="'.$row->name.'">'.$row->name.'</option>';  
            }

           return $output;
       }
       else
       {
            $output = '<option value="">None found</option>';
            return $output; 
       }
    }
    
    

    function GetAllSubCategories($id)
    {
	   $this->db->order_by('name', 'ASC');;
       $this->db->select('name');
       $this->db->where('parent_name', $id);
       $query = $this->db->get('tmenus');
       $returned = $this->db->affected_rows();
       if($returned > 0)
       {
            $output = '<option value="">Select one</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option value="'.$row->name.'">'.$row->name.'</option>';  
            }

           return $output;
       }
       else
       {
            $output = '<option value="">None found</option>';
            return $output; 
       }
    }

    function GetCatItems($childcategory)
    {
	   $this->db->order_by('fitem_name', 'ASC');;
       $this->db->select('*');
       $this->db->where('fparent_category', $childcategory);
       $query = $this->db->get('titems');
       $returned = $this->db->affected_rows();
       if($returned > 0)
       {
            $output = '<option value="">Select one</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option value="'.$row->fitem_name.'">'.$row->fitem_name.'</option>';  
            }

           return $output;
       }
       else
       {
            $output = '<option value="">None found</option>';
            return $output; 
       }
    }

    function GetItemImage($id)
    {
      
       $this->db->order_by('frecno', 'DESC');;
       $this->db->select('fitem_image');
       $this->db->where('fitem_name', $id);
       return $this->db->get('titems')->row();  
    }

}