<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title>awoofMart Merchant Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>ast/css/main.css" rel="stylesheet" media="all">
</head>

<body>

    <header class=" pt-4 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h2 ><a href="<?php echo site_url();?>" class="" style="color: #7AAC41">awoofMart</a></h2>
                </div>
            </div>
        </div>   
    </header>   
    <div class="page-wrapper" >
        <div class="wrapper wrapper w-25" style="padding: 4rem 0 0 0;">
            <div class="card card-6 border-0 ">
           
                <div class="card-heading">
                    <h2 class="title ">Merchant Login</h2>
                </div>
                <div style="background: #7AAC41">
                <div class="card-body" style="background: #7AAC41">
                <div class="px-2 text-center">
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
                    <form action="<?php echo site_url();?>index.php/w/LoginAction" method="POST">
                      <hr>
                        <div class="row px-3 pt-1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">EMAIL ADDRESS</label>
                                    <input class="form-control form-control-sm" type="email" name="email"  required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row px-3 pt-1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="text-white">PASSWORD</label>
                                    <input class="form-control form-control-sm" type="password" name="pwd" id="pass_word" required>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        
                </div>
                <div class="card-footer p-3 text-white" style="background: #7AAC41">
                    <div class="row">
                        <div class="col-sm-7 ">
                            <small><a href="<?php echo site_url();?>index.php/w/register" class="text-white">Register</a></small> |
                            <small><a href="<?php echo site_url();?>index.php/w/forgotpassword" class="text-white">Forgot Password?</a></small>
                        </div>
                        <div class="col-sm-5 pr-2">
                            <button class="btn btn-secondary btn-sm" type="submit">Login</button>
                        </div>
                    </div>
                </div>

                </div>
               
            </form>

            
            </div>

            
        </div>
        <br>
            <?php if ($this->session->userdata('show_resend_email') <> '') { ?>
                <div class="alert alert-dismissable alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="text-center">
                            <form action="<?php echo site_url();?>index.php/w/ResendVerificationLink" method="post">
                                <input type="hidden" name="email" value="<?php echo $this->session->userdata('show_resend_email');?>">
                                <button type="submit" class="btn btn-warning">Resend Verification link</button>
                            </form>
                    </div>
                </div>
            <?php } ?>
    </div>

    

    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>ast/js/jquery-3.3.1.min.js"></script>


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Main JS-->
    <script src="<?php echo base_url();?>ast/js/global.js"></script>


</body>

</html>
<!-- end document-->