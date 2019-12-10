<?PHP
include "../core/commandeC.php";
$commandeC=new CommandeC();
if (isset($_POST["nom"])){
	
	$commandeC->supprimerCommande($_POST["nom"]);
    header('Location: shoping-cart.php');

}

?>


