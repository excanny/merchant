        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
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
            <!-- Products -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-success">Products</h6>
                  <a href="<?php echo site_url();?>index.php/MerchantArena/addproduct">Add New</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush datatable text-center">
                    <thead class="thead-light">
                      <tr>
                      <th>#</th>
                       <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price </th>
                        <th>Packaging Cost</th>
                        <th>Qty Left</th>
                        <th>Location</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1; foreach($products as $product){ ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $product->fproduct_id; ?></td>
                        <td><?php echo $product->fitem; ?></td>
                        <td>₦<?php echo $product->fprice; ?></td>
                        <td>₦<?php echo $product->fpackaging_cost; ?></td>
                        <td><?php echo $product->fquantity; ?></td>
                        <td><?php echo $product->fmerchant_city; ?></td>
                        <td>
                           <form method="DELETE" action="<?php echo base_url('merchantarena/DeleteProduct/'. $product->frecno); ?>">
                             <a data-recno="<?php echo $product->frecno; ?>" data-domain="<?php echo $product->fdomain; ?>" data-item="<?php echo $product->fitem; ?>" data-price="<?php echo $product->fprice; ?>" data-quantity="<?php echo $product->fquantity; ?>" data-packaging_cost="<?php echo $product->fpackaging_cost; ?>" data-description="<?php echo $product->fdescription; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-success btn-xs product_id">
                                <i class="fa fa-pencil"></i>
                            </a>
                            
                                <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this record?')">
                                    <i class="fa fa-trash-o "></i>
                                </button>
                            </form>
                        </td>
                        
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


           <!-- Modal Center -->
           <div class="modal fade" id="EditProduct" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Edit Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url();?>index.php/MerchantArena/EditProductAction" method="post">
                     <input type="hidden" name="id" id="recno">
                     <!--<input type="hidden" name="domain" id="domain">-->
                     <input type="hidden" name="merchant_id" value="<?php echo $this->session->shop_id; ?>">
                   <input type="hidden" name="merchant_city" value="<?php echo $this->session->merchant_city; ?>">
                   <input type="hidden" name="merchant_area" value="<?php echo $this->session->merchant_area; ?>">
                   <input type="hidden" name="merchant_email" value="<?php echo $this->session->merchant_email; ?>">
                   <input type="hidden" name="merchant_phone" value="<?php echo $this->session->merchant_phone; ?>">
                   <input type="hidden" name="image" id="image">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
						<div class="row">
						    <div class="col">
								<div class="form-group">
									<label for="email" style="color: #bfbebe !important;">Domain:</label>
									<div class="form-group">
                                    <select class="form-control" name="domain" id="domain" required>
                                        <option value="">Select one</option>
                                        <?php foreach($domains as $domain){ ?>
                                                <option value="<?php echo $domain->fdomain; ?>"><?php echo $domain->fdomain; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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
								<div class="form-group">
									<label for="email" style="color: #bfbebe !important;">Item:</label>
									
									<select class="form-control" name="item" id="item" required>
                                       
                                    </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
							    <label class="" style="color: #bfbebe !important;">Price:</label>
								<input type="number" class="form-control" name="price" id="price" required>
							</div>
							<div class="col-sm-4">
							    <label class="" style="color: #bfbebe !important;">Quantity:</label>
								<input type="number" class="form-control" name="quantity" id="quantity" required>
							</div>
							<div class="col-sm-4">
							    <label class="" style="color: #bfbebe !important;">Packaging Cost:</label>
								<input type="number" class="form-control" name="packaging_cost" id="packaging_cost" required>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="email" style="color: #bfbebe !important;">Description:</label>
									<textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
								</div>
							</div>
						</div>
					
						
						
					
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
              </div>
            </div>
          </div>