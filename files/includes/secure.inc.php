<?php 
require_once(WAY."/includes/autoload.inc.php");

/*
Procédure de connexion de la personne :
1)login.php --> appel le js qui donne au json le mot de passe et l'email
2)Le json regarde si l'email donné n'est pas 2 fois dans la base 
3)Appel la méthode check_login 
3)Check_login prends dans la base l'id de la personne et son mot de passe crypté avec l'email
4)Regarde si le password crypté dans la base correspond avec celui donné si oui return true 
5)Si c'est le cas check_login met en session l'id, l'email et la login_string
6)La login_string (crypté) en session = combinaison de l'ip du browser et du mot de passe crypté
7)La page sécure crée une personne avec son id en session --> la personne a son mot de passe crypté en session
8)Check_connect regarde si l'email la login string et l'id est en session
9)Regarde si le mot de passe crypté de la personne connectée et l'ip de son navigateur corresponds a la login_string en session
10)Déconnecte la personne en cas de problème 
*/

//print_r($_SESSION);
if(isset($_SESSION['id'])){
  $per =  new Personne($_SESSION['id']);

    if(!$per->check_connect()){
       session_destroy();
       header('Location: '.URL.'login.php');
       exit;
    }
}else{
     session_destroy();
     header('Location: '.URL.'login.php');
     exit;
}

if(!$per->check_aut($aut)){
   //session_destroy();
   header('Location: '.URL.'index.php');
   exit;
}

?>