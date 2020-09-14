<?php $this->load->view('common/start_header'); ?>
  <!-- /.login-logo -->
  
  <center><?php echo $this->session->flashdata('success_msg'); ?> </center>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg "  >Sign in to start your session</p>
      <?php echo $this->session->flashdata('err_msg'); ?> 
      <div class="error" id="emailErr"></div>
      <div class="error" id="passwordErr"></div>
      <form action="<?= site_url('Login/login_action') ?>" method="post">
       
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <p class="error" id="emailErr"></p>
        <div class="clearfix"></div>
        <div class="input-group mb-3">
          <input type="password" id="password"  name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
           
          </div>
           <div class="col-4">
            <button type="button" onclick="return login_validation()" class="btn btn-primary btn-block">Sign In</button>
            <button type="submit"  class="btn btn-primary btn-block hide saveBtn ">Sign In</button>
          </div>
           <div class="col-4">
           
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <!--  <p class="mb-1">
        <a href="<?= site_url('forgot-password') ?>">I forgot my password</a>
      </p>-->
      
      <!-- <p class="mb-1">
        <a href="<?= site_url('register-user') ?>" class="text-center">Register a new user</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php $this->load->view('common/start_footer'); ?>



