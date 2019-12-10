<?php
include "../core/commandeC.php";
include "../entities/commande.php";
/*
!if (empty($_GET['nom']))
{
	
	<script type="text/javascript">
		alert ("nooooooon")
	</script>
	<?PHP
	echo "<META http-equiv='refresh' content='0;URL=index.html'>"
	?>;
}*/



if( isset($_GET['nom']) && isset($_GET['categorie']) && isset($_GET['prix']) )
{
	$f=0;
	$al= mt_rand ( 1000000 ,9999999 ) ;
$id=$al;
$nom=$_GET['nom'];
$categorie=$_GET['categorie'];
$prix=$_GET['prix'];
$user=$_GET['user'];
$etat=$f;


if( !empty($_GET['nom']) && !empty($_GET['categorie']) && !empty($_GET['prix']))
{
$c=new commande($id,$nom,$categorie,$prix,$etat,$user);
$commandeC=new CommandeC();

$commandeC->ajouterCommande($c);
	
 ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "ybenfarhat09@gmail.com";
    $to = "mohamedyoussef.benfarhat@esprit.tn";
    $subject = "Nouvelle commande";
    $message = "L'ID de votre commande est : ".$id;
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";


header('location:product.php') ;
}




}
?>