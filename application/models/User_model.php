<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model 
{

	function AllMerchants()
    {
	   $this->db->order_by('frecno', 'DESC');
       $this->db->select('*');
       return $this->db->get('tmerchants')->result();  
	}
	
    function InsertMerchant($data)
    {
        $this->db->insert('tmerchants', $data);
		return $this->db->affected_rows();
		//var_dump($data);
	}


	function UpdateMerchant($email, $check, $token)
    {
	   $this->db->set('fcheck', $check);
	   $this->db->set('ftoken', $token);
	   $this->db->where('femail', $email);
	   $this->db->update('tmerchants');  
	   return $this->db->affected_rows();
    }
	
	
	function VerifyEmail($check, $token)
    {
      $this->db->select('*');
	  $this->db->where('fcheck', $check);
	  $this->db->where('ftoken', $token);
	  $row = $this->db->get('tmerchants')->row();  
	  return $row;
    }
    
    function UpdateToken($email)
    {
       $this->db->set('active', 1);;
	   $this->db->where('email', $email);
       return $this->db->update('users');  
    }

	function FetchSellerDetails($email)
	{
		return $this->db->get_where('tmerchants', array('femail' => $email))->row();
	}
	
    function ActivateSeller($email)
	{
		$this->db->set('fverified', 1);
		$this->db->where('femail', $email);
		$this->db->update('tmerchants');
		return $this->db->affected_rows();
	}
	
	function CheckEmail($email)
	{
		  $this->db->where('femail', $email);
		  $row = $this->db->get('tmerchants')->row();  
	      return $row;
	}
    
    function CheckVerifiedStatus($email)
	{
		$this->db->where('femail', $email);
		return $verified_status = $this->db->get('tmerchants')->row();   
	}

	function LoginValidate($email, $pass_word)
	{
		$this->db->where('femail', $email);
		$row = $this->db->get('tmerchants')->row();
		return $row ? password_verify($pass_word, $row->fpass_word) : false;
	}

	function InsertPasswordResetToken($data)
    {
        $insert = $this->db->insert('tpass_word_resets', $data);
		return $this->db->affected_rows();
	}

	function VerifyToken($email, $token)
    {
      $this->db->select('*');
	  $this->db->where('femail', $email);
	  $this->db->where('ftoken', $token);
      return $this->db->get('tpass_word_resets')->row();  
	}

	function UpdatePassword($email, $new_password)
	{
	    $this->db->set('fpass_word', $new_password);
		$this->db->where('femail', $email);
		$this->db->update('tmerchants');
		return $this->db->affected_rows();
	}

	function InsertRandNumber($data)
    {
        $this->db->insert('tverifyemail', $data);
		return $this->db->affected_rows();
		//var_dump($data);
	}

	function CheckName($store_name)
	{
		  $this->db->where('fstore_name', $store_name);
		  $row = $this->db->get('tmerchants')->row();
		  return $row ? true : false;
	}

}