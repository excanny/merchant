<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class City_model extends CI_Model 
{

	function GetAllCities()
    {
	   $this->db->order_by('fcity_name', 'ASC');;
       $this->db->select('*');
       return $this->db->get('tcities')->result();  
    }
    
    function GetAllAreas($cityname)
    {
	   $this->db->order_by('farea_name', 'ASC');;
       $this->db->select('*');
       $this->db->where('fcity_name', $cityname);
       $query = $this->db->get('tareas');
       $returned = $this->db->affected_rows();
       if($returned > 0)
       {
            $output = '<option value="">Select one</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option value="'.$row->farea_name.'">'.$row->farea_name.'</option>';
            }
            return $output;
        }
        else
        {
             $output = '<option value="">None found</option>';
             return $output; 
        }
       
    }
    
    
    
    function GetAllLandmarks($areaname)
    {
	   $this->db->order_by('fland_mark', 'ASC');;
       $this->db->select('*');
       $this->db->where('farea_name', $areaname);
       $query = $this->db->get('tlandmarks');
       $returned = $this->db->affected_rows();
       if($returned > 0)
       {
            $output = '<option value="">Select one</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option value="'.$row->fland_mark.'">'.$row->fland_mark.'</option>';  
            }

           return $output;
       }
       else
       {
            $output = '<option value="">None found</option>';
            return $output; 
       }
    }

}