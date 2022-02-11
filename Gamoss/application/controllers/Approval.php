<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Approval extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($_SESSION["userdata"]["username"] == NULL) {
            redirect(base_url());
        }
        $this->load->model('ApprovalModel', 'app');
    }


	public function hr()
	{
        $hrarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 0);
        $getview['HRApproval'] = $this->app->getAllOrdersForApproval($hrarr);
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Approval/hr', $getview);
        $this->load->view('Components/footer');
	}

    public function admin() {
        $adminarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 0);
        $getview['AdminApproval'] = $this->app->getAllOrdersForApproval($adminarr);
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Approval/admin', $getview);
        $this->load->view('Components/footer');
    }

    public function payments() {
        $payarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 1, "po_file" => 1, "po_payment" =>0);
        $getview['PaymentApproval'] = $this->app->getAllOrdersForApproval($payarr);
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Approval/payments', $getview);
        $this->load->view('Components/footer');
    }

    public function hrChangeStatusAccept($id) {
        $arr = array("po_hr" => 1);
        $arr2 = array("hr_status" => "ACCEPT", "hr_approved" => date('Y-m-d H:i:s'));
        $succ = $this->app->ChangeTimelineStatus($arr, $id, $arr2);
        if($succ) {
            redirect('Approval/hr');
        }
        else {
            redirect('Approval/hr');
        }
    }

    public function adminChangeStatusAccept($id) {
        $arr = array("po_admin" => 1);
        $arr2 = array("admin_status" => "ACCEPT", "admin_approved" => date('Y-m-d H:i:s'));
        $succ = $this->app->ChangeTimelineStatus($arr, $id, $arr2);
        if($succ) {
            redirect('Approval/admin');
        }
        else {
            redirect('Approval/admin');
        }
    }

    public function paymentChangeStatusAccept($id) {
        $arr = array("po_payment" => 1);
        $succ = $this->app->ChangeTimelineStatusPayment($arr, $id);
        if($succ) {
            redirect('Approval/payment');
        }
        else {
            redirect('Approval/payment');
        }
    }

	
}
