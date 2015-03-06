<?php
abstract class DATABASE{
	private $db;

	protected function exQuery($requet, $param = null){
		if($param == null){
			$resultat = $this->DB()->query($requet);
		}else{
			$resultat= $this->DB()->prepare($requet);
			$resultat->execute($param);
		}
		return $resultat;
	}

	private function DB(){
		$PDO_EXCEP=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		if($this->db == null){
			$this->bd = new PDO('mysql:host='.SRV.';dbname='.DB.';charset=utf8',USR,PWD, array($PDO_EXCEP);
		}
		return $this->db;
	}
}	
?>
