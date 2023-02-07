<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class insertObjetController extends CI_Controller {
	public function index (){
        $this->load->model('Functions');
		$data['category'] = $this->Functions->category();
        $this->load->view('insertObjet',$data);
    }		

    public function insertObject(){
        $name = $this->input->post('nom');
        $descri = $this->input->post('description');
        $prix = $this->input->post('prix');
        $idCategory = $this->input->post('category');
        $files = $_FILES['files'];
        $this->load->model('Functions');
		$this->Functions->insertObjet($name,$descri,$prix,$idCategory,$_SESSION['id']['id']);
        $id = $this->Functions->Objet_getidbyNom($name);
        $this->Functions->uploadPhoto($files,$id['id']);
        redirect('homeController/index');
    }
}