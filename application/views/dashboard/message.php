  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Messages</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Contact Admin</li>
              <li class="breadcrumb-item active" aria-current="page">Message</li>
            </ol>
          </div>

        <div class="row">
            <div class="col-lg-3">
            <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                  <h6 class="m-0 font-weight-bold text-white">Recent Messages</h6>
                </div>
                <div class="card-body">
                   <div class="list-group">
                       <?php foreach($messages as $message){ ?>
                          <a href="<?php echo site_url('index.php/MerchantArena/messageshow/' . $message->fsubject_id); ?>" class="list-group-item list-group-item-action"> <?php echo $message->fsubject_name; ?></a>
                       <?php } ?>
                   </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
                <!-- Horizontal Form -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                  <h6 class="m-0 font-weight-bold text-white">Message Form</h6>
                </div>
                <div class="card-body">
                  <form action="<?php echo site_url();?>index.php/MerchantArena/messageAction" method="post">
                    <div class="form-group row">
                     
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="">Subject</label>
                      <input type="hidden" name="author_id" value="<?php echo $this->session->fshop_name;?>">
                      <input type="hidden" name="author_name" value="<?php echo $this->session->fshop_name;?>">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="">Message</label>
                      <div class="col-sm-12">
                        <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Message" required></textarea>
                      </div>
                    </div>
             
                    <div class="form-group row">
                      <div class="col-sm-10 text-right">
                        <button type="submit" class="btn btn-success">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>

              
            </div>

          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->