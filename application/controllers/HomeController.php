<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class HomeController extends CI_Controller {
	public function index (){
		if(!isset($_SESSION['id'])){
			redirect('LoginController/index');
		}
		$this->load->model('Functions');
		$data['category'] = $this->Functions->category();
        $this->load->view('Home',$data);
    }		
}