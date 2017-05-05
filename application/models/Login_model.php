<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_Model extends CI_Model {	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}
	public function validate($email, $password){
		$info = $this->db->query("SELECT * From user WHERE (email='$email' AND password='$password')")->result_array();
		return (count($info)>0)? $info[0]['status'] : -1; 
	}
	public function createSession($email, $newCode, $time){
		$this->db->query("INSERT INTO sessions (email, guid, status, dbtimestamp) VALUES ('$email', '$newCode', 'Active', '$time')");
	}
	public function admin($email){
		$detail = $this->db->query("SELECT * From user WHERE email='$email'")->result_array();
		return $detail[0]['admin'];
	}
	public function getName($email){
		$detail = $this->db->query("SELECT * From user WHERE email='$email'")->result_array();
		return ucwords(strtolower($detail[0]['name']));
	}
	public function getUserType($email){
		$detail = $this->db->query("SELECT * From user WHERE email='$email'")->result_array();
		return ($detail[0]['admin']==1)?"Administrator":"Guest";
	}
	public function idle($sessioncode){
		$detail = $this->db->query("SELECT * From sessions WHERE guid='$sessioncode'")->result_array();
		if (((time() - $detail[0]['dbtimestamp']) > 600) || ($detail[0]['status'] == 'Ended')){
			$this->db->query("UPDATE sessions SET status=\"Ended\" WHERE guid='$sessioncode'");
			return true;
		}else{
			return false;
		}
	}
	public function unsetSession($sessioncode){
		$this->db->query("UPDATE sessions SET status=\"Ended\" WHERE guid='$sessioncode'");
	}
	public function setSession($sessioncode, $time){
		$this->db->query("UPDATE sessions SET dbtimestamp=\"$time\" WHERE guid='$sessioncode'");
	}	
}