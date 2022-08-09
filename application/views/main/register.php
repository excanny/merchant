<html>
<head>
<title>awoofMart Merchant Register</title>
<link rel="stylesheet" href="<?php echo base_url();?>ast/css/bootstrap/bootstrap.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>


.signup-error{color:#FF0000; padding-left:15px;}

html {
    height: 100%
}


.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: green;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #7AAC41;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 17px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #7AAC41
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #business:before {
    font-family: FontAwesome;
    content: "\f0d6"
}

#progressbar #bank:before {
    font-family: FontAwesome;
    content: "\f19c"
}

#progressbar #general:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #7AAC41
}


.fit-image {
    width: 100%;
    object-fit: cover
}





</style>

</head>
<body class="">
	<div class="row pl-5 pt-3 pb-0">
		<div class="col-sm-6 ">
			<h5 class=""><a href="<?php echo site_url();?>" style="color:#800020">awoofMart</a></h5>
		</div>
		<div class="col-sm-6">
			<a href="<?php echo site_url();?>index.php/w/login" style="color:#7AAC41" class="float-right mr-5">Login</a>
		</div>
    </div>
<div >
    <div class="row justify-content-center ">
        <div class="col-sm-10 col-md-8 col-lg-8 p-0 mt-3 mb-2">
            <div class="card px-0 pt-1 pb-0 mt-1 mb-2">

					<ul id="progressbar" class="text-center">
						<li id="personal" class="active">Account</li>
						<li id="business">Business</li>
						<li id="bank">Bank</li>
						<li id="general">Final</li>
					</ul>
					<h3 id="" class="text-center" style="color:#7AAC41">Sign Up For Your Merchant Profile</h3>
                	<p class="text-center">Fill all form fields to go to next step</p>
					
				

						<form name="frmRegistration" action="<?php echo site_url(); ?>index.php/w/MerchantSignUpAction" id="signup-form" method="post">
						   <div id="personal-field">
							
							<div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div>
                            </div>
							<div class="row">
								<div class="col-sm-12">
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
								</div>
							</div>
								<div class="row">
									<div class="col-sm-4">
										<label>FIRST NAME:</label><small><span id="firstname-error" class="signup-error"></span></small>
										<div><input type="text" name="firstname" id="firstname" class="form-control form-control-sm" value="<?php echo set_value('firstname'); ?>"/></div>
									</div>
									<div class="col-sm-4">
										<label>LAST NAME:</label><small><span id="lastname-error" class="signup-error"></span></small>
										<div><input type="text" name="lastname" id="lastname" class="form-control form-control-sm" value="<?php echo set_value('lastname'); ?>" /></div>
									</div>
									<div class="col-sm-4">
										<label>PHONE:</label><small><span id="phone-error" class="signup-error"></span></small>
										<div><input type="number" name="phone" id="phone" class="form-control form-control-sm" value="<?php echo set_value('phone'); ?>"/></div>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-12 pb-0">
									<label>DATE OF BIRTH:</label>
									</div>
									<div class="col-sm-4">
										<small><span id="ddob-error" class="signup-error"></span></small>
										<select id="dobday" name="dobday" class="form-control form-control-sm" value="<?php echo set_value('dobday'); ?>"></select>
										</div>
									
									<div class="col-sm-4">
										<small><span id="mdob-error" class="signup-error"></span></small>
										<div>
										<select id="dobmonth" name="dobmonth" class="form-control form-control-sm" value="<?php echo set_value('dobmonth'); ?>"></select>
										</div>
									</div>
									<div class="col-sm-4">
										<small><span id="ydob-error" class="signup-error"></span></small>
										<div>
										<select id="dobyear" name="dobyear" class="form-control form-control-sm" value="<?php echo set_value('dobyear'); ?>"></select>
										</div>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-12">
										<label>EMAIL:</label><small><span id="email-error" class="signup-error"></span></small>
										<div><input type="text" name="email" id="email" class="form-control form-control-sm" value="<?php echo set_value('email'); ?>" /></div>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6">
										<label>PASSWORD:</label><small><span id="password-error" class="signup-error"></span></small>
										<div><input type="password" name="pwwd" id="user-password" class="form-control form-control-sm" value="<?php echo set_value('pwwd'); ?>"/></div>
									</div>
									<div class="col-sm-6">
										<label>CONFIRM PASSWORD:</label><small><span id="confirm-password-error" class="signup-error"></span></small>
										<div><input type="password" name="pwwd2" id="confirm-password" class="form-control form-control-sm" value="<?php echo set_value('pwwd2'); ?>" /></div>
									</div>
								</div>
								
							</div>
							<div id="business-field" style="display:none;">
								<div class="row">
									<div class="col-7">
										<h2 class="fs-title">Business Information:</h2>
									</div>
									<div class="col-5">
										<h2 class="steps">Step 2 - 4</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label>SHOP NAME:</label><small><span id="shopname-error" class="signup-error"></span></small>
										<div><input type="text" name="shopname" id="shopname" class="form-control form-control-sm" value="<?php echo set_value('shopname'); ?>" /></div>
									</div>
									<div class="col-sm-6">
										<label>SHOP ID:</label><small><span id="shopid-password-error" class="signup-error"></span></small>
										<div><input type="text" name="shopid" id="shopid" class="form-control form-control-sm" value="<?php echo set_value('shopid'); ?>" readonly/></div>
									</div>
								</div>

								<div class="row pt-3">
									<div class="col">
										<label >CITY</label><span id="cityname-error" class="signup-error"></span></small>
										<select class="form-control form-control-sm" name="cityname" id="cityname" value="<?php echo set_value('cityname'); ?>" required>
											<option value="" > <span>Select one</span> </option>
											<?php foreach($cities as $city){ ?>
												<option value="<?php echo $city->fcity_name; ?>"><?php echo $city->fcity_name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col">
										<label >AREA</label><small><span id="areaname-error" class="signup-error"></span></small>
										<select class="form-control form-control-sm" name="areaname" id="areaname" value="<?php echo set_value('areaname'); ?>" required>
											<option value=""></option>
										</select>
									</div>
									<div class="col">
										<label >LANDMARK</label><small><span id="landmark-error" class="signup-error"></span></small>
										<select class="form-control form-control-sm" name="landmark" id="landmark" value="<?php echo set_value('larkmark'); ?>" required>
											<option value=""></option>
										</select>
									</div>
								</div>

								<div class="row pt-3">
									<div class="col-sm-12">
										<label>SHOP ADDRESS:</label><small><span id="shopaddress-error" class="signup-error"></span></small>
										<div><input type="text" name="shopaddress" id="shopaddress" class="form-control form-control-sm" value="<?php echo set_value('shopaddress'); ?>" /></div>
									</div>
								</div>


							</div>

							<div id="bank-field" style="display:none;">
								<div class="row">
									<div class="col-7">
										<h2 class="fs-title">Bank Details:</h2>
									</div>
									<div class="col-5">
										<h2 class="steps">Step 3 - 4</h2>
									</div>
								</div>
								<div class="row">
								
									<div class="col-sm-4">
										<label >BANK NAME:</label><span id="bankname-error" class="signup-error"></span></small>
										<select class="form-control form-control-sm" name="bankname" id="bankname" value="<?php echo set_value('bankname'); ?>" required>
											<option value="" > <span>Select one</span> </option>
											<?php 
												$banks = array(array('id' => '1','name' => 'Access Bank','code'=>'044'), array('id' => '2','name' => 'Citibank','code'=>'023'), array('id' => '3','name' => 'Diamond Bank','code'=>'063'), array('id' => '4','name' => 'Dynamic Standard Bank','code'=>''), array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050'), array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070'), array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011'), array('id' => '8','name' => 'First City Monument Bank','code'=>'214'), array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058'), array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030'), array('id' => '11','name' => 'Jaiz Bank','code'=>'301'), array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082'), array('id' => '13','name' => 'Providus Bank Plc','code'=>'101'), array('id' => '14','name' => 'Polaris Bank','code'=>'076'), array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221'), array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068'), array('id' => '17','name' => 'Sterling Bank','code'=>'232'), array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100'), array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032'), array('id' => '20','name' => 'United Bank for Africa','code'=>'033'), array('id' => '21','name' => 'Unity Bank Plc','code'=>'215'), array('id' => '22','name' => 'Wema Bank','code'=>'035'), array('id' => '23','name' => 'Zenith Bank','code'=>'057'));
												foreach($banks as $bank){ ?>
												<option value="<?php echo $bank['name']; ?>"><?php echo $bank['name']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-sm-4">
										<label>ACCOUNT NUMBER:</label><small><span id="accountno-error" class="signup-error"></span></small>
										<div><input type="number" name="accountno" id="accountno" class="form-control form-control-sm" value="<?php echo set_value('accountno'); ?>" /></div>
									</div>
									<div class="col-sm-4">
										<label>ACCOUNT NAME:</label><small><span id="accountname-error" class="signup-error"></span></small>
										<div><input type="text" name="accountname" id="accountname" class="form-control form-control-sm" value="<?php echo set_value('accountname'); ?>"/></div>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-12">
									<label>AGREEMENT:</label><small><span id="agreement-error" class="signup-error"></span></small><br>
										<input type="checkbox" name="agreement" id="agreement"> I have read and accepted the agreement. 
									</div>
							</div>
							</div>
							<div id="general-field" style="display:none;">
								<div class="row">
									<div class="col-7">
										<h2 class="fs-title">Final Step:</h2>
									</div>
									<div class="col-5">
										<h2 class="steps">Step 4 - 4</h2>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-12 text-center">
										<h4>Submit to complete your registration</h4>
									</div>
							</div>	
							</div>
							<br>
							<div>
								<input class="btnAction btn btn-success text-white" type="button" name="back" id="back" value="Back" style="display:none;">
								<input class="btnAction  btn btn-success text-white" type="button" name="next" id="next" value="Next" >
								<input class="btnAction btn btn-success text-white" type="submit" name="finish" id="finish" value="Submit" style="display:none;">
							</div>
						</form>

					</div>
			<div>
	<div>



<script src="<?php echo base_url();?>ast/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>ast/js/dobpicker.js"></script>
<script src="<?php echo base_url();?>ast/js/bootstrap.min.js"></script>
<script>

function validate() {
var output = true;
$(".signup-error").html('');
if($("#personal-field").css('display') != 'none') {
	if(!($("#firstname").val())) {
		output = false;
		$("#firstname-error").html("First Name required!");
	}
	if(!($("#lastname").val())) {
		output = false;
		$("#lastname-error").html("Last Name required!");
	}
	if(!($("#email").val())) {
		output = false;
		$("#email-error").html("Email required!");
	}	
	if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#email-error").html("Invalid Email!");
		output = false;
	}
	if(!($("#phone").val())) {
		output = false;
		$("#phone-error").html("Phone required!");
	}
	if(!($("#dobday").val())) {
		output = false;
		$("#ddob-error").html("Day required!");
	}
	if(!($("#dobmonth").val())) {
		output = false;
		$("#mdob-error").html("Month required!");
	}

	if(!($("#dobyear").val())) {
		output = false;
		$("#ydob-error").html("Year required!");
	}

	if(!($("#user-password").val())) {
		output = false;
		$("#password-error").html("Password required!");
	}	
	if(!($("#confirm-password").val())) {
		output = false;
		$("#confirm-password-error").html("Confirm password required!");
	}	
	if($("#user-password").val() != $("#confirm-password").val()) {
		output = false;
		$("#confirm-password-error").html("Password not matched!");
	}	
	
}

if($("#business-field").css('display') != 'none') {

	if(!($("#shopname").val())) {
		output = false;
		$("#shopname-error").html("Shop Name required!");
	}	
	if(!($("#cityname").val())) {
		output = false;
		$("#cityname-error").html("City required!");
	}
	if(!($("#areaname").val())) {
		output = false;
		$("#areaname-error").html("Area required!");
	}
	if(!($("#landmark").val())) {
		output = false;
		$("#landmark-error").html("Landmark required!");
	}
	if(!($("#shopaddress").val())) {
		output = false;
		$("#shopaddress-error").html("Shop Address required!");
	}
		
}

if($("#bank-field").css('display') != 'none'){
	if(!($("#bankname").val())) {
		output = false;
		$("#bankname-error").html("Bank Name required!");
	}
	if(!($("#accountno").val())) {
		output = false;
		$("#accountno-error").html("Account Number required!");
	}
	if(!($("#accountname").val())) {
		output = false;
		$("#accountname-error").html("Account Name required!");
    }
    if(!($("input[type='checkbox']").is(":checked"))) {
		output = false;
		$("#agreement-error").html("Agreement is required!");
	}	
}



return output;
}


