<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Users', 'usr');
    }

	public function index()
	{
		$this->load->view('Components/header');
		$this->load->view('Auth/login');
		$this->load->view('Components/footer');
	}

	public function login() {
		$username = $this->input->post('username');
        $password = $this->input->post('password');
            
        $auth_details = array(
            'username' => $username, 
            'password' =>  md5($password)
        );

		$userauth = $this->usr->check_auth($auth_details);
        
		if(count($userauth) > 0) {
			

			$arr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 1, "po_file" => 1, "po_payment" =>0);
			$pc = $this->usr->countPayment($arr);

			$permission = $this->usr->getPermissionOfUser($userauth[0]["id"]);
	
			$this->session->set_userdata('userdata',$userauth[0]);
			$this->session->set_userdata('paymentCount', $pc);
			$this->session->set_userdata('permission', $permission);

			// $messge = array('message' => 'Login Success !','color' => 'green');
			// $this->session->set_flashdata('alert', $messge);
			redirect('dashboard/', 'refresh');
		}
		else {
			// $messge = array('message' => 'Incorrect Credentials !','color' => 'red');
			// $this->session->set_flashdata('alert', $messge);

			redirect(base_url(), 'refresh');
		}
        
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}
