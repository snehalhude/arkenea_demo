<?php
 $this->load->view('common/header'); 
 $this->load->view('common/nav'); 
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
			  <li class="breadcrumb-item"><a href="<?= $back_url ?>"><?= $back_title ?></a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
             

                <div class="card-body col-md-6">
                  <table class="table">
                  	
		                 <tr>
		                      <th> Name </th>
		                      <th>: </th>
		                    <td><?= ucfirst($name) ?> </td>
		                 </tr>

		                 <tr>
		                      <th>Email </th>
		                      <th>: </th>
		                    <td><?= $email ?> </td>
		                 </tr>

		                 <tr>
		                      <th>Phone No. </th>
		                      <th>: </th>
		                    <td><?= $phone ?> </td>
		                 </tr>                     

                     <tr>
                          <th>Address </th>
                          <th>: </th>
                        <td><?= $address ?> </td>
                     </tr>

                     <tr>
                          <th>Date Of Birth </th>
                          <th>: </th>
                        <td><?= $dob ?> </td>
                     </tr>

		                 

		                 <tr>
		                      <th>Image </th>
		                      <th>: </th>
		                    <td><img src="<?= base_url() ?>uploads/employees/<?= $image ?>" width="200" height="200"></td>
		                 </tr>
		  				  	  
		                  
		                
                  </table>

                   <div class="card-footer">
              
				        <a href="<?= $back_url ?>"  class="btn  btn-sm btn-danger">Back</a>
                </div>
                
                </div>
                <!-- /.card-body -->

                
            </div>
            <!-- /.card -->

          
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?= base_url() ?>custom/js/product.js"> </script>
  <?php $this->load->view('common/footer') ?>
