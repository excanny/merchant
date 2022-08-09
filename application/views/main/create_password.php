<!DOCTYPE html>
<html lang="en">
<head>
  <title>awoofMart Merchant Reset Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body class="bg-success">

<header class="bg-success pt-4 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h1 ><a href="<?php echo site_url();?>w" class="text-white">awoofMart</a></h1>
                </div>
            </div>
        </div>   
    </header>  
    
    <div class="container" style="margin: 7rem 0 0 25rem;">
        <div class="row">
            <div class="col-sm-12 text-left text-white">
            <h1>Reset Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card w-50">
                  
                <div class="pt-3 px-3">
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

                        <div class="card-body">
                            <form action="<?php echo site_url();?>w/CreatePasswordAction" method="post">
                                <div class="form-group">
                                <?php echo $this->session->userdata("create-password"); ?>
                                    <label for="email">Password:</label>
                                    <input type="password" class="form-control" placeholder="Enter password" name="pssd" id="pass_word" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Confirm Password:</label>
                                    <input type="password" class="form-control" placeholder="Confirm password" name="pssd2" id="confirm_pass_word" required>
                                </div>
                                <p class="no_match text-danger" style="display:none">* Sorry, passwords don't match!</p>
                                <button type="submit" class="btn btn-success float-right" id="submit">Reset</button>
                                
                            </form>
                        </div>
            
                </div>  
            </div>
        </div>
    </div>


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

        });
    </script>

</body>
</html>