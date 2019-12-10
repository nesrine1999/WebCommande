<?PHP
include "../config.php";
class CommandeC {
function afficherCommande ($commande){
		echo "id: ".$commande->getid()."<br>";
		echo "nom: ".$commande->getnom()."<br>";
		echo "prix: ".$commande->getprix()."<br>";
		echo "categorie: ".$commande->getcategorie()."<br>";
		echo "etat: ".$commande->getetat()."<br>";
		echo "user: ".$commande->getuser()."<br>";
	}
	
	function ajouterCommande($commande){
		$sql="insert into commande (id,nom,categorie,prix,etat,user) values (:id, :nom,:categorie,:prix,:etat,:user)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$commande->getid();
        $nom=$commande->getnom();
        $prix=$commande->getprix();
        $categorie=$commande->getcategorie();
        $etat=$commande->getetat();
         $user=$commande->getuser();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
$req->bindValue(':categorie',$categorie);
		$req->bindValue(':prix',$prix);
$req->bindValue(':etat',$etat);	
$req->bindValue(':user',$user);		
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

function afficherrechercher($id){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande where id=:id ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	


	function triercommande(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triercommandeNom(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triercommandeCategorie(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triercommandePrix(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY prix";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triercommandeEtat(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY etat";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function triercommandeUser(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande ORDER BY user";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}



	function supprimerCommande($nom){
		$sql="DELETE FROM commande where nom= :nom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom',$nom);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	
	function modifiercommande($commande,$id)
	{

		 $sql="UPDATE commande SET nom=:nom, prix=:prix, categorie=:categorie,etat=:etat ,user=:user WHERE id=:id";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		$id=$commande->getid();
		$nom=$commande->getnom();
        $prix=$commande->getprix();
         $user=$commande->getuser();
        $etat=$commande->getetat();
        $categorie=$commande->getcategorie();
		$datas = array(':id'=>$id,':nom'=>$nom,':categorie'=>$categorie,':prix'=>$prix,':etat'=>$etat,':user'=>$user);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);	
		$req->bindValue(':categorie',$categorie);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':user',$user);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
	}

	function recupererCommande($id){
		$sql="SELECT * from commande where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function getid($id){
		$sql="SELECT * from commande where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/*function rechercherListeCommandes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/


function recupereruser($user){
		$sql="SELECT * from commande where user='$user'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

}
?>