<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model {

    public function allInvoiceData() {
        $this->db->select("*");
        $this->db->from("invoice");
        return $this->db->get()->result_array();
    }

    public function addInvoiceData($data)
    {
        $this->db->insert('invoice', $data);
        return $this->db->insert_id();
    }

    public function addInvoiceOrder($data) {
        $this->db->insert('invoice_orders', $data);
        return true;
    }

    public function getVendorDetailsByInvoiceId($id) {
        $po = $this->db->get_where("invoice", ["id" => $id])->result_array()[0];
        $poid = $po["po_id"];

        $inv = $this->db->get_where("purchase_order", ["id" => $poid])->result_array()[0];
        $vid = $inv["vendor_id"];

        return $this->db->get_where("vendors", ["id" => $vid])->result_array()[0];
    }

    public function getPOidByInvoiceId($id) {
        $po = $this->db->get_where("invoice", ["id" => $id])->result_array()[0];
        return $po["po_id"];
    }
    
        public function getINVidByPOId($id) {
        $po = $this->db->get_where("invoice", ["po_id" => $id])->result_array()[0];
        return $po["id"];
    }

    public function changeStatus($id, $data) {
        $this->db->where("id", $id);
        return $this->db->update("invoice", $data);
    }
    
    public function getInvoiceById($id) {

        $this->db->select("invoice.*, purchase_order.id, purchase_order.vendor_id, vendors.vendor_name");
        $this->db->from("invoice")
        ->join('purchase_order', 'purchase_order.id = invoice.po_id')
        ->join('vendors', 'purchase_order.vendor_id = vendors.id');
        $this->db->where("invoice.id", $id);
        return $this->db->get()->result_array();
    }
    
    public function getVendorAdminEmails($id) {
        $this->db->select("purchase_order.created_by, purchase_order.vendor_id, vendors.vendor_email, users.email");
        $this->db->from("purchase_order")
        ->join('users', 'purchase_order.created_by = users.id')
        ->join('vendors', 'purchase_order.vendor_id = vendors.id');
        $this->db->where("purchase_order.id", $id);
        return $this->db->get()->result_array()[0];
    }

    public function getOrdersById($id) {
        return $this->db->get_where("invoice_orders", array("inv_id" => $id))->result_array();
    }


    public function deleteInvoice($id) {
        $this->db->where('id', $id);
        $this->db->delete('invoice');

        $this->db->where('inv_id', $id);
        return $this->db->delete('invoice_orders');
    }

    public function updateInvoiceSlip($data, $id, $data2) {
        $this->db->where('po_id', $id);
        $this->db->update('invoice', $data);

        $this->db->where('po_id', $id);
        $this->db->update('po_timeline', $data2);
        return true;
    }


}

?>