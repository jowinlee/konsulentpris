<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_Model extends CI_Model {	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	public function addUser($data){
		return $this->db->simple_query("INSERT INTO user (name, email, password, admin, status) VALUES"
		 	."(".$this->db->escape($data['name']).", ".$this->db->escape($data['email'])
		 	.", '".$data['password']."', 0, 0)");
	}
}