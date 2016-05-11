<?php 
class Vista
{
	var $data = array();
	
	function __construct()
	{
	}

	public function mostrar($archivo, $vars=array())
	{
		$ruta = './vista/' . $archivo;

		if (file_exists($ruta) == false){
			trigger_error('Plantilla ' .$ruta.' no existe.', E_USER_NOTICE);
			return false;
		}

		// Ver variables
		if (is_array($vars)){
			foreach ($vars as $key => $value)
			{
				$this->data[$key] = $value;
			}
		}
		// Incluimos la plantilla
		require_once($ruta);
	}
}
 ?>