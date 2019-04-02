<?php
include "../config.php";

class ReclamationC
{
	

	function ajouterReclamation($reclamation){

$sql="insert into reclamation (username,sujet,message) values (:username,:sujet,:message)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $username=$reclamation->getUsername();
        $sujet=$reclamation->getSujet();
        $message=$reclamation->getMessage();


		$req->bindValue(':username',$username);
		$req->bindValue(':sujet',$sujet);
		$req->bindValue(':message',$message);

            $req->execute();    
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}


	function afficherReclamation(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

		function supprimerReclamation($id_reclamation){
		$sql="DELETE FROM reclamation where id_reclamation= :id_reclamation";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_reclamation',$id_reclamation);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}




	function modifierReclamation($reclamation,$id_reclamation){
		$sql="UPDATE reclamation SET  reponse=:reponse,etat=1 WHERE id_reclamation=:id_reclamation";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $reponse=$reclamation->getReponse();

		//$datas = array(':cin'=>$cin, ':email'=>$email,':username'=>$username,':password'=>$password,':tel'=>$tel,':adress'=>$adress);
		$req->bindValue(':id_reclamation',$id_reclamation);
		$req->bindValue(':reponse',$reponse);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  // echo " Les datas : " ;
  //print_r($datas);
        }
		
	}




	function recupererReclamation($id_reclamation){
		$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

}
public static function notificationsReclamation(){
		$db = config::getConnexion();
		
       $result = $db->query("SELECT COUNT(*) as NbNews FROM reclamation where vu=0");
       $donnees = $result->fetch();
        return $donnees;
    }
       public static function updateEtatN()
    {
      $db = config::getConnexion();
      $r = $db->query("UPDATE reclamation set vu=1 ");
     
    }


}

?>



