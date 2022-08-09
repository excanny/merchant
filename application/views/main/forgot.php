<!DOCTYPE html>
<html lang="en">
<head>
  <title>awoofMart Merchant Password Forgot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body class="" style="background:#7AAC41">

<header class="pt-4 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h1 ><a href="<?php echo site_url();?>" class="text-white">awoofMart</a></h1>
                </div>
            </div>
        </div>   
    </header>  
    
    <div class="container " style="margin: 10rem 0 0 25rem;">
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
                            <form action="<?php echo site_url();?>index.php/w/ForgetPasswordAction" method="post">
                                <div class="form-group">
                                    <label for="email">Enter Email address:</label>
                                    <input type="email" class="form-control form-control-sm" placeholder="Enter your email" name="email" id="email" required>
                                </div>
                                <small><a href="<?php echo site_url();?>index.php/w/login" class="float-left">Login</a></small>
                                <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                                
                            </form>
                        </div>
            
                </div>  
            </div>
        </div>
    </div>

</body>
</html>