<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pay_completed'))
{
    function pay_completed()
    {
        $ci =& get_instance();
        $ci->load->database();
        $payarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 1, "po_file" => 1, "po_payment" =>1);
        $res = $ci->db->get_where('po_timeline', $payarr)->result_array();
        return count($res);
    }
    
    function pay_pending()
    {
        $ci =& get_instance();
        $ci->load->database();
        $payarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 1, "po_file" => 1, "po_payment" =>0);
        $res = $ci->db->get_where('po_timeline', $payarr)->result_array();
        return count($res);
    }
    
    function hr_pending()
    {
        $ci =& get_instance();
        $ci->load->database();
        $payarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 0, "po_admin" => 0, "po_file" => 0, "po_payment" =>0);
        $res = $ci->db->get_where('po_timeline', $payarr)->result_array();
        return count($res);
    }
    
    function admin_pending()
    {
        $ci =& get_instance();
        $ci->load->database();
        $payarr = array("po_acknowledgement" => 1, "po_invoice" => 1, "po_hr" => 1, "po_admin" => 0, "po_file" => 0, "po_payment" =>0);
        $res = $ci->db->get_where('po_timeline', $payarr)->result_array();
        return count($res);
    }
}