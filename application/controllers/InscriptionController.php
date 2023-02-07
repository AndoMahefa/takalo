<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InscriptionController extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		$this->load->view('Inscription');
	}		
	public function insert(){
        $nom = $this->input->post('nom');
        $mail = $this->input->post('mail');
        $mdp = $this->input->post('password');
        $this->load->model('Functions');
        $this->Functions->inscription($nom,$mail,$mdp);
        redirect('LoginController/index');
	}
}
