<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
	public function __construct() {
		parent::__construct();
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('register');
	}

	public function create(){
		$this->form_validation->set_rules('name', 'Name', 'required',
			array(
	            'required'      => 'You have not provided %s.'
	        )
		);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
	        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.',
                'valid_email'	=> 'Invalid Email provided'
	        )
	    );
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(
	            'required'      => 'You have not provided %s.'
	        )
		);
		$this->form_validation->set_rules('password-confirmation', 'Confirm Password', 'required|matches[password]',array(
                'required'      		=> 'You have not provided %s.',
                'matches[password]'     => "Password and Confirm password doesn't match."
	        )
		);
		$this->form_validation->set_rules('gender', 'Gender', 'required|in_list[male,female]',
			array(
                'required'      			=> 'You have not provided %s.',
                'in_list[male,female]'     	=> "Invlaid Gender Selected"
	        )
		);

		$this->form_validation->set_rules('dob', 'Date Of Birth', 'required',
			array(
                'required'      			=> 'You have not provided %s.',
                'callback_checkDateFormat'				=> 'Invalid Date'
	        )
		);
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'User Image', 'required',
				array(
	                'required'      			=> 'You have not provided %s.'
		        )
			);
		}
		
		if ($this->form_validation->run() == FALSE)
        {
        		$this->session->set_flashdata('errors', validation_errors());
           		redirect('/user/register', 'refresh');
        }
        else
        {
        	$options = [
			  'cost' => 10
			];
        	$data['name']       				=   $this->input->post('name');
            $data['email']  					=   $this->input->post('email');
            $data['email_verified_at']        	=   date("Y-m-d h:i:s",time());
            $data['password']  					=   password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $data['gender']    					=   $this->input->post('gender');
            $data['lat']    					=   $this->input->post('lat');
            $data['lon']    					=   $this->input->post('long');
            $data['dob']    					=   date("Y-m-d",strtotime($this->input->post('dob')));

            $image 								=	$_FILES['image']['name'];
	        $ext 								= 	pathinfo($image,PATHINFO_EXTENSION);
	        $user_image 						= 	"user_".str_replace(' ', '_', $this->input->post('name'))."_".time().".".$ext;
           	$data['user_image']    				=   base_url().'uploads/users/'.$user_image;
           	$data['created_at']    				=	date("Y-m-d h:i:s",time());
           	$data['updated_at']    				=	date("Y-m-d h:i:s",time());

           	$id 								=	$this->User->insertDb('users',$data);
           	if($id > 0 && $this->User->imageUpload('image',$user_image,'users')){
           		$this->session->set_flashdata('success', 'User Registerd Successfully !');
           		redirect('/user/register', 'refresh');
           	} else {
           		$this->session->set_flashdata('errors', 'Something Went Wrong. Try Again!');
           		redirect('/user/register', 'refresh');
           	}
        }
	}
}
