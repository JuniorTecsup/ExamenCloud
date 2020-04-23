<?php
	class Database{
		private $con;
		private $dbhost="ocvwlym0zv3tcn68.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
		private $dbuser="hba90vutj8x99kac";
		private $dbpass="np0qawe93yjdcgld";
		private $dbname="b83b60bwal8v2w60";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico){
	$sql = "Insert into clientes (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
	        $res = mysqli_query($this->con, $sql);
	    if($res){
	        return true;
	    }else{
	        return false;
        }
    }
?>