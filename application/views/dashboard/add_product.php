<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>/MerchantArena">Home</a></li>
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-success">Add Product</h6>
                  <a href="<?php echo site_url();?>index.php/MerchantArena/products" class="text-success">All Products</a>
                </div>
                
                <div class="card-body">
                  <form action="<?php echo site_url();?>index.php/MerchantArena/AddProductAction" method="post">
                       <input type="hidden" name="merchant_id" value="<?php echo $this->session->shop_id; ?>">
                       <input type="hidden" name="merchant_city" value="<?php echo $this->session->merchant_city; ?>">
                       <input type="hidden" name="merchant_area" value="<?php echo $this->session->merchant_area; ?>">
                       <input type="hidden" name="merchant_email" value="<?php echo $this->session->merchant_email; ?>">
                       <input type="hidden" name="merchant_phone" value="<?php echo $this->session->merchant_phone; ?>">
                       <input type="hidden" name="image" id="image">
                      <!--<div class="row">-->
                      <!--     <div class="col-sm-12 text-center">-->
                      <!--          <label for="email_address">Select Domain</label>-->
                      <!--          <div class="form-group">-->
                      <!--              <select class="form-control" name="domain" id="domain">-->
                      <!--                  <option value="">Select one</option>-->
                      <!--                  <?php foreach($domains as $domain){ ?>-->
                      <!--                          <option value="<?php echo $domain->fdomain; ?>"><?php echo $domain->fdomain; ?></option>-->
                      <!--                  <?php } ?>-->
                      <!--              </select>-->
                      <!--          </div>-->
                      <!--      </div>-->
                      <!--</div>-->
                      <div class="row">
                          
                          <div class="col text-center">
                                <label for="email_address">Select Domain</label>
                                <div class="form-group">
                                    <select class="form-control" name="domain" id="domain" required>
                                        <option value="">Select one</option>
                                        <?php foreach($domains as $domain){ ?>
                                                <option value="<?php echo $domain->fdomain; ?>"><?php echo $domain->fdomain; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col">
                                <label for="email_address">Main Categories </label>
                                <div class="form-group">
                                    <select class="form-control" name="maincategory" id="maincategory" required>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="email_address">Sub Categories </label>
                                <div class="form-group">
                                    <select class="form-control" name="subcategory" id="subcategory" required>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="email_address">Child Categories </label>
                                <div class="form-group">
                                    <select class="form-control" name="childcategory" id="childcategory" required>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="email_address">Items </label>
                                <div class="form-group">
                                    <select class="form-control" name="item" id="item" required>
                                       
                                    </select>
                                </div>
                            </div>
                            
                      </div>
                      <div class="row">
                          
                            <div class="col">
                                <label for="email_address">Price(N) </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="price" id="" required>
                                </div>
                            </div>
                            
                            <div class="col">
                                <label for="email_address">Available quantity </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" id="" required>
                                </div>
                            </div>
                            
                            <div class="col text-center">
                                 <label for="email_address">Packaging Cost Per Unit (N) </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="packaging_cost" id="" required>
                                </div>
                                
                            </div>
                      </div>
                       <div class="row">
                        <div class="col-sm-12">
                                <label for="email_address">Other Description </label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="5" required></textarea>
                        </div>
                      </div>
                      <br>
                    <button type="submit" class="btn btn-success float-right">Add</button>
                  </form>
                </div>
              </div>

        
            </div>

          </div>
          <!--Row-->


        </div>
        <!---Container Fluid-->