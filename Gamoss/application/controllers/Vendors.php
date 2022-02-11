<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($_SESSION["userdata"]["username"] == NULL) {
            redirect(base_url());
        }
        $this->load->model('Users', 'usr');
        $this->load->model('VendorModel', 'vdr');
    }


	public function index()
	{
        $getview['vendorsdata'] = $this->vdr->getAllVendors();
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Vendors/index', $getview);
        $this->load->view('Components/footer');
	}


    public function addvendors() {
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Vendors/addvendor');
        $this->load->view('Components/footer');
    }

    public function editvendor($id) {
        $getview['vendor'] = $this->vdr->getVendorById($id);
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Vendors/editvendor', $getview);
        $this->load->view('Components/footer');
    }

    public function viewvendor($id) {
        $getview['vendor'] = $this->vdr->getVendorById($id);
        $getview['purchaseData'] = $this->vdr->getVendorPOById($id);
        $temp = [];
        $invCount = [];
        for ($x = 0; $x < count($getview['purchaseData']); $x++) {
            array_push($temp, $this->vdr->getVendorInvoiceById($getview['purchaseData'][$x]["id"])); 
        }
        $getview['invoiceData'] = $temp;
        $getview['poCountData'] = $this->vdr->getPOCountDataById($id);
        
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Vendors/vendor', $getview);
        $this->load->view('Components/footer');
    }

    public function addvendorsdata() {
        $vendor_name = html_escape($this->input->post('vendor_name'));
        $gst_number = html_escape($this->input->post('gst_number'));
        $vendor_mobile = html_escape($this->input->post('vendor_mobile'));
        $vendor_email = html_escape($this->input->post('vendor_email'));
        $vendor_contact_person_name = html_escape($this->input->post('vendor_contact_person_name'));
        $vendor_contact_person_mobile = html_escape($this->input->post('vendor_contact_person_mobile'));
        $vendor_address = html_escape($this->input->post('vendor_address'));
        $vendor_site = html_escape($this->input->post('vendor_site'));
        $vendor_status = html_escape($this->input->post('vendor_status'));

        $vendor_password = html_escape($this->input->post('vendor_password'));
        
        
        $config['upload_path']          = './asset/img/vendors';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;

        $userlogo = "";
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('vendor_image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $userlogo = "defautimage.jpg";
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $userlogo = $data["upload_data"]["file_name"];
        }


        $insertData = array(
            "vendor_name" => $vendor_name,
            "gst_number" => $gst_number,
            "vendor_mobile" => $vendor_mobile,
            "vendor_email" => $vendor_email,
            "contact_person_name" => $vendor_contact_person_name,
            "contact_person_mobile" => $vendor_contact_person_mobile,
            "vendor_address" => $vendor_address,
            "vendor_site" => $vendor_site,
            "vendor_images" => $userlogo,
            'status' => $vendor_status
        );

        $authData = array(
            "username" => $vendor_name,
            "email" => $vendor_email,
            "password" => md5($vendor_password),
            "image" => $userlogo,
            "user_role" => "VENDOR",
            "status" => "ACTIVE",
            "mobile" => $vendor_mobile
        );


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


        $success = $this->vdr->addVendorsData($insertData);
        if($success) {
            $userData = $this->usr->addUserData($authData);

            $insertData2 = array(
                "user_id" => $userData,
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
            $suc = $this->usr->addUserPermissionData($insertData2);
            $this->session->set_flashdata('success', 'Wohoo, New vendor added!');
            redirect('vendors/index');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('vendors/addvendors');
        }

    }


    public function editvendorsdata() {
        $vendor_name = html_escape($this->input->post('vendor_name'));
        $gst_number = html_escape($this->input->post('gst_number'));
        $vendor_mobile = html_escape($this->input->post('vendor_mobile'));
        $vendor_email = html_escape($this->input->post('vendor_email'));
        $vendor_contact_person_name = html_escape($this->input->post('vendor_contact_person_name'));
        $vendor_contact_person_mobile = html_escape($this->input->post('vendor_contact_person_mobile'));
        $vendor_address = html_escape($this->input->post('vendor_address'));
        $vendor_site = html_escape($this->input->post('vendor_site'));
        $vendor_status = html_escape($this->input->post('vendor_status'));

        
        $vendorId = html_escape($this->input->post('vendorid'));
        
        $config['upload_path']          = './asset/img/vendors';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;

        $userlogo = "";
        if(!empty($_FILES['vendor_image']['name'])){
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('vendor_image'))
            {
                $error = array('error' => $this->upload->display_errors());
                $userlogo = $error;
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $userlogo = $data["upload_data"]["file_name"];
            }
          
        }
        else{
            $userlogo = $this->input->post('imagevalue');
        }


        


        $updateData = array(
            "vendor_name" => $vendor_name,
            "gst_number" => $gst_number,
            "vendor_mobile" => $vendor_mobile,
            "vendor_email" => $vendor_email,
            "contact_person_name" => $vendor_contact_person_name,
            "contact_person_mobile" => $vendor_contact_person_mobile,
            "vendor_address" => $vendor_address,
            "vendor_site" => $vendor_site,
            "vendor_images" => $userlogo,
            'status' => $vendor_status
        );

        $success = $this->vdr->updateVendorsData($updateData, $vendorId);
        if($success) {
            // $messge = array('message' => 'Vendor Updated !','color' => 'green');
			// $this->session->set_flashdata('alert', $messge);
            redirect('vendors/editvendor/'.$vendorId, 'refresh');
        }
        else {
            // $messge = array('message' => 'Error, Please try again','color' => 'green');
			// $this->session->set_flashdata('alert', $messge);
            redirect('vendors/editvendor/'.$vendorId, 'refresh');
        }

    }


    public function deletevendor($id) {
        $success = $this->vdr->deleteVendorsData($id);
        if($success) {
            $this->session->set_flashdata('success', 'Vendor deleted Successfully!');
            redirect('vendors');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('vendors');
        }
    }

	
}
