<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Konsulentpris extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->model('farm_model');
		$this->load->model('register_model', "reg");
		$this->load->model('login_model', "login");
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->helper('date');
	}
	public function index(){
		if (isset($_SESSION['sessioncode'])){
			//there is an active session
			if (isset($_REQUEST['email']) && isset($_REQUEST['password'])){				
				//remove current session
				$this->login->unsetSession($this->encrypt->decode($_SESSION['sessioncode']));
				$this->session->sess_destroy();
				//set new session credentials
				$credentials = array(
                   'email' => $this->encrypt->encode($_REQUEST['email']),
                   'password' => $this->encrypt->encode($_REQUEST['password']),                   
				);
				$this->session->set_userdata($credentials);	
				//redirect
				header("location: ".$this->config->base_url());	
			}else{			
				if ($this->login->idle($this->encrypt->decode($_SESSION['sessioncode']))){
					//remove current session
					$this->session->sess_destroy();
					if (isset($_REQUEST['slug'])){
						echo "auth";
						exit;
					}else{
						$this->showLogin("");
					}
				}else{
					//perform actions
					$this->login->setSession($this->encrypt->decode($_SESSION['sessioncode']), time());
					$this->userLogin($this->encrypt->decode($_SESSION['email']));
				}
			}
		}else{
			//there is no active session			
			if (isset($_SESSION['email'])){
				//there are credentials
				$this->validateLogin($this->encrypt->decode($_SESSION['email']), md5($this->encrypt->decode($_SESSION['password'])));
			}else{
				//there is no credentials				
				if (isset($_REQUEST['email']) && isset($_REQUEST['password'])){
					//set session credentials
					$credentials = array(
					   'email' => $this->encrypt->encode($_REQUEST['email']),
					   'password' => $this->encrypt->encode($_REQUEST['password']),                   
					);
					$this->session->set_userdata($credentials);	
					//redirect
					header("location: ".$this->config->base_url());
				}else{
					//there is no login details
					if (isset($_REQUEST['slug'])){
						echo "auth";
						exit;
					}else{
						$this->showLogin("");
					}		
				}	
			}
		}
	}
	private function validateLogin($email, $password){
		switch ($this->login->validate($email, $password)) {
			case 10:
				//valid user
				$newCode = uniqid();
				$session = array(
					'sessioncode' => $this->encrypt->encode($newCode),
	                'email' => $this->encrypt->encode($email),
	                'password' => $this->encrypt->encode($password),                   
				);
				$this->session->set_userdata($session);	
				$this->login->createSession($email, $newCode, time());
				$this->userLogin($email);
				break;
			case 0:
				//email not verified
				$this->session->sess_destroy();		
				$this->showLogin("<p>This email is not verified!</p>");
				break;			
			default:
				//invalid user	
				$this->session->sess_destroy();		
				$this->showLogin("<p>Username and password do not match!</p>");
				break;
		}
	}
	private function showLogin($message){
		$data['title'] = 'Agri-IS - User Login';
		$data['url'] = $this->config->base_url();
		$data['message'] = $message;
		$this->load->view('login', $data);		
	}
	private function userLogin($email){
		$data['url'] = $this->config->base_url();
		$data['name'] = $this->login->getName($email);
		$data['usertype'] = $this->login->getUserType($email);
		if ($this->login->admin($email)){
			$data['title'] = 'Konsulentpris - Admin | ';	
			$this->load->view('dashboard', $data);
		}else{
			$data['title'] = 'Konsulentpris -  | ';
			$this->load->view('dashboard', $data);
		}
	}
	public function about(){
		$data['url'] = $this->config->base_url();
		$this->load->view('about', $data);
	}
	public function logout(){		
		$this->session->sess_destroy();
		$this->showLogin("");
	}
	public function register(){
		if (isset($_REQUEST['postno'])){
			$data['name'] = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
			$data['email'] = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
			$data['password'] = isset($_REQUEST['password']) ? md5($_REQUEST['password']) : "";
			if ($this->reg->addUser($data)){
				header("location: ".$this->config->base_url());
			}else{ 
				header("location: ".$this->config->base_url()."register");
			}
		}else{
			$data['url'] = $this->config->base_url();
			$this->load->view('register', $data);
		}
	}	
}