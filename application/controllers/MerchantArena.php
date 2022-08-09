<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MerchantArena extends CI_Controller {


	public $layout;

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model(['Imported_model', 'Product_model']);
	  $this->load->library('form_validation');
	  $this->layout = 'layouts/master';
	 
	// 	if (! $this->session->userdata('logged_in'))
	// 	{
	// 		redirect('login'); // the user is not logged in, redirect them!
	// 	}
	}

	public function index()
	{
		 
		if (! $this->session->userdata('shop_id'))
		{
			$this->session->set_flashdata('error', 'Sorry, your user verification failed');
			redirect('index.php/w/login'); // the user is not logged in, redirect them!
		}
		
		$data['content'] = 'dashboard/index';
		$this->load->view($this->layout, $data); 
	}
	
	public function orders()
	{
		 
		$data['merchant_orders'] = $this->Imported_model->GetMerchantOrders();
		//var_dump($data);
		$data['content'] = 'dashboard/all_orders';
		$this->load->view($this->layout, $data); 
	}

	public function sales()
	{
		$merchant_id = "Excanny";
		$data['merchant_sales'] = $this->Imported_model->GetMerchantSales($merchant_id);
		$data['content'] = 'dashboard/all_sales';
		$this->load->view($this->layout, $data); 
	}

	public function Products()
	{
	    $data['domains'] = $this->Imported_model->GetAllDomains();
		$data['products'] = $this->Product_model->GetAllProducts();
		$data['content'] = 'dashboard/all_products';
		$this->load->view($this->layout, $data); 
	}

	public function AddProduct()
	{
		$data['domains'] = $this->Imported_model->GetAllDomains();
		$data['content'] = 'dashboard/add_product';
		$this->load->view($this->layout, $data); 
	}
	
	 public function AddProductAction()
	 {	
		
		$this->form_validation->set_rules('domain', 'Domain', 'trim|required');
		$this->form_validation->set_rules('maincategory', 'Main Category', 'trim|required');
		$this->form_validation->set_rules('subcategory', 'Sub Category', 'trim|required');
		$this->form_validation->set_rules('childcategory', 'Child Category', 'trim|required');
		$this->form_validation->set_rules('item', 'Item', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('packaging_cost', 'Packaging Cost', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('index.php/MerchantArea/AddProduct');
			}
		else
		{
		
			// $data = $this->input->post();
			// var_dump($data);
			
			$data['fdomain']	= $this->input->post("domain");
			$data['fmain_category'] = $this->input->post("maincategory");
			$data['fsub_category'] = $this->input->post("subcategory");
			$data['fchild_category'] = $this->input->post("childcategory");
			$data['fitem']	= $this->input->post("item");
			$data['fitem_image'] = $this->input->post("image");
			$data['fproduct_id'] = time();
			$data['fprice'] = $this->input->post("price");
			$data['fquantity'] = $this->input->post("quantity");
			$data['fpackaging_cost'] = $this->input->post("packaging_cost");
			$data['fdescription'] = $this->input->post("description");
			$data['fmerchant_id'] = $this->input->post("merchant_id");
			$data['fmerchant_city'] = $this->input->post("merchant_city");
			$data['fmerchant_area'] = $this->input->post("merchant_area");
			$data['fmerchant_email'] = $this->input->post("merchant_email");
			$data['fmerchant_phone'] = $this->input->post("merchant_phone");
			
			$data1 = $this->security->xss_clean($data);
			
			//var_dump($data1);
			 $inserted = $this->Product_model->InsertProduct($data1);

			  if($inserted > 0)
				{
					$this->session->set_flashdata('success', 'Product Created Successfully');
					redirect('index.php/MerchantArena/products');
				}
				else 
				{
					$this->session->set_flashdata('error', 'Product Not Created');
					redirect('index.php/MerchantArena/products');
				}
		}	
	 }

	 public function EditProductAction()
	 {	
		$this->form_validation->set_rules('domain', 'Domain', 'trim|required');
		$this->form_validation->set_rules('maincategory', 'Main Category', 'trim|required');
		$this->form_validation->set_rules('subcategory', 'Sub Category', 'trim|required');
		$this->form_validation->set_rules('childcategory', 'Child Category', 'trim|required');
		$this->form_validation->set_rules('item', 'Item', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('packaging_cost', 'Packaging Cost', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect('index.php/MerchantArena/products');
			}
		else
		{
		
			 //$data = $this->input->post();
			// var_dump($data);
			$id	= $this->input->post("id");
// 			$data['fitem']	= $this->input->post("item");
// 			$data['fprice'] = $this->input->post("price");
// 			$data['fpackaging_cost'] = $this->input->post("packaging_cost");
// 			$data['fdescription'] = $this->input->post("description");
            $data['fdomain']	= $this->input->post("domain");
			$data['fmain_category'] = $this->input->post("maincategory");
			$data['fsub_category'] = $this->input->post("subcategory");
			$data['fchild_category'] = $this->input->post("childcategory");
			$data['fitem']	= $this->input->post("item");
			$data['fitem_image'] = $this->input->post("image");
			$data['fproduct_id'] = time();
			$data['fprice'] = $this->input->post("price");
			$data['fquantity'] = $this->input->post("quantity");
			$data['fpackaging_cost'] = $this->input->post("packaging_cost");
			$data['fdescription'] = $this->input->post("description");
			$data['fmerchant_id'] = $this->input->post("merchant_id");
			$data['fmerchant_city'] = $this->input->post("merchant_city");
			$data['fmerchant_area'] = $this->input->post("merchant_area");
			$data['fmerchant_email'] = $this->input->post("merchant_email");
			$data['fmerchant_phone'] = $this->input->post("merchant_phone");
			$data1 = $this->security->xss_clean($data);
			
			//var_dump($data1);
			 $updated = $this->Product_model->UpdateProduct($data1, $id);

			  if($updated > 0)
			  {
				 $this->session->set_flashdata('success', 'Product Updated Successfully');
				 redirect('index.php/MerchantArena/products');
			  }
			  else 
			  {
				  $this->session->set_flashdata('error', 'Product Not Updated');
				  redirect('index.php/MerchantArena/products');
			  }
		}	
	 }

	 public function DeleteProduct($id)
	 {

		$deleted = $this->Product_model->DeleteProduct($id);
		if($deleted > 0)
		{
            $this->session->set_flashdata('success', 'Product Deleted Successfully');
		    redirect('index.php/MerchantArena/products');
		}
		else
		{
			$this->session->set_flashdata('error', 'Product Not Deleted');
		    redirect('index.php/MerchantArena/products');
		}
		
	}

	public function message()
	{	
		$merchant_id = "Excanny";
		$data['messages'] = $this->Imported_model->GetMerchantMessages($merchant_id);
		$data['content'] = 'dashboard/message';
		$this->load->view($this->layout, $data); 
	}

	public function messageAction()
	{	
	   
	   $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
	   $this->form_validation->set_rules('message', 'Message', 'trim|required');

	   if ($this->form_validation->run() === FALSE)
		   {
			   $this->session->set_flashdata('error', validation_errors());
			   redirect('index.php/MerchantArea/message');
		   }
	   else
	   {
	   
		//    $data = $this->input->post();
		//    var_dump($data);
		   $data['fsubject_id']	= time();
		   $data['fsubject_name']	= $this->input->post("subject");
		   $data['fauthor_id']	= $this->input->post("author_id");
		   $data['fauthor_name']	= $this->input->post("author_name");
		   $data['fmessage'] = $this->input->post("message");
		
		   $data1 = $this->security->xss_clean($data);
		   
		   //var_dump($data1);
			 $inserted = $this->Imported_model->InsertMessage($data1);

			 if($inserted > 0)
			   {
				   $this->session->set_flashdata('success', 'Message Sent Successfully');
				   redirect('index.php/MerchantArena');
			   }
			   else 
			   {
				   $this->session->set_flashdata('error', 'Message Not Sent');
				   redirect('index.php/MerchantArena');
			   }
	   }	
	}


	public function UpdatemessageAction()
	{	
	   
	   
	   $this->form_validation->set_rules('message', 'Message', 'trim|required');

	   if ($this->form_validation->run() === FALSE)
		   {
			   $this->session->set_flashdata('error', validation_errors());
			   redirect('index.php/MerchantArena/messageshow/'. $this->input->post("subject_id"));
		   }
	   else
	   {
	   
		//    $data = $this->input->post();
		//    var_dump($data);
		   $data['fsubject_id']	= $this->input->post("subject_id");
		   $data['fsubject_name']	= $this->input->post("subject_name");
		   $data['fauthor_id']	= $this->input->post("author_id");
		   $data['fauthor_name']	= $this->input->post("author_name");
		   $data['fmessage'] = $this->input->post("message");
		
		   $data1 = $this->security->xss_clean($data);
		   
		   //var_dump($data1);
			 $inserted = $this->Imported_model->InsertMessage($data1);

			 if($inserted > 0)
			   {
				   $this->session->set_flashdata('success', 'Message Sent Successfully');
				   redirect('index.php/MerchantArena/messages');
			   }
			   else 
			   {
				   $this->session->set_flashdata('error', 'Message Not Sent');
				   redirect('index.php/MerchantArena/messages');
			   }
	   }	
	}



	public function messages()
	{
		$merchant_id = "Excanny";
		$data['messages'] = $this->Imported_model->GetMerchantMessages($merchant_id);
		$data['content'] = 'dashboard/all_messages';
		$this->load->view($this->layout, $data); 
	}

	public function messageshow($id)
	{
		$data['messages'] = $this->Imported_model->FindMessage($id);
		//var_dump($data);
		$data['content'] = 'dashboard/single_message';
		$this->load->view($this->layout, $data);
	}

	public function GetAllMainCategories()
	{
		 $id = $this->input->post('id');
		//$id = 'Food';
	     $request = $this->Imported_model->GetAllMainCategories($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
	}

	public function GetAllSubCategories()
	{
		$id = $this->input->post('id');
		//$id = 'Motors';
	    $request = $this->Imported_model->GetAllSubCategories($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
	}

	public function GetAllChildCategories()
	{
		$id = $this->input->post('id');
		//$id = 'Motors';
	    $request = $this->Imported_model->GetAllChildCategories($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
	}

	public function GetCatItems()
	{
		$id = $this->input->post('id');
		// $data['x'] = 'London';
	    $request = $this->Imported_model->GetCatItems($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
		 //echo json_encode($data);
	}

	public function GetItemImage()
	{
		$id = $this->input->post('id');
		// $data['x'] = 'London';
	    $request = $this->Imported_model->GetItemImage($id);
		//echo $request->farea_name;
		//return $request; 
	    echo $request->fitem_image;
	}

	public function CheckName()
	{
		$id = $this->input->post('id');
		//$id = 'Almeria';
	    $request = $this->User_model->CheckName($id);
		//echo $request->farea_name;
		//return $request; 
	     var_dump($request);
	}
	
	
}
