<?php

require_once "voyage.class.php";

class VoyageTable
{
    //ATTRIBUTES:
    private $entityManager;
    private $dbConnection;

    //CONSTRUCT
    public function __construct()
    {
        $dbConnection = dbconnection::getInstance();
        $this->entityManager = dbconnection::getInstance()->getEntityManager() ;

        if ($this->entityManager === null) {
            throw new Exception('EntityManager is null. Check your dbconnection configuration.');
        }
    }
    
    //METHODS:
    public static function getAllVoyages()
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $voyages = $voyageRepository->findAll();
  
        return $voyages;
    }

    public function saveVoyage(Voyage $voyage)
    {
        $this->entityManager->persist($voyage);
        $this->entityManager->flush();
        return $voyage->getId();
    }

    public static function getVoyageById($id)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        $voyageRepository = $entityManager->getRepository(Voyage::class);
        $voyage = $voyageRepository->findOneBy(['id' => $id]);

        return $voyage;
    }


    public static function getVoyageByTrajet($trajet)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        $voyageRepository = $entityManager->getRepository(Voyage::class);

        $trajetId = $trajet->id;
        $voyages = $voyageRepository->findBy(['trajet' => $trajetId]);

        return $voyages;
    }
    public static function getVoyageByTrajetId($trajetId)
    {
        $entityManager = dbconnection::getInstance()->getEntityManager();

        $voyageRepository = $entityManager->getRepository(Voyage::class);

        $voyages = $voyageRepository->findBy(['trajet' => $trajetId]);

        return $voyages;
    }

    public static function getCorrespondance($trajet, $places){
    $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
      $query   =   $em->prepare('select   *   from   find_corresponding_trips(departure_city VARCHAR(50),
      arrival_city VARCHAR(50),
      places_needed INT)');
      $query = "SELECT * FROM find_corresponding_trips('{$trajet->depart}', '{$trajet->arrivee}',$places );";

      $bool = $query->execute();
      if ($bool == false){
      return NULL;
      }
      return $query->fetchAll(); // retourne un tableau d'enregistrements (tableau de tableaux de valeurs)
    }

    public static function search($depart, $firstArrival, $voyageArray) {
        // Check if the current departure city matches the initial arrival city
        if ($depart == $firstArrival) {
            return $voyageArray;
        } else {
            $entityManager = dbconnection::getInstance()->getEntityManager();
    
            // Use parameterized query to prevent SQL injection
            $query = "SELECT * FROM jabaianb.trajet WHERE depart = :depart";
            $params = ['depart' => $depart];
    
            // Use fetchAll to get results from SELECT query
            $results = $entityManager->getConnection()->fetchAll($query, $params);
    
            foreach ($results as $result) {
                $nextDeparture = $result['arrivee']; // Access column using array notation
    
                // Check if the next departure city is the specified arrival city
                if ($nextDeparture == $firstArrival) {
                    // This trip leads to the final arrival, add it to the voyageArray
                    $voyageArray[] = $result;
                } else {
                    // Continue the recursion only if the next departure is not the final arrival
                    $voyageArray = self::search($nextDeparture, $firstArrival, $voyageArray);
                }
            }
    
            return $voyageArray;
        }
    }
    
    
    
  




}
