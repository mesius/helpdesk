<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

        /*public function __construct()*/
        public function __construct()
        {
                $this->load->database();
        }

        function get_all(){

        	//$this->load->database();
			$query = $this->db->get('users');
			return $query->result();

        }

        function get_by_id($id) {

        	$this->load->database();
			$query = $this->db->where('user_id',$id);
			$query = $this->db->get('users');
			return $query->result();
        }

        function add($data){

        	//$data = $this->input->post();
        	unset($data['btn_send']);
        	$this->db->insert('users', $data);

        	return $this->db->insert_id();
        }

}