<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	function __construct(){
		parent::__construct();
		
		$this->load->model('Admin_mod');
	}
	
	public function index(){
		$info['getVisibles']= $this->Admin_mod->getVisibles();
		#print_r($this->session); exit;
		$info["exisUser"]= (empty($this->session->userdata('usuario_id')) || $this->session->userdata('usuario_id') == '')? "vacio" : "registrado";
		
		$this->load->view('templates/header');
		$this->load->view('admin',$info);
		$this->load->view('templates/footer');
	}
	
	public function save(){
		$numVisibles= $this->input->post('totales');
		if(is_numeric($numVisibles)){
			$data= array(
				"totales"=>$numVisibles
			);
			$msj= $this->Admin_mod->setVisibles($data);
		}
		else{
			$msj=2;
		}
		//////////////////////////////////
		if($msj == 1){
			$resp= "success|Guardado exitosamente !";
		}
		elseif($msj == 2){
			$resp= "danger|Erro al guardar, verifica los datos introducidos.";
		}
		elseif($msj == 3){
			$resp= "danger|Erro al cargar los datos, o ID inexistente !";
		}
		//////////////////////////////////
		echo $info['msj']= $resp;
	}
	
	public function login(){
		$usr= $this->input->post('txtUsr');
		$psw= $this->input->post('txtPsw');
		
		if($usr == "test" && $psw == "test"){
			$this->session->set_userdata('usuario_id', 	"1");
			echo "success|Bienvenido";
		}
		else{
			echo "error|Usuario no valido";
		}
	}
	
	public function logout($salir){
		if($salir == "ok"){
			$this->session->unset_userdata('usuario_id');
		}
	}
}
