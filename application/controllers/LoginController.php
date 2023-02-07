<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class LoginController extends CI_Controller {

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
		$this->load->view('Login');
	}		
	
	public function connexion (){
		$mail = $this->input->post('mail');
        $mdp = $this->input->post('password');
        $this->load->model('Functions');
        $membre = $this->Functions->connexion($mail);
		$_SESSION['id'] = $this->Functions->getId($mail);

		if(isset($_SESSION['id'])){
			if($membre['mail'] == $mail && $membre['mdp'] == $mdp){
				if($membre['id']==0){
					redirect('adminController/index');	
				}else
				redirect('HomeController/index');
				}
			}
		
 		if($mail == null || $mdp == null){
			redirect('LoginController/index?mail='.$mail.'&mdp='.$mdp);
		} else{
			if($membre['mail'] != $mail){
				redirect('LoginController/index?mailError');
			} else if($membre['mdp'] != $mdp){
				redirect('LoginController/index?Mdperror&id='.$_SESSION['id']['id']);
			}
			redirect('LoginController/index');
        }
    }

	public function forgotPassword(){
		$this->load->view('recupererMdp');
	}

	public function resetPassword(){
		$mdp = $this->input->post('password');
		$mdp2 =  $this->input->post('confirmation');
		
		$this->load->model('Functions');
		$id = $_SESSION['id']['id'];
		if($mdp == $mdp2){
			$this->Functions->updatePassword($id,$mdp);
		}
	}

	public function deconnexion(){
		session_start();
		session_destroy();
		redirect('LoginController/index');
	}

}
