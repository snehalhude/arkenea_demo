<?php
 $this->load->view('common/header'); 
 $this->load->view('common/nav'); 
 ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--  <center><?php echo $this->session->flashdata('success_msg'); ?> </center> -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
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
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
				<a href="<?= $add_url ?>" class="btn btn-sm btn-primary"><?= $add_btn ?></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Sr No</th>
                      <th>Name</th>
  				  	        <th>Email</th>
                      <th>Phone No</th>
                      <th>Address</th>
                      <th>Date of Birth</th>
                      <th>Image</th>
					            <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr =1;   
                    foreach ($getEmployees as $row) {
                      $thumbImgName = $row->image;
                      $imgExplode   = explode('.',  $thumbImgName);
                      $image        = $imgExplode[0].'_thumb.'.$imgExplode[1];
                     // print_r($row);
                      ?>
                    <tr>
                      <td><?= $sr ?></td>
                      <td><?= ucfirst($row->name) ?></td>
                      <td><?= $row->email ?></td>
                      <td><?= $row->phone ?></td>
                      <td><?= $row->address ?></td>
                      <td><?= $row->dob ?></td>
                      <td><img src="<?= base_url() ?>uploads/employees/thumbnail/<?= $image ?>"></td>
                     
                      <td>
                        <a href="<?= site_url('view-employee/'.$row->id) ?>" class="btn btn-info btn-xs" title="View"><i class="fa fa-eye"></i></a>  | 
                        <a href="<?= site_url('edit-employee/'.$row->id) ?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>  | 
                        <a onclick="return confirm('Are you sure to delete?')" href="<?= site_url('delete-employee/'.$row->id) ?>" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a> 
                      </td>
                      
                    </tr>

                     <?php $sr++; } ?>

                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view('common/footer') ?>