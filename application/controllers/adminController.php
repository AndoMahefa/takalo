<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class adminController extends CI_Controller {
	public function index (){
		if(!isset($_SESSION['id'])){
			redirect('LoginController/index');
		}
        $this->load->view('pageAdmin');
    }		
}