<?php  

include('conex.php');

class Functions extends Conex
{
	public $con;
	public $session;
	public $session_tipo;
	
	function __construct()
	{
		$cn = new Conex();
		$this->con = $cn->newConex();
		$this->session = $_SESSION['user'];
	}

	public function verificarSession(){
		if (!isset($_SESSION["user"])) {
			header("Location: login");
		}else{
			return true;
		}
	}

	public function sessionDestroy(){
		unset($_SESSION["user"]);
		header("Location: login");
	}

	public function getRangoUser($id){
		$result = $this->con->query("SELECT tipo_usuario_id FROM usuario WHERE id = {$id}");
		$usr = $result->fetch_array(MYSQLI_ASSOC);

		$_SESSION["tipo_usuario"] = $usr["tipo_usuario_id"];

		$this->session_tipo = (int)$_SESSION['tipo_usuario'];
		return $this->session_tipo;

	}

	public function getNombre($id){
		$result = $this->con->query("SELECT user FROM usuario WHERE id = {$id}");
		$usr = $result->fetch_array(MYSQLI_ASSOC);

		return $usr['user'];
	}

	public function getIdSession(){
		return (int)$this->session;
	}

	public function getQuery($select, $from, $where = null, $order = null){

		$query = "SELECT {$select} FROM {$from}";
		if ($where != null) {
			$query .= " WHERE $where";
		}

		if ($where != null) {
			$query .= " ORDER BY $order";
		}
		
		$result = $this->con->query($query);
		$r[] = $result->fetch_array(MYSQLI_ASSOC);

		return $r;

	}
}
?>