<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>AwoofMart Merchant Dashboard</title>
  <link href="<?php echo base_url(); ?>assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets2/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets2/css/mycss.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      
      
       <a class="" href="<?php echo site_url();?>index.php/MerchantArena">
          <img src="<?php echo base_url(); ?>assets2/img/logo/awoofmart_logo.jpeg" style="width:100%;height:80%;">
          </a>
      
        <!-- <div class="sidebar-brand-text mx-3">awoofMart</div> -->
     
     
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="txtcolour2">Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-fw fa-list-ul"></i>
          <span class="txtcolour2">ORDERS</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Orders</h6>
            <a class="collapse-item" href="<?php echo site_url();?>index.php/MerchantArena/orders">All Orders</a>
          </div>
        </div>
      </li>
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"-->
      <!--    aria-expanded="true" aria-controls="collapseBootstrap">-->
      <!--    <i class="far fa-fw fa-money-bill-alt"></i>-->
      <!--    <span class="txtcolour2">SALES</span>-->
      <!--  </a>-->
      <!--  <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Manage Sales</h6>-->
      <!--      <a class="collapse-item" href="<?php//echo site_url();?>index.php/MerchantArena/sales">All Sales</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-object-group"></i>
          <span class="txtcolour2">PRODUCTS</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Products</h6>
            <a class="collapse-item" href="<?php echo site_url();?>index.php/MerchantArena/products">All Products</a>
          </div>
        </div>
      </li>
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"-->
      <!--    aria-controls="collapseTable">-->
      <!--    <i class="fas fa-fw fa-users"></i>-->
      <!--    <span class="txtcolour2">MANAGE STAFF</span>-->
      <!--  </a>-->
      <!--  <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Staff</h6>-->
      <!--      <a class="collapse-item" href="<?php //echo site_url();?>index.php/MerchantArena/products">Add New User</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-users"></i>
          <span class="txtcolour2">CONTACT ADMIN</span>
        </a>
        <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Messages</h6>
            <a class="collapse-item" href="<?php echo site_url();?>index.php/MerchantArena/message">New Message</a>
            <a class="collapse-item" href="<?php echo site_url();?>index.php/MerchantArena/messages">All Messages</a>
          </div>
        </div>
      </li>
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top bgcolour1">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <span class="text-white">Welcome, <?php echo $this->session->shop_id; ?></span>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
              </a>
             
            </li>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="fa fa-user-circle text-white"></span>
                <span class="fa fa-caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url();?>index.php/w/logout">
                  <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

           <!-- DYNAMIC CONTENT -->

            <?php $this->load->view($content); ?> 

            <!-- END OF DYNAMIC CONTENT -->

      </div>
      
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url(); ?>assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/js/demo/chart-area-demo.js"></script> 
  <!-- Datatable JS -->
  <script src="<?php echo base_url(); ?>assets2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/datatables/dataTables.bootstrap4.min.js"></script> 

  <script>

    $(document).ready(function () {
      $('.datatable').DataTable(); // ID From dataTable 
    });


    //Dynamic Sub Category Select
		$('#domain').change(function(){
			var market_domain = $('#domain').val();
			//alert(market_domain);
			 if(market_domain != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/MerchantArena/GetAllMainCategories",
					method:"POST",
					data:{id:market_domain},
					success:function(data)
					{
						//alert(data);
					   $('#maincategory').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execute
						alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#state').html('<option value="">Select State</option>');
			// 	$('#city').html('<option value="">Select City</option>');
			// }
		});


		//Dynamic Sub Category Select
		$('#maincategory').change(function(){
			var maincategory = $('#maincategory').val();
			//alert(maincategory);
			 if(maincategory != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/MerchantArena/GetAllSubCategories",
					method:"POST",
					data:{id:maincategory},
					success:function(data)
					{
						//alert(data);
					   $('#subcategory').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execute
						alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#state').html('<option value="">Select State</option>');
			// 	$('#city').html('<option value="">Select City</option>');
			// }
		});


		//Dynamic Sub Category Select
		$('#subcategory').change(function(){
			var subcategory = $('#subcategory').val();
			//alert(maincategory);
			 if(maincategory != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/MerchantArena/GetAllSubCategories",
					method:"POST",
					data:{id:subcategory},
					success:function(data)
					{
						//alert(data);
					   $('#childcategory').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execute
						alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#state').html('<option value="">Select State</option>');
			// 	$('#city').html('<option value="">Select City</option>');
			// }
		});

 //Dynamic Item Select
 $('#childcategory').change(function(){
			var childcategory = $('#childcategory').val();
			//alert(maincategory);
			 if(childcategory != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/MerchantArena/GetCatItems",
					method:"POST",
					data:{id:childcategory},
					//dataType: 'JSON',
					success:function(data)
					{
				
						//alert(data);
					   $('#item').html(data);
					   // for (var index in data) {
						  // // Show value in alert dialog:
						  // alert( data[index] );
						// }
					
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execut
					   alert(xhr.responseText);
                       //alert(errorThrown);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#areaname').html('<option value="">Select Area</option>');
			// }

		});


     //Dynamic Item Select
 $('#item').change(function(){
			var item = $('#item').val();
			//alert(item);
			 if(item != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/MerchantArena/GetItemImage",
					method:"POST",
					data:{id:item},
					//dataType: 'JSON',
					success:function(data)
					{
				
						//alert(data);
					   $('#image').val(data);
					   // for (var index in data) {
						  // // Show value in alert dialog:
						  // alert( data[index] );
						// }
					
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execut
					   //alert(xhr.responseText);
                       //alert(errorThrown);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#areaname').html('<option value="">Select Area</option>');
			// }

		});


        // Product Edit Modal
		$('.product_id').click(function(){
            //get id
			var recno = $(this).data('recno');
			var domain = $(this).data('domain');
            var item = $(this).data('item');
			var price = $(this).data('price');
			var packaging_cost = $(this).data('packaging_cost');
			var quantity = $(this).data('quantity');
			var description = $(this).data('description');
			
		    // //alert(recno);
			$('#recno').val(recno);
			$('#domain').val(domain);
		    $('#item').val(item);
			$('#price').val(price);
			$('#packaging_cost').val(packaging_cost);
			$('#quantity').val(quantity);
			$('#description').val(description);
            $("#EditProduct").modal('show');
        });
</script>

</body>

</html>