<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ($_SESSION["userdata"]["username"] == NULL) {
            redirect(base_url());
        }
        $this->load->model('InvoiceModel', 'inv');
        $this->load->model('PurchaseModel', 'pm');
    }

    public function index() {
        $data['invoiceData'] = $this->inv->allInvoiceData();
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Invoice/index', $data);
		$this->load->view('Components/footer');
    }


    public function view($id) {
        $invid = $this->inv->getPOidByInvoiceId($id);
		$data['timeline'] = $this->pm->getTimelineById($invid);

		$data['allpurchase'] = $this->inv->getInvoiceById($id);
		$data['orderdetails'] = $this->inv->getOrdersById($id);
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Invoice/details', $data);
		$this->load->view('Components/footer');
	}

    public function edit($id) {
		$data['allpurchase'] = $this->inv->getInvoiceById($id)[0];
		$data['orderdetails'] = $this->inv->getOrdersById($id);
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Invoice/edit_invoice', $data);
		$this->load->view('Components/footer');
	}

    public function uploadinvoice($id) {
        $data['poid'] = $id;
        $this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('Invoice/upload', $data);
		$this->load->view('Components/footer');
    }

    public function uploadinvoicedata() {
        $poid = html_escape($this->input->post('poid'));
        
        $config['upload_path']          = './asset/inv';
        $config['allowed_types']        = 'gif|jpg|png|pdf|csv';
        $config['max_size']             = 9000;

        $inv = "";
        if(!empty($_FILES['vendor_invoice']['name'])){
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('vendor_invoice'))
            {
                $error = array('error' => $this->upload->display_errors());
                redirect('invoice/uploadinvoice/'.$poid, 'refresh');
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $inv = $data["upload_data"]["file_name"];
            }
        }
        else{
            redirect('invoice/uploadinvoice/'.$poid, 'refresh');
        }

        $updateData = array(
            "invoice_slip" => $inv
        );
        $data2 = array("po_file" => 1);        
        $success = $this->inv->updateInvoiceSlip($updateData, $poid, $data2);
        if($success) {
            
            $validIds = $this->inv->getVendorAdminEmails($poid);

            $path = "".base_url()."asset/inv/".$inv;
            $to = $validIds["email"];
			$message = "Invoice has been UPLOADED by vendor !";
			$subject = "Invoice";
			send_email($to, $subject, $message, $path);
			
			$to2 = $validIds["vendor_email"];
			$message2 = "You UPLOADED invoice !";
			send_email($to2, $subject, $message2, $path);
            
            
            redirect('invoice/index', 'refresh');
        }
        else {
            redirect('invoice/uploadinvoice/'.$poid, 'refresh');
        }
    }

    public function addinvoicedata() {
        $po = html_escape($this->input->post('po_number'));
        $asn = html_escape($this->input->post('asn'));
        $invoice_number = html_escape($this->input->post('invoice_number'));
        $sub_total = html_escape($this->input->post('sub_total'));
        $discount_type = html_escape($this->input->post('discount_type'));
        $discount_value = html_escape($this->input->post('discount_value'));
        $tax_amount = html_escape($this->input->post('tax_amount'));
        $total_amount = html_escape($this->input->post('total_amount'));


        $po_id = html_escape($this->input->post('po_id'));
        $po_item_name = html_escape($this->input->post('po_item_name'));
        $po_item_description = html_escape($this->input->post('po_item_description'));
        $po_item_hsn = html_escape($this->input->post('po_item_hsn'));
        $po_item_quantity = html_escape($this->input->post('po_item_quantity'));
        $po_item_rate = html_escape($this->input->post('po_item_rate'));
        $po_item_tax = html_escape($this->input->post('po_item_tax'));
        $po_item_value = html_escape($this->input->post('po_item_value'));
        

        $insertData = array(
            "po_id" => $po_id,
            "po" => $po,
            "asn" => $asn,
            "invoice_number" => $invoice_number,
            "sub_total" => $sub_total,
            "discount_type" => $discount_type,
            "discount_value" => $discount_value,
            "tax_amount" => $tax_amount,
            "grand_total" => $total_amount,
            "hr_status" => "PENDING",
            "admin_status" => "PENDING"
        );

        $success = $this->inv->addInvoiceData($insertData);

		if($success > 0) {

            $data2 = array(
				"po_invoice" => 1
			);
			$succ2 = $this->pm->updateTimeline($po_id, $data2);

			for ($x = 0; $x < count($po_item_name); $x++) {
                $invoiceOrderData = array(
                    "inv_id" => $success,
                    "inv_item_name" => $po_item_name[$x],
                    "inv_item_description" => $po_item_description[$x],
                    "inv_item_hsn" => $po_item_hsn[$x],
                    "inv_item_quantity" => $po_item_quantity[$x],
                    "inv_item_rate" => $po_item_rate[$x],
                    "inv_item_tax" => $po_item_tax[$x],
                    "inv_item_value" => $po_item_value[$x]
                );
	
				$succ = $this->inv->addInvoiceOrder($invoiceOrderData);
				
			}
		}

        if($success) {
            redirect('invoice');
        }
        else {
            redirect('purchaseorder/addinvoice');
        }

    }
    


    public function hrStatusAccept($invid) {
        $data = array(
			"hr_status" => "ACCEPT",
			"hr_approved" => date('Y-m-d H:i:s')
		);
		$succ = $this->inv->changeStatus($invid, $data);
		if($succ) {
			$data2 = array(
				"po_hr" => 1
			);

            $details = $this->inv->getVendorDetailsByInvoiceId($invid);
            $pid = $this->inv->getPOidByInvoiceId($invid);

			$succ = $this->pm->updateTimeline($pid, $data2);

			$to = $details["vendor_email"];
			$message = "Your Invoice has been ACCEPTED by HR !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('invoice');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
    }

    public function hrStatusReject($invid) {
        $data = array(
			"hr_status" => "REJECT",
			"hr_approved" => date('Y-m-d H:i:s')
		);
		$succ = $this->inv->changeStatus($invid, $data);
		if($succ) {
            $details = $this->inv->getVendorDetailsByInvoiceId($invid);
			$to = $details["vendor_email"];
			$message = "Your Invoice has been REJECTED by HR !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('invoice');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
    }


    public function adminStatusAccept($invid) {
        $data = array(
			"admin_status" => "ACCEPT",
			"admin_approved" => date('Y-m-d H:i:s')
		);
		$succ = $this->inv->changeStatus($invid, $data);
		if($succ) {
			$data2 = array(
				"po_admin" => 1
			);

            $details = $this->inv->getVendorDetailsByInvoiceId($invid);
            $pid = $this->inv->getPOidByInvoiceId($invid);

			$succ = $this->pm->updateTimeline($pid, $data2);

			$to = $details["vendor_email"];
			$message = "Your Invoice has been ACCEPTED by ADMIN !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('invoice');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
    }

    public function adminStatusReject($invid) {
        $data = array(
			"admin_status" => "REJECT",
			"admin_approved" => date('Y-m-d H:i:s')
		);
		$succ = $this->inv->changeStatus($invid, $data);
		if($succ) {
            $details = $this->inv->getVendorDetailsByInvoiceId($invid);
			$to = $details["vendor_email"];
			$message = "Your Invoice has been REJECTED by ADMIN !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('invoice');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
    }




    public function delete($id) {
		$this->inv->deleteInvoice($id);
		if($succ) {
            redirect('invoice');
        }
        else {
			redirect('invoice');
		}
	}

    

	
}
