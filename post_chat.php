<?php
session_start();
try{
	include('connexion.php');
	if(isset($_POST['pseudo']) && $_POST['pseudo']!='' && isset($_POST['message']) && $_POST['message']!=''){
	  $pseudo = $_SESSION['pseudo'] = htmlentities(strip_tags($_POST['pseudo']),ENT_QUOTES | ENT_IGNORE, "UTF-8");
	  $message = htmlspecialchars(strip_tags($_POST['message']),ENT_QUOTES | ENT_IGNORE, "UTF-8");
	}else{
	 header('location:index.php?err=chp');
	}

	$rep2 = $bd->prepare("INSERT INTO mchat(pseudo, message, date_jour) VALUES(?,?,?)");
	$rep2->execute(array($pseudo, $message, date('Y-m-d H:i:s')));

	header('location:index.php');
}catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
?>
