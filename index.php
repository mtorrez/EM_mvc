<?php
require_once('controlador/agenda.php');

$main = new agenda_controlador();

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
$id = isset( $_GET['id'])?$_GET['id'] : '';

switch($action){
	case 'nuevo':
		$main->editar();
		break;
	case 'editar':
		$main->editar($id);
		break;
	case 'eliminar':
			$main->eliminar($id);
			break;		
	case 'listar':
		$main->index();
        break;
}
?>
