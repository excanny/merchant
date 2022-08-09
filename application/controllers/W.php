<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class W extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 * 
	 *
	 */

	function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model(['User_model', 'City_model']);
		
	}
	
	public function index()
	{
		$this->load->view('home');
	}

	public function register()
	{
		
		$data['cities'] = $this->City_model->GetAllCities();
		$this->load->view('main/register', $data);
		//echo  $this->session->tempdata('verified');
	}

	public function MerchantSignUpAction()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('dobday', 'Birth Day', 'trim|required');
		$this->form_validation->set_rules('dobmonth', 'Birth Month', 'trim|required');
		$this->form_validation->set_rules('dobyear', 'Birth Year', 'trim|required');
		$this->form_validation->set_rules('shopname', 'Shop Name', 'trim|required|is_unique[tmerchants.fshop_name]',
		array(
			'is_unique'     => 'This %s already exists. Choose another shop name.'
	     ));
        $this->form_validation->set_rules('shopid', 'Shop ID', 'trim|required');
		$this->form_validation->set_rules('cityname', 'City Name', 'trim|required');
		$this->form_validation->set_rules('areaname', 'Area Name', 'trim|required');
		$this->form_validation->set_rules('landmark', 'Landmark Name', 'trim|required');
		$this->form_validation->set_rules('shopaddress', 'Shop Address', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tmerchants.femail]',
		array(
			'is_unique' => 'This %s email address already exists. Choose another email address.'
	     ));
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_unique[tmerchants.fphone]');
		$this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required');
		$this->form_validation->set_rules('accountno', 'Bank Account No', 'trim|required');
		$this->form_validation->set_rules('accountname', 'Bank Account Name', 'trim|required');
		$this->form_validation->set_rules('agreement', 'Agreement', 'trim|required');
        $this->form_validation->set_rules('pwwd', 'Password', 'required');
        $this->form_validation->set_rules('pwwd2', 'Confirm Password', 'required|matches[pwwd]');

        if ($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('error', validation_errors());
			//redirect('index.php/w/register');
			$data['cities'] = $this->City_model->GetAllCities();
			$this->load->view('main/register', $data);
			
        }
        else
        {
			
			$token2 = openssl_random_pseudo_bytes(16);
			$token = bin2hex($token2);
			
			
			$dobday = $this->input->post('dobday');
			$dobmonth = $this->input->post('dobmonth');
			$dobyear = $this->input->post('dobyear');
			$dob = date('Y-m-d', strtotime($dobyear . "-" . $dobmonth . "-" .  $dobday));
			
			$check = $this->input->post('email');

            $data = array(
				'ffirst_name' => strip_tags($this->input->post('firstname')),
                'flast_name' => strip_tags($this->input->post('lastname')),
				'fdob' => $dob,
                'fshop_name' => strip_tags($this->input->post('shopname')),
                'fshop_id' => strip_tags($this->input->post('shopid')),
				'fcity_name' => strip_tags($this->input->post('cityname')),
				'farea_name' => strip_tags($this->input->post('areaname')),
				'fland_mark' => strip_tags($this->input->post('landmark')),
				'fshop_address' => strip_tags($this->input->post('shopaddress')),
				'femail' => strip_tags($this->input->post('email')),
				'fphone' => strip_tags($this->input->post('phone')),
				'fbank_name' => strip_tags($this->input->post('bankname')),
				'faccount_no' => strip_tags($this->input->post('accountno')),
				'faccount_name' => strip_tags($this->input->post('accountname')),
				'fpass_word' => password_hash($this->input->post('pwwd2'),PASSWORD_DEFAULT),
				'fcheck' => $check,
				'ftoken' => $token
			);

			$data1 = $this->security->xss_clean($data);
            //var_dump($data1);
           $inserted = $this->User_model->InsertMerchant($data1);
			if($inserted > 0)
			{
				
				$from = "noreply@awoofmart.ng";
				$name = "Awoof Mart NG";
				$to = $this->input->post('email');
				$subject = "AwoofMart Merchant Email Verification";
				$message = "<p style='text-align:center'>Click on Verify Email button to activate your merchant account.</p>
				<br>
				<p style='text-align:center'><a style='background-color: #4CAF50;border: none;color: white;padding: 10px 28px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;' href='http://merchant.awoofmart.ng/index.php/w/verifyemail/$check/$token'>Verify Email</a></p>";
				$sent = SendMail($from, $name, $to, $subject, $message);
				if($sent > 0)
				{
					$this->session->set_flashdata('success','Thank you for registering your business profile with us. An email verification message has been sent to your email address provided. Kindly go into your email inbox and click the verification button therein. Please note that you may not be able to do business with us until you have verified your email address. Thank you');
					redirect('index.php/w/register');
				}

			}
			else 
			{
				$this->session->set_flashdata('error', 'Error occured try again.');
				redirect('index.php/w/register');
			}
        }    
	}

	public function Verifyemail()
	{
	   $check = $this->uri->segment(3);
	   $token = $this->uri->segment(4);
	   $row = $this->User_model->VerifyEmail($check, $token);
	   
		//var_dump($row);
	  if(!empty($row))
	   {

			$updated = $this->User_model->ActivateSeller($check);
			if($updated > 0)
			{
				$this->session->set_flashdata('success', 'Your email is verified now. You can login.'); 
				redirect('index.php/w/login');
			}
			else
			{
				$this->session->set_flashdata('show_resend_email',  $check);
				$this->session->set_flashdata('error', 'Wrong or invalid reset token');
				redirect('index.php/w/login');
			}
			
	   }
	   else
	   {
			$this->session->set_flashdata('show_resend_email',  $check);
			$this->session->set_flashdata('error', 'Wrong or invalid reset token');
			redirect('index.php/w/login');
	   }
	}
	

	public function login()
	{
		$this->load->view('main/login');
	}

	public function LoginAction()
    {
		// $data = $this->input->post();
		// var_dump($data);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('error', validation_errors());
			redirect('index.php/w/login');
        }
        else
        {
            $email  = $this->input->post('email');
            $pass_word = $this->input->post('pwd');
            
            
            $checkemail = $this->User_model->CheckEmail($email);
            
            //var_dump($checkemail);
            
            if(!empty($checkemail))
            {
			   
				$email_verified = $this->User_model->CheckVerifiedStatus($email);

				if($email_verified->fverified == 1)
				{

					$validate = $this->User_model->LoginValidate($email, $pass_word);
					//var_dump($validate);
				
					if($validate)
					{
						$row = $this->User_model->FetchSellerDetails($email);
						//var_dump($row);
						$sess_array = array(
							'shop_name' => $row->fshop_name,
							'shop_id' => $row->fshop_id,
							'merchant_email' =>   $row->femail,
							'merchant_phone' =>   $row->fphone,
							'merchant_city' =>   $row->fcity_name,
							'merchant_area' =>   $row->farea_name,
						);
						$this->session->set_userdata($sess_array);
						
						redirect('index.php/MerchantArena');
				
					}
					else
					{
						$this->session->set_flashdata('error', 'Wrong password');
						redirect('index.php/w/login');
					}
				
				}
				else
				{
					$this->session->set_flashdata('show_resend_email',  $email);
					$this->session->set_flashdata('error', 'Account not yet verified. Check your email folders or Click on Resend verification link');
					redirect('index.php/w/login');
				}
			 
            }
            else
    		{
    			$this->session->set_flashdata('error', 'Sorry! Email is not registered in the system');
    			redirect('index.php/w/login');
    		}
    
        }    
	}


	public function forgotpassword()
	{
	   $this->load->view('main/forgot');
	}

		
	public function ForgetPasswordAction()
	{
	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('error', validation_errors());
			redirect('index.php/w/ForgotPassword');
        }
        else
        {
	    
    	    $email = $this->input->post("email");
    	    $row = $this->User_model->FetchSellerDetails($email);
    	    //var_dump($row);
    	    if($row == null)
    	    {
			   $this->session->set_flashdata('error',  'Email is not registered in the system.'); 
    	       redirect('index.php/w/ForgotPassword');
    	    }
    	    else
    	    {
    	        $token2 = openssl_random_pseudo_bytes(16);
                $data['ftoken'] = bin2hex($token2);
                $data['femail'] = $row->femail;
                //var_dump($data);
                 $token = $data['ftoken'];
                
    	      	$inserted = $this->User_model->InsertPasswordResetToken($data);
    	        if($inserted > 0)
    	        {
    	            $email = $row->femail;
    	            $to = $row->femail;
        			$name = 'AwoofMart';
        	
        			$subject = "AwoofMart | Merchant Password Reset";
        			$message = "<p>Click on link to reset password or copy link into your browser's address bar. <a href='https://merchant.awoofmart.ng/w/VerifyToken/$email/$token'>Reset Password</a></p>";
        		    
        		    echo SendMail($email, $name, $to, $subject, $message);
        		    
        			// $this->session->set_flashdata('success', 'Reset link sent successfully. Check your email folders.');
        			// redirect('index.php/w/ForgotPassword');
    	        }
    	    }
       }
	}


	
	public function CreatePassword()
	{
	    if (!$this->session->userdata('create_password'))
		{
		    $this->session->set_flashdata('error', 'Wrong or invalid token.');  
			redirect('index.php/w/ForgotPassword'); // the user is not logged in, redirect them!
		}

		
	    $this->load->view('main/create_password');
	}

	public function CreatePasswordAction()
	{
	    $this->form_validation->set_rules('pssd', 'Password', 'trim|required');
        $this->form_validation->set_rules('pssd2', 'Retype Password', 'trim|required|matches[pssd]');
        if ($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('error', validation_errors());
			redirect('index.php/w/CreatePassword');
			
        }
        else
        {
            $email = $this->session->userdata('recover_email');
            $new_password = password_hash($this->input->post('pssd2'),PASSWORD_DEFAULT);
            $updated = $this->User_model->UpdatePassword($email, $new_password);
            if($updated > 0)
			{
				$this->session->set_flashdata('success', 'Password changed successfully. You can login now');
				redirect('index.php/w/login');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error occured. Retry.');
					redirect('index.php/w/createpassword');
			}
        }
	}


	public function ResendVerificationLink()
	{
		$token2 = openssl_random_pseudo_bytes(16);
		$token = bin2hex($token2);
		$check = $this->input->post('email');


		$updated = $this->User_model->UpdateMerchant($this->input->post('email'), $check, $token);

		if($updated > 0)
		{
			$from = "noreply@awoofmart.ng";
			$name = "Awoof Mart NG";
			$to = $this->input->post('email');
			$subject = "AwoofMart Merchant Email Verification";
			$message = "<p style='text-align:center'>Click on Verify Email button to activate your merchant account.</p>
			<br>
			<p style='text-align:center'><a style='background-color: #4CAF50;border: none;color: white;padding: 10px 28px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;' href='http://merchant.awoofmart.ng/index.php/w/verifyemail/$check/$token'>Verify Email</a></p>";
			$sent = SendMail($from, $name, $to, $subject, $message);
			if($sent > 0)
			{
				$this->session->set_flashdata('success','Email verification link sent successfully. Kindly go into your email inbox and click the verification button therein. Please note that you may not be able to do business with us until you have verified your email address. Thank you');
				redirect('index.php/w/login');
			}
			else
			{
				$this->session->set_flashdata('show_resend_email',  $this->input->post('email'));
				$this->session->set_flashdata('error', 'Error occured. try again.');
				redirect('index.php/w/login');
			}
		}
		else
		{
			$this->session->set_flashdata('show_resend_email',  $this->input->post('email'));
			$this->session->set_flashdata('error', 'Error occured try again.');
			redirect('index.php/w/login');
		}
	}

	public function GetAllAreas()
	{
		$id = $this->input->post('id');
		//$id = 'Ilorin';
	    $request = $this->City_model->GetAllAreas($id);
		//echo $request->farea_name;
		//return $request->value; 
	     var_dump($request);

	}

	public function GetAllLandmarks()
	{
		$id = $this->input->post('id');
		//$id = 'Toyota';
	    $request = $this->City_model->GetAllLandmarks($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
    }

	public function logout()
	{
		session_destroy();
		redirect('/');
	}

}
