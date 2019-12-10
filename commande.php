<?PHP

class Commande{
	private $id;
	private $prix;
	private $categorie;
	private $nom;
	private $etat ;
	private $user ; 
	function __construct($id,$nom,$categorie,$prix,$etat,$user){
		$this->id=$id;
		$this->nom=$nom;
		$this->categorie=$categorie;
		$this->prix=$prix;
		$this->etat=$etat;
		$this->user=$user;
	}
	
	function getid(){
		return $this->id;
	}
	function getuser(){
		return $this->user;
	}
	function getnom(){
		return $this->nom;
	}
	function getprix(){
		return $this->prix;
	}
	function getetat(){
		return $this->etat;
	}
	function getcategorie(){
		return $this->categorie;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function setuser($user){
		$this->nom=$nom;
	}
	function setetat($etat){
		$this->etat=$etat;
	}
	function setid($id){
		$this->id;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setcategorie($categorie){
		$this->$categorie=$$categorie;
	}
	
}

?>