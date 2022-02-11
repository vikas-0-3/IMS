<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {
    public function check_auth($userdata)
    {
        $user = $this->db->get_where('users', $userdata)->result_array();
        return $user;
    }

    public function addUserData($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function countPayment($arr) {
        return $this->db->get_where("po_timeline", $arr)->num_rows();
    }

    public function getAllUsers() {
        return $this->db->get_where("users")->result_array();
    }

    public function addUserPermissionData($data) {
        $this->db->insert('user_permission', $data);
        return true;
    }

    public function deleteUserData($id) {
        $this->db->where("id", $id);
        return $this->db->delete("users");
    }

    public function getPermissionOfUser($id) {
        return $this->db->get_where("user_permission", array("user_id" => $id))->result_array()[0];
    }
}

?>