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

	public function getQuery($select, $from, $where, $order){

		$query = "SELECT {$select} FROM {$from}";
		if ($where != '') {
			$query .= " WHERE $where";
		}

		if ($where != '') {
			$query .= " ORDER BY $order";
		}
		
		return $query;
		$result = $this->con->query($query);
		$r[] = $result->fetch_array(MYSQLI_ASSOC);

		return $r;

	}

	public function getDonacionesMes(){
		$mes = date('m');

		$result = $this->con->query("SELECT d.user_id, ac.nombre, d.fecha_donacion, sum(d.monto) as monto
from donacion d join actividad ac on ac.id = d.actividad_id
where DATE_FORMAT(d.fecha_donacion, '%m') = $mes
group by d.actividad_id");
 		$result->fetch_array(MYSQLI_ASSOC);

		foreach ($result as $item) {
			$arr[] = $item;
		}
		

		return $arr;
	}

	public function doProyectadas(){
		$mes = date('m');

		$result = $this->con->query("SELECT sum(d.monto) as monto, d.fecha_donacion from donacion d join actividad act on d.actividad_id = act.id where DATE_FORMAT(d.fecha_donacion, '%m') > $mes group by DATE_FORMAT(d.fecha_donacion, '%m')");

		$meses_a_proyectar = 12 - (int)$mes;

		$result->fetch_array(MYSQLI_ASSOC);
		foreach ($result as $item) {
			$arr['donacion'][] = $item;
		}
		$arr['meses'][] = $meses_a_proyectar;
		return $arr;
	}

	public function getDonadores(){
		$result = $this->con->query("SELECT u.id, u.user, u.telefono, u.rut FROM usuario u JOIN donacion d ON d.user_id = u.id WHERE u.tipo_usuario_id = 3 GROUP BY u.id");
		$result->fetch_array(MYSQLI_ASSOC);
		foreach ($result as $item) {
			$arr[] = $item;
		}

		return $arr;
	}

	public function getDonacionesPorUsuario($id){
		$result = $this->con->query("SELECT sum(d.monto) as monto, act.nombre from usuario u join donacion d on d.user_id = u.id join actividad act on act.id = d.actividad_id where u.id = {$id} group by act.nombre");

		$result->fetch_array(MYSQLI_ASSOC);
		foreach ($result as $item) {
			$arr[] = $item;
		}

		return $arr;

	}
}
?>