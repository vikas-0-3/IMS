<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($_SESSION["userdata"]["username"] == NULL) {
            redirect(base_url());
        }
        $this->load->model('Users', 'usr');
    }


	public function index()
	{
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Dashboard/index');
        $this->load->view('Components/footer');
	}

	
}
