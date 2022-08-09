        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Message</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Message</a></li>
              <li class="breadcrumb-item">Sales</li>
              <li class="breadcrumb-item active" aria-current="page">View Message</li>
            </ol>
          </div>

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

         <div class="row">
         <div class="col-lg-12">
                <!-- Horizontal Form -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-warning">
                <a class="collapse card-link" data-toggle="collapse" href="#collapseOne">
                   Collapsible Group Item #1
                   </a>
                  <h6 class="m-0 font-weight-bold text-white">Reply</h6>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                  <form action="<?php echo site_url();?>index.php/MerchantArena/UpdatemessageAction" method="post">
                    <div class="form-group row">
                     
                      <div class="col-sm-12">
                      <input type="hidden" name="author_id" value="<?php echo $messages[1]->fauthor_id; ?>">
                      <input type="hidden" name="author_name" value="<?php echo $messages[1]->fauthor_name; ?>">
                      <input type="hidden" name="subject_id" value="<?php echo $messages[1]->fsubject_id; ?>">
                      <input type="hidden" name="subject_name" value="<?php echo $messages[1]->fsubject_name; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="">Message</label>
                      <div class="col-sm-12">
                        <textarea class="form-control" name="message" id="" cols="30" rows="10" required></textarea>
                      </div>
                    </div>
             
                    <div class="form-group row">
                      <div class="col-sm-10 text-right">
                        <button type="submit" class="btn btn-warning">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
        </div>

          <!-- Row -->
          <div class="row">
            <!-- Sales -->
            <div class="col-lg-12">
              
                    <?php foreach($messages as $message){ ?>
                      
                        
                        <div class="card">
                           <div class="card-header bg-success text-white"><?php echo $message->fauthor_name; ?></div>
                                <div class="card-body">
                                  <?php echo $message->fmessage; ?>
                                </div>
                               <div class="card-footer"><?php echo $message->created_at; ?></div>
                            </div>
                            <br>
                    <?php } ?>
                   
                
              </div>
            </div>
       
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->


           