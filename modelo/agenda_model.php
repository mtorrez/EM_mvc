<?php
require_once('DB_model.php');
/**
* 
*/
class Agenda_model extends DB_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = "contactos";
	}
}
?>