$(document).ready(function() {

	$("#next").click(function(){
		var output = validate();
		if(output) {
			var current = $(".active");
			var next = $(".active").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".active").removeClass("active");
				next.addClass("active");
				if($(".active").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();				
				}
			}
		}
	});

	$("#back").click(function(){ 
		var current = $(".active");
		var prev = $(".active").prev("li");
		if(prev.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".active").removeClass("active");
			prev.addClass("active");
			if($(".active").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();			
			}
		}
	});

});




	$.dobPicker({
		daySelector: '#dobday', /* Required */
		monthSelector: '#dobmonth', /* Required */
		yearSelector: '#dobyear', /* Required */
		dayDefault: 'Day', /* Optional */
		monthDefault: 'Month', /* Optional */
		yearDefault: 'Year', /* Optional */
		minimumAge: 18, /* Optional */
		maximumAge: 80 /* Optional */
	});


     //Get Shop Slug ID
     $("#shopname").bind('input', function () {
       var stt = $(this).val();
       str = stt.replace(/\s+/g, '-');
       $("#shopid").val(str.toLowerCase());
    });


     //Dynamic Area Select
		$('#cityname').change(function(){
			var cityname = $('#cityname').val();
			//alert(cityname);
			 if(cityname != '')
			 {
				 //alert("Hi");
				$.ajax({
					url:"<?php echo site_url(); ?>index.php/w/GetAllAreas",
					method:"POST",
					data:{id:cityname},
					success:function(data)
					{
						//alert(data);
					   $('#areaname').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execut
					//alert(xhr.responseText);
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
					url:"<?php echo site_url(); ?>index.php/w/GetAllLandmarks",
					method:"POST",
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



</script>


</body>
</html>