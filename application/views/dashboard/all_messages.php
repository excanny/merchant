        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Messages</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Messages</li>
              <li class="breadcrumb-item active" aria-current="page">Messages</li>
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

          <!-- Row -->
          <div class="row">
            <!-- Messages -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-success">Messages</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush datatable text-center">
                    <thead class="thead-light">
                      <tr>
                      <th>#</th>
                        <th>Subject</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1; foreach($messages as $message){ ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $message->fsubject_name; ?></td>
                        <td><a href="<?php echo site_url('index.php/MerchantArena/messageshow/'. $message->fsubject_id);?>"><i class="fas fa-eye"></i></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
       
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->


           