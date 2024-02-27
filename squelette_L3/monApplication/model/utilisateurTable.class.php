<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass)
	{
  	$em = dbconnection::getInstance()->getEntityManager() ;

    $userRepository = $em->getRepository('utilisateur');
    $user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
    
    if ($user == false){
      echo 'Erreur sql';
    }
    return $user; 
    
	}


  public static function getUserById($id)
  {
      try {
          $em = dbconnection::getInstance()->getEntityManager();
  
          $userRepository = $em->getRepository('utilisateur');
          $user = $userRepository->findOneBy(['id' => $id]);
  

  
          if ($user == null) {
              // User not found
              return null;
          }
  
          return $user;
      } catch (\Exception $e) {
          echo 'Exception: ' . $e->getMessage();
          return null;
      }
  }

  public static function getAllUsers()
  {
      $em = dbconnection::getInstance()->getEntityManager();
      $userRepository = $em->getRepository('utilisateur');
      $users = $userRepository->findAll();

      return $users;
  }



  public static function getUserID($username, $password)
  {
    try {
        $em = dbconnection::getInstance()->getEntityManager();

        $userRepository = $em->getRepository('utilisateur');
        $user = $userRepository->findOneBy(array('identifiant' => $username, 'pass' => sha1($password)));

        //$user = $userRepository->findOneBy(['username' => $username, 'password' => $password]);

        if ($user == false){
          echo 'Erreur sql';
        }
        return $user->id; 

    } catch (\Exception $e) {
        echo 'Exception: ' . $e->getMessage();
        return null;
    }
  }

  public static function loggedIn()
  {

  }


  

 
}


?>
