<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($_SESSION["userdata"]["username"] == NULL) {
            redirect(base_url());
        }
		
        $this->load->model('Users', 'usr');
        $this->load->model('VendorModel', 'vdr');
		$this->load->model('PurchaseModel', 'pm');
		$this->load->model('InvoiceModel', 'inv');
    }

	public function index()
	{
		$data['purchaseData'] = $this->pm->allPurchaseData();
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('PurchaseOrder/purchase_order', $data);
		$this->load->view('Components/footer');
	}

	public function view($id) {
	    $this->load->library('pdf');
	    $data['allpurchase'] = $this->pm->getPurchaseById($id);
		$data['orderdetails'] = $this->pm->getOrdersById($id);
		$data['timeline'] = $this->pm->getTimelineById($id);
		
		$purchase = $data["allpurchase"][0];
		$orders = $data["orderdetails"];
// 		print_r($orders);
// 		exit;
		
	   // $html = '
    //         <html>
    //             <head>
    //                 <style>
    //                     body {
    //                         padding: 0;
    //                         margin: 0;
    //                     }
    //                     .container-fluid {
    //                         padding: 20px;
    //                         margin :0;
    //                     }
    //                     .container {
    //                         padding : 30px;
    //                     }
    //                     .bg-light {
    //                         background-color:#D3D3D3;
    //                     }
    //                     .bg-white {
    //                         background-color:white;
    //                     }
    //                     table {
    //                       font-family: arial, sans-serif;
    //                       border-collapse: collapse;
    //                       width: 100%;
    //                     }
    //                     td, th {
    //                       border: 1px solid #dddddd;
    //                       text-align: left;
    //                       padding: 8px;
    //                     }
    //                     .row {
    //                         display: flex;
    //                       justify-content: space-evenly;
    //                     }
    //                     li {
    //                         list-style: none;
    //                     }
    //                     .text-center {
    //                         text-align: center;
    //                     }
    //                     h1 {
    //                         font-weight: bolder;
    //                         font-size: xx-large
    //                     }
    //                     .list-group-item {
    //                         padding: 5px;
    //                     }
    //                     .card {
    //                         border: 0.5px solid grey;
    //                         border-radius: 5px;
    //                         padding: 15px;
    //                     }
    //                     .red {
    //                         color: red;
    //                     }
    //                 </style>
    //             </head>
    //             <body>
    //                 <div class="container-fluid bg-light">
    //                     <div class="container bg-white">
    //                         <h1 class="text-center red">Purchase Order</h1>
    //                         <hr>
    //                         <div class="row">
    //                             <div class="col-sm">
    //                                 <h3 class="text-center">Order Details</h3>
    //                                 <div class="card">
    //                                     <ul class="list-group list-group-flush">
    //                                         <li class="list-group-item"><b>PO NUMBER :</b> ' . $purchase["po_number"] .'</li>
    //                                         <li class="list-group-item"><b>VENDOR :</b> ' . $purchase["vendor_name"] .'</li>
    //                                         <li class="list-group-item"><b>STATUS :</b> ' . $purchase["status"] .'</li>
    //                                         <li class="list-group-item"><b>DATE & TIME :</b> ' . $purchase["date_time"] .'</li>
    //                                     </ul>
    //                                 </div>
    //                             </div>
    //                             <div class="col-sm">
    //                                 <h3 class="text-center">Price Details</h3>
    //                                 <div class="card">
    //                                     <ul class="list-group list-group-flush">
    //                                         <li class="list-group-item"><b>SUB TOTAL :</b> ' . $purchase["sub_total"] .'</li>
    //                                         <li class="list-group-item"><b>TAX AMOUNT : </b>' . $purchase["tax_amount"] .' </li>
    //                                         <li class="list-group-item"><b>DISCOUNT AMOUNT / TYPE : </b>' . $purchase["discount_amount"] .' / '.$purchase["discount_type"].' </li>
    //                                         <li class="list-group-item"><b>GRAND TOTAL :</b> ' . $purchase["total"] .'</li>
    //                                     </ul>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                         <br><br>
    //                         <div class="container">
    //                             <table class="table">
    //                                 <thead>
    //                                     <tr>
    //                                         <th>#</th>
    //                                         <th>Item Name</th>
    //                                         <th>Item Description</th>
    //                                         <th>Item HSN</th>
    //                                         <th>Item Quantity</th>
    //                                         <th>Item Rate</th>
    //                                         <th>Item Tax</th>
    //                                         <th>Item Tax Type</th>
    //                                         <th>Item Value</th>
    //                                     </tr>
    //                                 </thead>
    //                                 <tbody>';
                                    
    //                                 for($i=0; $i<count($orders); $i++) {
    //                                     $a = $i+1;
    //                                     $str = '
    //                                     <tr>
    //                                         <th scope="row">'.$a.'</th>
    //                                         <td>'.$orders[$i]["item_name"].'</td>
    //                                         <td>'.$orders[$i]["item_description"].'</td>
    //                                         <td>'.$orders[$i]["item_hsn"].'</td>
    //                                         <td>'.$orders[$i]["item_quantity"].'</td>
    //                                         <td>'.$orders[$i]["item_rate"].'</td>
    //                                         <td>'.$orders[$i]["item_tax"].'</td>
    //                                         <td>'.$orders[$i]["item_tax_type"].'</td>
    //                                         <td>'.$orders[$i]["item_value"].'</td>
    //                                     </tr>
    //                                     ';
    //                                     $html.= $str;
    //                                 }
                                    
                                    
    //                                 $html2 = '
    //                                 </tbody>
    //                             </table>
    //                         </div>
    //                     </div>
    //                     <br>
    //                 </div>
    //             </body>
    //         </html>
    //     ';
	    
	    
	   // $dompdf = new PDF();
	   // $dompdf->load_html($html);
	   // $dompdf->render();
	   // $output = $dompdf->output();
	   // $pdfname = $purchase["po_number"].'-purchaseorder.pdf';
	   // file_put_contents('pdfs/'.$pdfname, $output);

	    
		
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('PurchaseOrder/details', $data);
		$this->load->view('Components/footer');
	}

	public function add() {
        $data['allvendor'] = $this->vdr->getAllVendors();
        $a = $this->pm->allPurchaseData();
        $c = 0;
        if(count($a) > 0) {
            $c = $a[count($a)-1]['id']; 
        }
        $data['allpurchase'] = $c+1;
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('PurchaseOrder/add_purchase_order', $data);
		$this->load->view('Components/footer');
	}

	public function edit($id) {
        $data['allpurchase'] = $this->pm->getPurchaseById($id)[0];
		$data['orderdetails'] = $this->pm->getOrdersById($id);
		$data['allvendor'] = $this->vdr->getAllVendors();
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('PurchaseOrder/edit_purchase_order', $data);
		$this->load->view('Components/footer');
	}

	public function addinvoice($id) {
		$data['allpurchase'] = $this->pm->getPurchaseById($id);
		$data['orderdetails'] = $this->pm->getOrdersById($id);
		
		$a = $this->inv->allInvoiceData();
        $c = 0;
        if(count($a) > 0) {
            $c = $a[count($a)-1]['id']; 
        }
        $data['allinv'] = $c+1;
        
		$this->load->view('Components/header');
        $this->load->view('Components/nav');
		$this->load->view('PurchaseOrder/add_invoice', $data);
		$this->load->view('Components/footer');
	}

	public function addorder() {
		$vendor_id = html_escape($this->input->post('vendor_id'));
		$date_time = html_escape($this->input->post('date_time'));
		$po_number = html_escape($this->input->post('po_number'));
		$sub_total = html_escape($this->input->post('sub_total'));
		$discount_type = html_escape($this->input->post('discount_type'));
		$discount_value = html_escape($this->input->post('discount_value'));
		$tax_amount = html_escape($this->input->post('tax_amount'));
		$total_amount = html_escape($this->input->post('total_amount'));


		// orders data
		$po_item_name = html_escape($this->input->post('po_item_name'));
		$po_item_description = html_escape($this->input->post('po_item_description'));
		$po_hsn = html_escape($this->input->post('po_hsn'));
		$po_quantity = html_escape($this->input->post('po_quantity'));
		$po_rate = html_escape($this->input->post('po_rate'));
		$po_tax = html_escape($this->input->post('po_tax'));
		$po_tax_type = html_escape($this->input->post('po_tax_type'));
		$po_value = html_escape($this->input->post('po_value'));
		
		
		$vname = $this->pm->getVendorNameById($vendor_id);



		$purchase_order_data = array(
			"vendor_id" => $vendor_id,
			"date_time" => $date_time,
			"po_number" => $po_number,
			"sub_total" => $sub_total,
			"discount_type" => $discount_type,
			"discount_amount" => $discount_value,
			"tax_amount" => $tax_amount,
			"total" => $total_amount,
			"status" => "PENDING",
			"created_by" => $_SESSION["userdata"]["id"]
		);





		$succ_id = $this->pm->addPurchaseData($purchase_order_data);

		$timelineData = array(
			"po_id" => $succ_id,
			"po_acknowledgement" => 0,
			"po_invoice" => 0,
			"po_hr" => 0,
			"po_file" => 0,
			"po_admin" => 0,
			"po_payment" =>0
		);

		if($succ_id > 0) {

			for ($x = 0; $x < count($po_item_name); $x++) {
				$orders_data = array(
					"po_id" => $succ_id,
					"item_name" => $po_item_name[$x],
					"item_description" => $po_item_description[$x],
					"item_hsn" => $po_hsn[$x],
					"item_quantity" => $po_quantity[$x],
					"item_rate" => $po_rate[$x],
					"item_tax" => $po_tax[$x],
					"item_tax_type" => $po_tax_type[$x],
					"item_value" => $po_value[$x],
				);
	
				$succ = $this->pm->addPurchaseOrderData($orders_data);
				
			}
			
			$succ2 = $this->pm->addTimeline($timelineData);
		}
		
		$orders = $orders_data;
	    $html = '
            <html>
                <head>
                    <style>
                        body {
                            padding: 0;
                            margin: 0;
                        }
                        .container-fluid {
                            padding: 20px;
                            margin :0;
                        }
                        .container {
                            padding : 30px;
                        }
                        .bg-light {
                            background-color:#D3D3D3;
                        }
                        .bg-white {
                            background-color:white;
                        }
                        table {
                          font-family: arial, sans-serif;
                          border-collapse: collapse;
                          width: 100%;
                        }
                        td, th {
                          border: 1px solid #dddddd;
                          text-align: left;
                          padding: 8px;
                        }
                        .row {
                            display: flex;
                           justify-content: space-evenly;
                        }
                        li {
                            list-style: none;
                        }
                        .text-center {
                            text-align: center;
                        }
                        h1 {
                            font-weight: bolder;
                            font-size: xx-large
                        }
                        .list-group-item {
                            padding: 5px;
                        }
                        .card {
                            border: 0.5px solid grey;
                            border-radius: 5px;
                            padding: 15px;
                        }
                        .red {
                            color: red;
                        }
                    </style>
                </head>
                <body>
                    <div class="container-fluid bg-light">
                        <div class="container bg-white">
                            <h1 class="text-center red">Purchase Order</h1>
                            <hr>
                            <div class="row">
                                <div class="col-sm">
                                    <h3 class="text-center">Order Details</h3>
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>PO NUMBER :</b> ' . $po_number .'</li>
                                            <li class="list-group-item"><b>VENDOR :</b> ' . $vname["vendor_name"] .'</li>
                                            <li class="list-group-item"><b>DATE & TIME :</b> ' . $date_time .'</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h3 class="text-center">Price Details</h3>
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>SUB TOTAL :</b> ' . $sub_total .'</li>
                                            <li class="list-group-item"><b>TAX AMOUNT : </b>' . $tax_amount .' </li>
                                            <li class="list-group-item"><b>DISCOUNT AMOUNT / TYPE : </b>' . $discount_value .' / '.$discount_type.' </li>
                                            <li class="list-group-item"><b>GRAND TOTAL :</b> ' . $total_amount .'</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Item HSN</th>
                                            <th>Item Quantity</th>
                                            <th>Item Rate</th>
                                            <th>Item Tax</th>
                                            <th>Item Tax Type</th>
                                            <th>Item Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    
                                    for($i=0; $i<count($orders); $i++) {
                                        $a = $i+1;
                                        $str = '
                                        <tr>
                                            <th scope="row">'.$a.'</th>
                                            <td>'.$orders[$i]["item_name"].'</td>
                                            <td>'.$orders[$i]["item_description"].'</td>
                                            <td>'.$orders[$i]["item_hsn"].'</td>
                                            <td>'.$orders[$i]["item_quantity"].'</td>
                                            <td>'.$orders[$i]["item_rate"].'</td>
                                            <td>'.$orders[$i]["item_tax"].'</td>
                                            <td>'.$orders[$i]["item_tax_type"].'</td>
                                            <td>'.$orders[$i]["item_value"].'</td>
                                        </tr>
                                        ';
                                        $html.= $str;
                                    }
                                    
                                    
                                    $html2 = '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                    </div>
                </body>
            </html>
        ';
	    
	    
	    $dompdf = new PDF();
	    $dompdf->load_html($html);
	    $dompdf->render();
	    $output = $dompdf->output();
	    $pdfname = $po_number.'-purchaseorder.pdf';
	    file_put_contents('pdfs/'.$pdfname, $output);
	    
	    $ppath = array("pdf_path" => $pdfname);
	    $secc3 = $this->pm->updatePDFpath($succ_id, $ppath);
	    
	    

		if($succ) {
            redirect('purchaseorder');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('purchaseorder/add');
        }
	}



	public function editorder($id) {
		$vendor_id = html_escape($this->input->post('vendor_id'));
		$date_time = html_escape($this->input->post('date_time'));
		$po_number = html_escape($this->input->post('po_number'));
		$sub_total = html_escape($this->input->post('sub_total'));
		$discount_type = html_escape($this->input->post('discount_type'));
		$discount_value = html_escape($this->input->post('discount_value'));
		$tax_amount = html_escape($this->input->post('tax_amount'));
		$total_amount = html_escape($this->input->post('total_amount'));

		// orders data
		$po_item_name = html_escape($this->input->post('po_item_name'));
		$po_item_description = html_escape($this->input->post('po_item_description'));
		$po_hsn = html_escape($this->input->post('po_hsn'));
		$po_quantity = html_escape($this->input->post('po_quantity'));
		$po_rate = html_escape($this->input->post('po_rate'));
		$po_tax = html_escape($this->input->post('po_tax'));
		$po_tax_type = html_escape($this->input->post('po_tax_type'));
		$po_value = html_escape($this->input->post('po_value'));

		$deletedids = html_escape($this->input->post('deletedids'));

		for ($i = 0; $i < count($deletedids); $i++) {
			$delme = $this->pm->deleteOrderData($deletedids[$i]);				
		}

		$purchase_order_data = array(
			"vendor_id" => $vendor_id,
			"date_time" => $date_time,
			"po_number" => $po_number,
			"sub_total" => $sub_total,
			"discount_type" => $discount_type,
			"discount_amount" => $discount_value,
			"tax_amount" => $tax_amount,
			"total" => $total_amount,
			"status" => "PENDING",
			"created_by" => $_SESSION["userdata"]["id"]
		);

		$succ_id = $this->pm->updatePurchaseData($purchase_order_data, $id);

		if($succ_id > 0) {
			for ($x = 0; $x < count($po_item_name); $x++) {
				$orders_data = array(
					"po_id" => $id,
					"item_name" => $po_item_name[$x],
					"item_description" => $po_item_description[$x],
					"item_hsn" => $po_hsn[$x],
					"item_quantity" => $po_quantity[$x],
					"item_rate" => $po_rate[$x],
					"item_tax" => $po_tax[$x],
					"item_tax_type" => $po_tax_type[$x],
					"item_value" => $po_value[$x],
				);
				$succ = $this->pm->addPurchaseOrderData($orders_data);				
			}
		}


		if($succ) {
            redirect('purchaseorder');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
            redirect('purchaseorder/edit'.$id);
        }
	}


	public function vendorchangeStatusAccept($id) {
		$data = array(
			"status" => "ACCEPT",
			"approved_by_datetime" => date('Y-m-d H:i:s')
		);
		$succ = $this->pm->changeStatus($id, $data);
		if($succ) {
			$data2 = array(
				"po_acknowledgement" => 1
			);
			$succ = $this->pm->updateTimeline($id, $data2);

			$to = $this->pm->getAdminEmailById($id);
			$message = "Your Purchase Order (PO) has been Accepted by Vendor !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('purchaseorder');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
            
	}

	public function vendorchangeStatusReject($id) {
		$data = array(
			"status" => "REJECT",
			"approved_by_datetime" => date('Y-m-d H:i:s')
		);
		$succ = $this->pm->changeStatus($id, $data);
		if($succ) {
			$to = $this->pm->getAdminEmailById($id);
			$message = "Your Purchase Order (PO) has been Rejected by Vendor !";
			$subject = "Purchase Order Status";
			send_email($to, $subject, $message);
            redirect('purchaseorder');
        }
        else {
            $this->session->set_flashdata('danger', 'Error, please try again!');
		}
            
	}


	public function delete($id) {
		$this->pm->deletePO($id);
		if($succ) {
            redirect('purchaseorder');
        }
        else {
			redirect('purchaseorder');
		}
	}





}
