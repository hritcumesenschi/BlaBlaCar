<?php

// Trajet.php (in the model folder)
require_once "trajet.class.php";
/**
 * @Entity
 * @Table(name="trajet")
 **/
class TrajetTable
{
    public static function getTrajetById($id)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        // Use the entity repository for the Voyage class
        $trajetRepository = $entityManager->getRepository(Trajet::class);

        $trajet = $trajetRepository->find($id);

        return $trajet;
    }

    public static function getAllTrajets()
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $trajetRepository = $em->getRepository('trajet');
        $trajets = $trajetRepository->findAll();
  
        return $trajets;
    }

    public static function getTrajet($depart, $arrivee)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        /** @var EntityRepository $trajetRepository */
        $trajetRepository = $entityManager->getRepository(Trajet::class);

        $trip = $trajetRepository->findOneBy(['depart' => $depart, 'arrivee' => $arrivee]);

        return $trip;
    }

    public static function getId($depart, $arrivee)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();
    
        /** @var EntityRepository $trajetRepository */
        $trajetRepository = $entityManager->getRepository(Trajet::class);
    
        $trip = $trajetRepository->findOneBy(['depart' => $depart, 'arrivee' => $arrivee]);
    
        if ($trip !== null) {
            return $trip->id;
        } else {
            return null; // Or throw an exception, log an error, etc.
        }
    }

    public static function getTripsFromCity($depart)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();
        $trajetRepository = $entityManager->getRepository(Trajet::class);
        $trips = $trajetRepository->findBy(['depart' => $depart]);

        return $trips;
    

    
    }
    






}
?>