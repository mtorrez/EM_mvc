<?php 
require_once('./modelo/agenda_model.php');
require_once('./vista/vista.php');

class Agenda_controlador
{
	var $modelo;
	var $vista;

	function __construct()
	{
		$this->modelo = new agenda_model();
		$this->vista = new vista();
	}

	public function index()
	{
		$data = array();
		$data['titulo'] = 'Mi pagina Web';
		$data['contactos'] = $this->modelo->get_all();

		$this->vista->mostrar('agenda/index.php',$data);
	}

	public function editar($id=''){
		if (isset($_POST['id'])){
			$data = array(
				"nombre" => "'".$_POST['nombre']."'",
				"telefono" => "'".$_POST['telefono']."'",
				"correo" => "'".$_POST['correo']."'" );

			if ($_POST['id']) {
				$this->modelo->update($_POST['id'], $data);
			}
			else {
				$this->modelo->insert($data);
			}
			header("Location: index.php");
		}
		else {
			$data = array();
			$data['item']['id'] = '';
			$data['item']['nombre'] = '';
			$data['item']['telefono'] = '';
			$data['item']['correo'] = '';
			if ($id){
				$data['item'] = $this->modelo->get_by($id);
			}
			
			$data['titulo'] = 'Mi pagina Web';
			$this->vista->mostrar('agenda/edit.php',$data);
		}
	}

	public function eliminar($id='')
	{
		$this->modelo->delete($id);
		header("Location: index.php");
	}
}
?>