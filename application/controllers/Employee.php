<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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


	/*Author : Snehal Hude
	Function : This function load employee list page 
	Date : 12-09-2020
	*/
	
	public function index()
	{   
		//UNSET SESSION IF DEFINED
		
		if(isset($_SESSION['edit'])){
		$this->session->unset_userdata('edit');

		}
		
		$getEmployees 		= 	$this->Common_model->getData('employees','','','id desc');

	
		$data 				= 	array(
		
			'title'	  		=> "Employees List",
			'add_btn' 		=> "Add Employee",
			'add_url' 		=> 	site_url('add-employee'),
			'getEmployees' 	=>	$getEmployees,
			
		);

		$this->load->view('employee/list',$data);
	}

	/*Author : Snehal Hude
	Function : This function load employee view page 
	Date : 12-09-2020
	*/
	public function view($id='')
	{
		$row 			= 	$this->Common_model->getData('employees',"",'id="'.$id.'"');

		$thumbImgName 	= 	$row[0]->image;
        $imgExplode   	= 	explode('.',  $thumbImgName);
        $image_thumb    = 	$imgExplode[0].'_thumb.'.$imgExplode[1];
		
		$data 			= array(
		
			'title'	  		=> 	"View Employee",
			'back_url' 		=> 	site_url('employee-list'),
			'back_title' 	=> 	"Employees List",
			'id' 			=>	$row[0]->id,
			'name' 			=>	$row[0]->name,
			'email' 		=>	$row[0]->email,
			'phone' 		=>	$row[0]->phone,
			'address' 		=>	$row[0]->address,
			'dob' 			=>	$row[0]->dob,
			'image' 		=>	$row[0]->image,
			'image_thumb' 	=>	$image_thumb
			
		); 

		$this->load->view('employee/view',$data);
	}

	/*Author : Snehal Hude
	Function : This function load  ad employee form page 
	Date : 12-09-2020
	*/
	public function add()
	{  
		
		$this->load->view('employee/form');
	}

	/*Author : Snehal Hude
	Function : This function perform  add employee to the database and checks validtions
	Date : 12-09-2020
	*/
	public function add_action()
	{	 	
		//CALL THE VALIDATIONS RULES
		$rules = $this->_rules();

		if ($this->form_validation->run() == FALSE)
		{  
			
			$this->load->view('employee/form'); 
		}
		else
		{  

			if(!empty($_FILES['image']['name'])){

			 $config['upload_path']   = 'uploads/employees/'; 
	         $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
	       
	         $this->load->library('upload', $config);
				
	         if ( ! $this->upload->do_upload('image')) {
	         	
	            $error 				  = 	array('error' => $this->upload->display_errors()); 
	            $this->session->set_flashdata('err_msg', '<div class="error">'.$error['error'].'</div>');
	            redirect('add-product');
	          
	         }
	         else {

	            $data 	= 	array('image' => $this->upload->data()); 
	         	$image 	= 	$data['image']['file_name'];
	         	$this->resizeImageThumbnail($image);
	         } 

			}else{
				$image  = '';
			}

			$data = array(
	    	'name' 		=> $this->input->post('name'),
	    	'email' 	=> $this->input->post('email'),
	    	'phone' 	=> $this->input->post('phone'),
	    	'address' 	=> $this->input->post('address'),
	    	'dob' 		=> date("Y-m-d", strtotime($this->input->post('dob'))),
	    	'image' 	=> $image,
	    	'created' 	=> date('Y-m-d h:i:s'),
	    	 );

		    $this->Common_model->save("employees",'',$data);
		    $this->session->set_flashdata('success_msg', '<div class="success">Employee has been created successfully.</div>');

		    redirect('employee-list');



		}
		  

	}

	/*Author : Snehal Hude
	Function : This function perform  loads employee edit page with data 
	Date : 12-09-2020
	*/

	public function edit($id)
	{	
		$row 		  = 	$this->Common_model->getData('employees','',"id='".$id."'");
		$thumbImgName = 	$row[0]->image;
        $imgExplode   = 	explode('.',  $thumbImgName);
        $image        = 	$imgExplode[0].'_thumb.'.$imgExplode[1];
		
		$data 		  = 	array(
			'title'	  		=> "Edit Employee",
			'button'		=> "Edit",
			'back_url' 		=> site_url('employee-list'),
			'back_title' 	=> "Product List",
			'action_url' 	=> site_url('Employee/edit_action'),
			'id' 			=> set_value('id',$row['0']->id),
			'name' 			=> set_value('name',$row['0']->name),
			'email' 		=> set_value('price',$row['0']->email),
			'phone' 		=> set_value('quantity',$row['0']->phone),
			'address' 		=> set_value('quantity',$row['0']->address),
			'dob' 			=> set_value('quantity',$row['0']->dob),
			'image' 		=> set_value('image',$row['0']->image),
			'imagethumb' 	=> $image,
			

		);

		$this->load->view('employee/edit_form',$data);
		
	}

	/*Author : Snehal Hude
	Function : This function perform  edit employee  and checks validations
	Date : 12-09-2020
	*/

	public function edit_action()
	{
		
		$rules = $this->_rules();

		if ($this->form_validation->run() == FALSE)
		{  
			$data['edit'] = array (
            'errors' => validation_errors(),
	        );
	        $this->session->set_userdata($data);
	    
			redirect('edit-employee/'.$this->input->post('id'));
		}
		else
		{  
			if(!empty($_FILES['image']['name'])){

			 $config['upload_path']   = 'uploads/employees/'; 
	         $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
	       
	         $this->load->library('upload', $config);
				
	         if ( ! $this->upload->do_upload('image')) {
	         	
	            $error = array('error' => $this->upload->display_errors()); 
	            $this->session->set_flashdata('err_msg', '<div class="error">'.$error['error'].'</div>');
	            redirect('add-employee');
	          
	         }
	         else {


	            $data = array('image' => $this->upload->data()); 
	         	$image = $data['image']['file_name'];
	         	$this->resizeImageThumbnail($image);
	         } 

			}else{
				$image  = $this->input->post('image_old');
			}

			 $data = array(
	    	'name' 		=> $this->input->post('name'),
	    	'email' 	=> $this->input->post('email'),
	    	'phone' 	=> $this->input->post('phone'),
	    	'address' 	=> $this->input->post('address'),
	    	'dob' 	=> $this->input->post('dob'),
	    	'image' 	=> $image,
	    	'created' 	=> date('Y-m-d h:i:s'),
	    	 );

		    $this->Common_model->save("employees",'id="'.$this->input->post('id').'"',$data);
		    $this->session->set_flashdata('success_msg', '<div class="success">Employee has been edited successfully.</div>');

		   redirect('employee-list');

		}
	}

	
	/*Author : Snehal Hude
	Function : This function perform permenant  delete and deletes file.
	Date : 12-09-2020
	*/

	public function delete($id)
	{
		$row 		  	= 	$this->Common_model->getData('employees','image',"id='".$id."'");
		$image 			= 	$row[0]->image;
        $imgExplode  	= 	explode('.',  $image);
        $image_thumb    = 	$imgExplode[0].'_thumb.'.$imgExplode[1];
     
		unlink('uploads/employees/thumbnail/'.$image_thumb); 
		unlink('uploads/employees/'.$image); 
		$this->Common_model->delete("employees","id='".$id."'");
		$this->session->set_flashdata('success_msg', '<div class="success">Employee has been deleted successfully.</div>');

	   redirect('employee-list');
	}

	/*Author : Snehal Hude
	Function : This function resize the image
	Date : 12-09-2020
	*/
	public function resizeImageThumbnail($filename)
   {
			
		    $config['image_library'] 	= 	'gd2';
		    $config['upload_path']   	= 	'uploads/employees/thumbnail'; 
		    $config['source_image'] 	= 	'uploads/employees/'.$filename;
		    $config['new_image'] 		= 	'uploads/employees/thumbnail'; 
		    $config['create_thumb'] 	= 	TRUE;
		  //  $config['maintain_ratio'] 	= 	TRUE;
		    $config['width']     		= 	90;
		    $config['height']   		= 	90;

		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();

		
   }


	/*Author : Snehal Hude
	Function : This function set validations for add and edit employees
	Date : 12-09-2020
	*/

   public function _rules()
   {
   	   $this->form_validation->set_rules(
	        'name', 'Name', 'required',
	        array(
	                'required'      => '%s Required.',
	               
	        )
			);


   	   if($this->input->post('button') == 'Add'){

   	   	 $this->form_validation->set_rules( 'email', 'Email','required|valid_email|is_unique[employees.email]',
	        array(
	                'required'      =>  '%s Required',
	                'valid_email'   => 'Invalid %s.',
	                'is_unique'     => 'This %s already exists.'
	        )
			); 

   	   }
   	   else{
   	   	$check_email = $this->Common_model->getData('employees','id,email','email="'.$this->input->post('email').'" and id != "'.$this->input->post('id').'"');

   	   
   	   	if(!empty($check_email)){
   	   		
   	   			$is_unique ='|is_unique[employees.email]';
   	   		}else{
   	   			$is_unique = '';
   	   		}

   	   		
   	   		 $this->form_validation->set_rules( 'email', 'Email','required|valid_email'.$is_unique,
	        array(
	                'required'      =>  '%s Required',
	                'valid_email'   => 'Invalid %s.',
	                'is_unique'     => 'This %s already exists.'
	        )
			); 

   	   	}

   	   		
		 $this->form_validation->set_rules( 'phone', 'Phone No','required|numeric|is_unique[employees.email]',
	        array(
	                'required'      => '%s Required',
	                'numeric'       => 'Invalid %s.',
	                'is_unique'     => 'This %s already exists.'
	        )
			);

		 $this->form_validation->set_rules( 'address', 'Address','required',
	        array(
	                'required'      => '%s Required',
	                
	        )
			);

		 $this->form_validation->set_rules( 'dob', 'Date Of Birth','required',
	        array(
	                'required'      => '%s Required',
	                
	        )

		);
	 	if(empty($_FILES['image']['name']) && $this->input->post('button') == 'Add')
		{
		    $this->form_validation->set_rules('image', 'Image', 'required',
		    	array(
                'required'      => '%s Required',
                
        )
			);
		}
   }


}
