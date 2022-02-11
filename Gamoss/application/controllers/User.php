<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $getview['userdata'] = $this->usr->getAllUsers();
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Users/index', $getview);
        $this->load->view('Components/footer');
	}

    public function add()
	{
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Users/adduser');
        $this->load->view('Components/footer');
	}

    public function delete($id) {
        $success = $this->usr->deleteUserData($id);
        if($success) {
            redirect('user/index');
        }
        else {
            redirect('user/index');
        }
    }
        

    public function adduserdata() {
        $user_status = html_escape($this->input->post('user_status'));
        $user_designation = html_escape($this->input->post('user_designation'));
        $username = html_escape($this->input->post('username'));
        $password = html_escape($this->input->post('password'));
        $user_mobile = html_escape($this->input->post('user_mobile'));
        $user_email = html_escape($this->input->post('user_email'));
        
        $config['upload_path']          = './asset/img/user_images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;

        $userimage = "";
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('user_image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $userimage = "defautimage.jpg";
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $userimage = $data["upload_data"]["file_name"];
        }

        $insertData = array(
            "status" => $user_status,
            "user_role" => $user_designation,
            "username" => $username,
            "password" => md5($password),
            "mobile" => $user_mobile,
            "email" => $user_email,
            "image" => $userimage
        );

        $newUser = $this->usr->addUserData($insertData);


        // permission data
        $vendor_add = html_escape($this->input->post('vendor_add'));
        $vendor_edit = html_escape($this->input->post('vendor_edit'));
        $vendor_view = html_escape($this->input->post('vendor_view'));
        $vendor_delete = html_escape($this->input->post('vendor_delete'));
        $po_add = html_escape($this->input->post('po_add'));
        $po_edit = html_escape($this->input->post('po_edit'));
        $po_view = html_escape($this->input->post('po_view'));
        $po_delete = html_escape($this->input->post('po_delete'));
        $po_approve = html_escape($this->input->post('po_approve'));
        $invoice_add = html_escape($this->input->post('invoice_add'));
        $invoice_edit = html_escape($this->input->post('invoice_edit'));
        $invoice_view = html_escape($this->input->post('invoice_view'));
        $invoice_delete = html_escape($this->input->post('invoice_delete'));
        $invoice_approve = html_escape($this->input->post('invoice_approve'));
        $hr_approve = html_escape($this->input->post('hr_approve'));
        $admin_approve = html_escape($this->input->post('admin_approve'));
        $payment_approve = html_escape($this->input->post('payment_approve'));
        $user_add = html_escape($this->input->post('user_add'));
        $user_edit = html_escape($this->input->post('user_edit'));
        $user_view = html_escape($this->input->post('user_view'));
        $user_delete = html_escape($this->input->post('user_delete'));
        $user_approve = html_escape($this->input->post('user_approve'));

        $insertData2 = array(
            "user_id" => $newUser,
            "vendor_add" => $vendor_add == "on" ? 1 : 0,
            "vendor_edit" => $vendor_edit == "on" ? 1 : 0,
            "vendor_view" => $vendor_view == "on" ? 1 : 0,
            "vendor_delete" => $vendor_delete == "on" ? 1 : 0,
            "po_add" => $po_add == "on" ? 1 : 0,
            "po_edit" => $po_edit == "on" ? 1 : 0,
            "po_view" => $po_view == "on" ? 1 : 0,
            "po_delete" => $po_delete == "on" ? 1 : 0,
            "po_approve" => $po_approve == "on" ? 1 : 0,
            "invoice_add" => $invoice_add == "on" ? 1 : 0,
            "invoice_edit" => $invoice_edit == "on" ? 1 : 0,
            "invoice_view" => $invoice_view == "on" ? 1 : 0,
            "invoice_delete" => $invoice_delete == "on" ? 1 : 0,
            "invoice_approve" => $invoice_approve == "on" ? 1 : 0,
            "hr_approve" => $hr_approve == "on" ? 1 : 0,
            "admin_approve" => $admin_approve == "on" ? 1 : 0,
            "payment_approve" => $payment_approve == "on" ? 1 : 0,
            "user_add" => $user_add == "on" ? 1 : 0,
            "user_edit" => $user_edit == "on" ? 1 : 0,
            "user_view" => $user_view == "on" ? 1 : 0,
            "user_delete" => $user_delete == "on" ? 1 : 0,
            "user_approve" => $user_approv== "on" ? 1 : 0,
        );

        $success = $this->usr->addUserPermissionData($insertData2);

        // print_r($insertData2);
        // exit;

        if($success) {
            redirect('user/index');
        }
        else {
            redirect('user/add');
        }


    }
  
	
}
