<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
{
    $data = [];
    if (isset($_SESSION['error'])) {
        $data['error'] = $_SESSION['error'];
    } else {
        $data['error'] = "NO_ERROR";
    }
    
    $this->load->view('adminpanel/loginview', $data);
}


	public function login_post() {
		if (!empty($_POST)) {
			$username = $_POST['username'];
			$password = $_POST['password'];
	
			$query = $this->db->query("SELECT * FROM `backenduser` WHERE `username`='$username' AND `password`='$password'");
	
			if ($query->num_rows()) {
				// Credentials are valid
				$result = $query->result_array();
				$this->session->set_userdata('user_id', $result[0]['uid']);
				redirect('admin/dashboard');
			} else {
				// Invalid credentials
				$this->session->set_flashdata('error', 'Invalid Credentials');
				redirect("admin/login");
			}
		} else {
			die("Invalid Input!");
		}
	}
	

	function logout() {
		session_destroy();
	}

}
