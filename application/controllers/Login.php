<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{ 

		$this->load->view('start/login');
	}

	public function login_action()
	{ 	
		$con = "email = '".$this->input->post('email')."' and password = '".md5($this->input->post('password'))."'";

		$chk_user = $this->Common_model->getData("users"," ",$con);
		
		if(!empty($chk_user)){
			

				$sessionData = array( 
					'id'  		=> 	$chk_user[0]->id, 
					'name'  	=> 	$chk_user[0]->name,
					'email'     => 	$chk_user[0]->email, 
					'user_type' => 	$chk_user[0]->user_type, 
					'logged_in' => TRUE
				 );  

				 $this->session->set_userdata($sessionData);
				 redirect('dashboard');

		

		}else{

			$this->session->set_flashdata('err_msg', '<small class="error flash">Invalid login credentials..!!</small>');
			redirect('login');

		}
		
	}

	public function fogot_password()
	{ 
		
		$this->load->view('start/fogot_password');
	}

	public function register()
	{ 	
		//destroy set values in  session
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
            if ($key != 'id' && $key != 'name' && $key != 'email' && $key != 'user_type' && $key != 'logged_in' ) {
                $this->session->unset_userdata($key);
            }
        }
		$this->session->sess_destroy();
		//destroy set values in  session
		$this->load->view('start/register');
	}

	public function register_action()
	{
		$con    		 =  "email = '".$this->input->post('email')."'" ;
		$check_email_dup =  $this->Common_model->getData("users",'',$con);

		if(!empty($check_email_dup)){

			$returnData = array( 
				
				'name'  	=> 	$this->input->post('name'),
				'email'     => 	$this->input->post('email'), 
				
			 );  
			 $this->session->set_flashdata('err_msg', '<small class="error flash">Email already exist..!!</small>');
			 $this->session->set_userdata($returnData);
			
			redirect('register-user');
			
		}
		else{

		
			$dataArr = array(

				'name' 			=> $this->input->post('name'),
				'email' 		=> $this->input->post('email'),
				'password' 		=> md5($this->input->post('password')) ,
				'user_type' 	=> 'user',
				'is_verified' 	=> '0',
				'created' 		=> date('Y-m-d h:i:s'),

			);

			$this->Common_model->save('users','',$dataArr);

			
			$this->session->set_flashdata('success_msg', '<small class="success">Your account created successfully.</small>');
			redirect('login');
			
		}

	
	}

	public function logout()
	{ 
		 $user_data = $this->session->all_userdata();
		
		foreach ($user_data as $key => $value) {
            if ($key != 'id' && $key != 'name' && $key != 'email' && $key != 'user_type' && $key != 'logged_in' ) {
                $this->session->unset_userdata($key);
            }
        }
   		 $this->session->sess_destroy();
			redirect('login');
	}


}
