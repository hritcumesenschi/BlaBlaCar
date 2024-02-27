<?php

// Reservation.php (in the model folder)
require_once "reservation.class.php";

/**
 * @Entity
 * @Table(name="jabaianb.reservation")
 **/
class ReservationTable
{
    public static function getReservationByVoyage($voyage)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        $reservationRepository = $entityManager->getRepository(Reservation::class);
        $voyageId = $voyage->id;

        $reservations = $reservationRepository->findBy(['voyage' => $voyageId]);

        return $reservations;
    }

    public static function getReservationByUser($utilisateur)
    {
        try {
            $entityManager = dbconnection::getInstance()->getEntityManager();
            $reservationRepository = $entityManager->getRepository(Reservation::class);
            $userId = $utilisateur->id;
    
            $reservations = $reservationRepository->findBy(['voyageur' => $userId]);
            
            return $reservations;
        } catch (\Exception $e) {
            // Log or handle the exception appropriately
            error_log('Exception: ' . $e->getMessage());
            return null;
        }
    }
    
    public static function getAllReservations()
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservations = $reservationRepository->findAll();
  
        return $reservations;
    }
}

?>
