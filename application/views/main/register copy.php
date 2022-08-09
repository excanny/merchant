<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>awoofMart Merchant Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>ast/css/main.css" rel="stylesheet" media="all">
</head>

<body>

    <header class="bg-success pt-1 mb-0">
       
            <div class="row pl-2">
                <div class="col-sm-12 ">
                    <h1 ><a href="<?php echo site_url();?>" class="text-white">awoofMart</a></h1>
                </div>
            </div>
          
    </header>  
     
    <div class="page-wrapper bg-success pt-4 pb-4">
        <div class="wrapper wrapper--w900">
            <div class="card card-6 border-0">
           
                <div class="card-heading">
                    <h2 class="title">Register As A Seller</h2>
                </div>
                <div class="card-body">
                <div class="p-2">
                    <?php if ($this->session->userdata('success') <> '') { ?>
                        <div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><p><i class="ti ti-check"></i>&nbsp; <?php echo $this->session->userdata("success"); ?> </p></strong>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->userdata('error') <> '') { ?>

                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Sorry!</strong> <?php echo $this->session->userdata("error"); ?>
                        </div>
                    <?php } ?>
                    </div>
                    <form action="<?php echo site_url(); ?>w/MerchantSignUpAction" method="POST">
                        <div class="row px-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >SHOP NAME</label>
                                    <input class="form-control form-control-sm" type="text" name="shop_name" id="shop_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >SHOP ID</label>
                                    <input class="form-control form-control-sm" type="text" name="shop_id" id="shop_id" readonly required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3 pt-1">
                            <div class="col-sm-4">
                                <div class="form-group">
                                  <label >CITY</label>
                                   <select class="form-control form-control-sm" name="cityname" id="cityname"  required>
                                        <option value="" > <span>Select one</span> </option>
                                        <?php foreach($cities as $city){ ?>
                                            <option value="<?php echo $city->fcity_name; ?>"><?php echo $city->fcity_name; ?></option>
                                        <?php } ?>
                                   </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label >AREA</label>
                                   <select class="form-control form-control-sm" name="areaname" id="areaname" required>
                                        <option value=""></option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label >LANDMARK</label>
                                   <select class="form-control form-control-sm" name="landmark" id="landmark" required>
                                        <option value=""></option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3 pt-1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >SHOP ADDRESS</label>
                                    <input class="form-control form-control-sm" type="text" name="shop_address" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                       
                        <div class="row px-3 pt-1">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >EMAIL ADDRESS</label>
                                    <input class="form-control form-control-sm" type="email" name="email"  required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >PHONE</label>
                                    <input class="form-control form-control-sm" type="number" name="phone"  required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >PASSWORD</label>
                                    <input class="form-control form-control-sm" type="password" name="pass_word" id="pass_word" required>
                                </div>
                                <p class="no_match text-danger" style="display:none">* Sorry, passwords don't match!</p>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >CONFIRM PASSWORD</label>
                                    <input class="form-control form-control-sm" type="password" name="confirm_pass_word" id="confirm_pass_word" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                </div>
                <div class="card-footer text-right p-3">
                <a href="<?php echo site_url();?>w/login" class="float-left">Login</a>
                    <button class="btn btn-success btn-sm" type="submit" id="submit">Register</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>ast/js/jquery-3.3.1.min.js"></script>


    <!-- Main JS-->
    <script src="<?php echo base_url();?>ast/js/global.js"></script>


    <script>

$(document).ready(function(){

$('#confirm_pass_word').keyup(function(){
            if ($("#pass_word").val() != $("#confirm_pass_word").val()) {
                $(".no_match").fadeIn('slow');
            // alert('the passwords didn\'t match!');
            $("#pass_word").css("border", "1px solid #A94442");
            $("#confirm_pass_word").css("border", "1px solid #A94442");
            $("#submit").prop("disabled",true);

        }
        else 
        {
            $(".no_match").fadeOut('slow');
            $("#pass_word").css("border", "1px solid #3C763D");
            $("#confirm_pass_word").css("border", "1px solid #3C763D");
            $("#submit").prop("disabled",false);
        }
    });

    //Get Shop Slug ID
    $("#shop_name").bind('input', function () {
       var stt = $(this).val();
       str = stt.replace(/\s+/g, '-');
       $("#shop_id").val(str.toLowerCase());
    });
    
    //Password Strength


       //Dynamic Area Select
		$('#cityname').change(function(){
			var cityname = $('#cityname').val();
			//alert(cityname);
			 if(cityname != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>w/GetAllAreas",
					method:"GET",
					data:{id:cityname},
					success:function(data)
					{
						//alert(data);
					   $('#areaname').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execut
					alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	$('#areaname').html('<option value="">Select Area</option>');
			// }

		});

        //Dynamic Landmark Select
		  $('#areaname').change(function(){
			  var areaname = $('#areaname').val();
			  //alert(areaname);
			
			 if(areaname != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>w/GetAllLandmarks",
					method:"GET",
					data:{id:areaname},
					success:function(data)
					{
						//alert(data);
					   $('#landmark').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					   //code to execute
					    //alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			// else
			// {
			// 	// $('#state').html('<option value="">Select State</option>');
			// 	// $('#city').html('<option value="">Select City</option>');
			// }
		});

         //Check empty form
        //  $('#shop_name, #shop_description, #cityname, #areaname, #landmark, #email, #pwd, #cpwd').bind('keyup', function() {
        //     if(allFilled()) $('#next1').removeAttr('disabled');
        // });

        // function allFilled() {
        //     var filled = true;
        //     $('body input').each(function() {
        //         if($(this).val() == '') filled = false;
        //     });
        //     return filled;
        // }

        // $(function(){
        //     $('.disableButton').on('keyup change', function(){
        //         if ($('#shop_name').val() == "" || $('#shop_description').val() == '' || $('#cityname').val() == '' || $('#areaname').val() == '' || $('#landmark').val() == '' || $('#email').val() == '' || $('#pwd').val() == '' || $('#cpwd').val() == '') {
        //                 $('#next1').prop('disabled', true);
        //                 //alert("yeahyeah");
        //         } else {
        //                 //$('#next1').prop('disabled', false);
        //                 alert("hi");
        //         }
        //     });
        // });

});

</script>



</body>

</html>
<!-- end document-->