<?php
session_start();
include('connexion.php');
$rep = $bd->query("SELECT * FROM mchat ORDER BY date_jour DESC LIMIT 0, 5");
if(isset($_GET['err']) && $_GET['err'] != null){
 $err='<p style="color:red;">L\'un des champs est vide, voir tous, veuillez les remplir !</p>';
}else
	$err='';
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8"> 
   <!-- MOOC PHP Semaine 3 -->
   <title>mini-chat</title>
   <link rel="stylesheet" media="screen" href="style.css"/>
 </head>
 <body>
  <section>
   <h1>Chat Mini !</h1>
   <div class="reponse">
   <?php
   	while($don=$rep->fetch()){
   	 echo '<p><span>'.date('d/m/Y H:i:s', strtotime($don['date_jour'])).'</span> <strong>'.$don['pseudo'].'</strong> :: <span>'.$don['message'].'</span></p>';
   	}
   	$rep->closeCursor();
   ?>	
   </div>
  </section>
  <section>
   <form method="post" action="post_chat.php" >
    <?= $err ?>
    <p>
     <label for="pseudo">Pseudo :
    	<?php 
    	  if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != NULL){
    	  	echo $_SESSION['pseudo']."<input type='hidden' value='".$_SESSION['pseudo']."' name='pseudo' />";
    	  	echo '<a href="chg_pseudo.php">Chang&eacute; de pseudo !</a>';
    	  }else
    	  	echo '<input type=text value="" name="pseudo"/>';
    	?>
     </label>
    </p>
    <p>
     <label for="message">Message :
    	<input type=text value="" name="message"/>
     </label>
    </p>
    <hr/>
    <p><input type="submit"/></p>
   </form>
  </section> 
 </body>
</html>
