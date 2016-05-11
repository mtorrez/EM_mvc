<?php 
class DB_Model
{
	var $host ='localhost';
	var $user ='root';
	var $pass ='';
	var $bdat ='bd_agenda';
	
	private $conn;
	public $table = '';
	protected $query;
	protected $rows = array();
	public $mensaje ='Procesado';

	public function __construct()
	{
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->bdat);
		if ($this->conn->connect_error){
		    die('Error de conexion');
		}
	}

	public function get_all()
	{
		$sql = "select * from ".$this->table;
		$result = $this->conn->query($sql);
		while ($fila = $result->fetch_assoc()){
			$this->rows[] = $fila;
		}
		return $this->rows;
	}

	public function get_by($id = null)
	{
		if ($id) $sql = "select * from ".$this->table." where id = ".$id;
		$result = $this->conn->query($sql);
		
		return $result->fetch_assoc();
	}

	public function ejecutar_query($sql)
	{
		$this->conn->query($sql);
	}	

	public function delete($id)
	{
		$sql = "delete from ". $this->table ." where id = ".$id;
		$this->ejecutar_query($sql);
	}

	public function update($id, $data)
	{
		$sql = "update ".$this->table." set ";
		foreach($data as $campo => $valor){
			$sql .= $campo ." = ".$valor.",";
		}
		$sql = substr($sql, 0, -1);
		$sql .= " where id = ".$id;

		$this->ejecutar_query($sql);
		return true;
	}

	public function insert($data)
	{
		$campos = "";
		$valores = "";

		foreach ($data as $c => $v) {
			$campos .= "$c,";
			$valores .= (is_numeric($v) && (intval($v) == $v)) ? $v."," : "$v,";
		}

		$campos = substr($campos,0, -1);
		$valores = substr($valores,0, -1);

		$sql = "insert into ".$this->table." (".$campos.") values (".$valores.")";	

		$this->ejecutar_query($sql);
		return true;
	}

	private function cerrar_conexion()
	{
		$this->conn->close();
	}
}
 ?>