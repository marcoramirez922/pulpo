<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
	
	public function index()
	{
		$info["Visibles"]	= $this->Admin_mod->getVisibles();
		$info["Autos"]		= $this->Admin_mod->getAutos($info["Visibles"][0]->totales);
		$info["Conductores"]= $this->Admin_mod->getConductores($info["Visibles"][0]->totales);
		$info["Clientes"]= $this->Admin_mod->getClientes($info["Visibles"][0]->totales);
		
		$info["exisUser"]= (empty($this->session->userdata('usuario_id')) || $this->session->userdata('usuario_id') == '')? "vacio" : "registrado";
		
		#print_r($info); exit;
		$this->load->view('templates/header');
		$this->load->view('inicio',$info);
		$this->load->view('templates/footer');
	}
}
