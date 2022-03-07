<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalModel extends CI_Model {

    public function getAllOrdersForApproval($arr) {
        $this->db->select("po_id");
        $poids =  $this->db->get_where("po_timeline", $arr)->result_array();
    
        if(count($poids) > 0) {
            $temp = [];
            for($i=0; $i<count($poids); $i++) {
                $this->db->select("invoice.*, purchase_order.id, purchase_order.vendor_id, vendors.vendor_name");
                $this->db->from("invoice")
                ->join('purchase_order', 'purchase_order.id = invoice.po_id')
                ->join('vendors', 'purchase_order.vendor_id = vendors.id');
                $this->db->where("purchase_order.id", $poids[$i]["po_id"] );
                $a =  $this->db->get()->result_array()[0];
                array_push($temp, $a);
            }
            return $temp;
        } 
        else {
            return [];
        }
    }

    public function ChangeTimelineStatus($arr, $id, $arr2) {
        $this->db->where("po_id", $id);
        $this->db->update("invoice", $arr2);


        $this->db->where("po_id", $id);
        return $this->db->update("po_timeline", $arr);
    }

    public function ChangeTimelineStatusPayment($data, $id) {
        $this->db->where("po_id", $id);
        return $this->db->update("po_timeline", $data);
    }
    
    public function updateInvoicePaymentStatus($arr, $id) {
        $this->db->where("po_id", $id);
        return $this->db->update("invoice", $arr);
    }

   
    
}

?>