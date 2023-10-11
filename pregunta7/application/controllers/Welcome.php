<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('persona');
	}
	public function index()
	{	$datos['personas'] = $this->persona->seleccionar_todo();
		//var_dump($datos);
		$this->load->view('welcome_message',$datos);

	}

	public function agregar() {
		$persona['ci'] = $this->input->post('ci');
		$persona['nombre_completo'] = $this->input->post('nombre_completo');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$persona['telefono'] = $this->input->post('telefono');
		$persona['departamento'] = $this->input->post('departamento');
		
		$this->persona->agregar($persona);
		redirect('welcome');
	}

	public function eliminar($ci_persona) {
		$this->persona->eliminar($ci_persona);
		redirect('welcome');
	}

	public function editar($ci_persona) {
		$persona['ci'] = $this->input->post('ci');
		$persona['nombre_completo'] = $this->input->post('nombre_completo');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		$persona['telefono'] = $this->input->post('telefono');
		$persona['departamento'] = $this->input->post('departamento');
		$this->persona->actualizar($persona,$ci_persona);
		redirect('welcome');
	}
}
