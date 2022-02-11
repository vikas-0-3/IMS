<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseModel extends CI_Model {


    public function addPurchaseData($data)
    {
        $this->db->insert('purchase_order', $data);
        return $this->db->insert_id();
    }

    public function addPurchaseOrderData($data) {
        $this->db->insert('orders', $data);
        return true;
    }

    public function updatePurchaseData($data, $id) {
        $this->db->where("id", $id);
        return $this->db->update("purchase_order", $data);
    }

    public function allPurchaseData() {
        $this->db->select("purchase_order.*, vendors.vendor_name");
        $this->db->from("purchase_order")
        ->join('vendors', 'purchase_order.vendor_id = vendors.id');
        return $this->db->get()->result_array();
    }

    public function changeStatus($id, $data) {
        $this->db->where("id", $id);
        return $this->db->update("purchase_order", $data);
    }

    public function getVendorEmailById($id) {
        $this->db->select("vendors.*");
        $this->db->from("purchase_order")
        ->join('vendors', 'purchase_order.vendor_id = vendors.id');
        $this->db->where("purchase_order.id", $id);
        $res =  $this->db->get()->result_array()[0];
        return $res['vendor_email'];
    }

    public function getAdminEmailById($id) {
        $this->db->select("users.*");
        $this->db->from("purchase_order")
        ->join('users', 'purchase_order.created_by = users.id');
        $this->db->where("purchase_order.id", $id);
        $res =  $this->db->get()->result_array()[0];
        return $res['email'];
    }

    public function getPurchaseById($id) {
        $this->db->select("purchase_order.*, vendors.vendor_name");
        $this->db->from("purchase_order")
        ->join('vendors', 'purchase_order.vendor_id = vendors.id');
        $this->db->where("purchase_order.id", $id);
        return $this->db->get()->result_array();
    }

    public function getOrdersById($id) {
        return $this->db->get_where("orders", array("po_id" => $id))->result_array();
    }

    public function addTimeline($data) {
        $this->db->insert('po_timeline', $data);
        return true;
    }

    public function updateTimeline($id, $data) {
        $this->db->where("po_id", $id);
        return $this->db->update("po_timeline", $data);
    }

    public function getTimelineById($id) {
        return $this->db->get_where("po_timeline", array("po_id" => $id))->result_array()[0];
    }

    public function deletePO($id) {
        $this->db->where('id', $id);
        $this->db->delete('purchase_order');

        $this->db->where('po_id', $id);
        return $this->db->delete('orders');
    }

    public function deleteOrderData($id) {
        $this->db->where('id', $id);
        return $this->db->delete('orders');
    }

}

?>