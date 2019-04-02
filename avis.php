<?php 
include "../config.php";

class avisc
{
	

	function ajouteravis($avis){

$sql="insert into avis (username,prenom,note,message,etat,vu,reponse) values (:username,:prenom,:note,:message,etat,vu,reponse)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $username=$avis->username;
        $prenom=$avis->getprenom();
        $message=$avis->getMessage();
        $note=$avis->getnote();
		

		$req->bindValue(':username',$username);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':message',$message);
		$req->bindValue(':note',$note);
		

            $req->execute();    
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

// function afficheravis($username){
// 		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
// 		$sql="SElECT * From avis where username='".$username."' AND (etat=1 or vu=0 or vu=1) ";
// 		$db = config1::getConnexion();
// 		try{
// 		$liste=$db->query($sql);
// 		return $liste;
// 		}
//         catch (Exception $e){
//             die('Erreur: '.$e->getMessage());
//         }	
// 	}

	function afficheravis(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From avis where  etat=1 or vu=0 or vu=1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
function modifierusername($avis,$username){
		$sql="UPDATE avis SET username=:usernamee WHERE username=:username";
	
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);!
		$usernamee=$avis->username;
		$datas = array(':usernamee'=>$usernamee, ':username'=>$username);
		$req->bindValue(':usernamee',$usernamee);
		$req->bindValue(':username',$username);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
		function recupereravis1($username){
		$sql="SELECT * from avis where username=$username";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

}

function supprimeravis($id_reclamation){
		$sql="DELETE FROM avis where id_avis= :id_reclamation";
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





function modifieravis($avis,$id_reclamation){
		$sql="UPDATE avis SET  reponse='aaa',etat=1 WHERE id_avis=:id_reclamation";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $reponse=$avis->reponse;

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



}
?>



