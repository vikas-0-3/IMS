<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorModel extends CI_Model {


    public function addVendorsData($vendordata)
    {
        $this->db->insert('vendors', $vendordata);
        return $this->db->insert_id();
    }

    public function getAllVendors() {
        $this->db->select("*");
        $this->db->from("vendors");
        return $this->db->get()->result_array();
    }

    public function getVendorById($id) {
        return $this->db->get_where("vendors", array('id' => $id))->result_array()[0];
    }

    public function updateVendorsData($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update('vendors', $data);

    }

    public function deleteVendorsData($id) {
        $this->db->where('id', $id);
        return $this->db->delete('vendors');
    }

    public function getAllPurchase() {
        $this->db->select("*");
        $this->db->from("purchase_order");
        $this->db->where('vendor_id', $_SESSION["userdata"]["id"]);
        return $this->db->get()->result_array();
    }

    public function getVendorPOById($id) {
        return $this->db->get_where("purchase_order", array('vendor_id' => $id))->result_array();
    }

    public function getVendorInvoiceById($id) {
        return $this->db->get_where("invoice", array('po_id' => $id))->result_array();
    }

    public function getInvoiceCountDataById($arr) {
        // $this->db->where_in('po_id', $arr);

        $this->db->from("purchase_order");
        $total = $this->db->where_in(array('po_id', $arr))->get()->num_rows();
        $this->db->from("purchase_order");
        $accept = $this->db->where_in(array('po_id', $arr, "status" => "ACCEPT"))->get()->num_rows();
        $this->db->from("purchase_order");
        $reject = $this->db->where_in(array('po_id', $arr, "status" => "REJECT"))->get()->num_rows();
        $this->db->from("purchase_order");
        $pending = $this->db->where_in(array('po_id', $arr, "status" => "PENDING"))->get()->num_rows();
        $this->db->from("purchase_order");
        $final = array("accept" => $accept, "reject" => $reject, "pending" => $pending, "total" => $total);
        return $final;
    }

    public function getPOCountDataById($id) {
        $accept = $this->db->get_where("purchase_order", array('vendor_id' => $id, "status" => "ACCEPT"))->num_rows();
        $reject = $this->db->get_where("purchase_order", array('vendor_id' => $id, "status" => "REJECT"))->num_rows();
        $pending = $this->db->get_where("purchase_order", array('vendor_id' => $id, "status" => "PENDING"))->num_rows();
        $total = array("accept" => $accept, "reject" => $reject, "pending" => $pending);
        return $total;
    }

}

?>