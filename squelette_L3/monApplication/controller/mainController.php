<?php
/**
 * @Entity
 * @Table(name="jabaianb.utilisateur")
 **/
class mainController 
{
    private static $entityManager;
    private static $dbConnection;

    public function __construct($entityManager)
    {
        $dbConnection = dbconnection::getInstance();
        $this->entityManager = $dbConnection->getEntityManager();

        if ($this->entityManager === null) {
            throw new Exception('EntityManager is null. Check your dbconnection configuration.');
        }
        $_SESSION['logged'] = false;
        
    }


	public static function index($request,$context){
		
		return context::SUCCESS;
	}

    //test application
	public static function superTest($request,$context)
	{
		$context->param1 = $request['param1'];
		$context->param2 = $request['param2'];

		return context::SUCCESS;
		
	}

    public function defaultAction($request, $context)
    {

        $context->notification = "Default action! Log out!";
        $context->notificationType = 'error';
        $context->warning = "This is a warning!";

        return context::SUCCESS;
    }



    public static function printUtilisateurs($request, $context)
    {
        $id = 1;
        $users = utilisateurTable::getUserById($id);
        $context->user = $users;
        return context::SUCCESS;
    }
  

    public static function printVoyages($request, $context)
    {
        $voyages = voyageTable::getAllVoyages();

        if ($voyages !== null && is_array($voyages)) {

            $context->voyage = $voyages;
            return context::SUCCESS;
        } else {

            $context->voyage = $voyages;
            return context::ERROR;
        }
    }

    public static function printTrajets($request, $context)
    {

        $trajets = trajetTable::getAllTrajets();

        if ($trajets !== null && is_array($trajets)) {
            $context->trajet = $trajets;
            return context::SUCCESS;

        } else {
            $context->trajet = $trajets;
            return context::ERROR;
        }
    }


    public static function printReservations($request, $context)
    {

        $reservations = reservationTable::getAllReservations();

        if ($reservations !== null && is_array($reservations)) {

            $context->reservation = $reservations;
            return context::SUCCESS;
        } else {
            $context->reservation = $reservations;
            return context::ERROR;
        }
    }

    public static function testGetTrajet($request, $context)
    {
        $depart = 'Angers';
        $arrivee = 'Amiens';

        $trip = trajetTable::getTrajet($depart, $arrivee);

        if ($trip !== null) {

            $context->result = $trip;
            return context::SUCCESS;
        } else {

            $context->result = $trip;
            return context::ERROR;
        }

    }

    public static function testGetVoyageById($request, $context)
    {
        
        $voyageIdToTest = 2;

        $voyage = voyageTable::getVoyageById($voyageIdToTest);

        if ($voyage !== null) {

            $context->result = $voyage;
            return context::SUCCESS;

        } else {

            
            return context::ERROR;
        }
    }

    public static function testGetUserById($request, $context)
    {
            // Retrieve userId from the request
            $userId = 1;
            $user = utilisateurTable::getUserById($userId);

            if ($user != null) {
                $context->result = $user;
                return context::SUCCESS;
               
            } 
            else
            {
                return context::ERROR;
            }

    }
    
    public static function testGetVoyagesByTrajet($request, $context)
    {
        $trajet = trajetTable::getTrajetById(1);

        $voyages = VoyageTable::getVoyageByTrajet($trajet);

        $context->result = $voyages;
        return context::SUCCESS;

    }
    
    public static function testGetReservationByVoyage($request, $context)
    {
        $voyage = VoyageTable::getVoyageById(3);     
        
        $reservations = ReservationTable::getReservationByVoyage($voyage);
        
        $context->result = $reservations;
        return context::SUCCESS;
    }


    public static function processForm($request, $context)
    {
        $depart = $request['departure'];
        $arrivee = $request['arrival'];
        $places = $request['places'];
                
        $trip = trajetTable::getTrajet($depart, $arrivee);   

        if ($trip != null) {
            $voyages = voyageTable::getVoyageByTrajet($trip);

            if (!empty($voyages)) {  
                $context->result = $voyages;
                $context->places = $places;
                return context::SUCCESS;
            }
        }

        return context::ERROR;
    }

    public static function processLogin($request, $context)
    {
        $username = $request['username'];
        $password = $request['password'];
    
        $user = utilisateurTable::getUserByLoginAndPass($username, $password);
       
        if ($user !== null) {
            $context->result = "Login successful!";
            //set that i am logged in
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userID']= utilisateurTable::getUserID($username, $password);

            $context->notification = 'Logged in successfully!';            

            return context::SUCCESS;
        } else {
            $context->result = "Login failed!";
            //$context->notification = 'Login failed';
            return context::ERROR;
        }

    }

    public function processRegistration($request, $context)
    {
        // Using SQL directly
        $query = "INSERT INTO jabaianb.utilisateur (identifiant, pass, nom, prenom, avatar) VALUES (?, ?, ?, ?, ?)";

            // Get the EntityManager instance from dbconnection
            $entityManager = dbconnection::getInstance()->getEntityManager();
    
            // Check if $entityManager is not null
            if ($entityManager !== null) {
                // Retrieve values from the form
                //if i don't use this i ll get the error that the values are too long
                $username = substr($request['username'], 0, 45);
                //$password = substr(password_hash($request['password'], PASSWORD_DEFAULT), 0, 45);
                $password = substr(sha1($request['password']), 0, 45);
                $lastname = substr($request['lastname'], 0, 45);
                $firstname = substr($request['firstname'], 0, 45);
                $avatar = substr($request['avatar'], 0, 45);
    
                // Execute the statement with the form values
                $entityManager->getConnection()->executeUpdate($query, [
                    $username,
                    $password,
                    $lastname,
                    $firstname,
                    $avatar
                ]);
    

            }

    }
        
    public static function viewMyTrips($request, $context)
    {
        echo "hello";
    }

    public static function printMyReservation($request, $context) {
        if(($_SESSION['logged']) ===true){
        $user = utilisateurTable::getUserById($_SESSION['userID']);
        $reservedTrips = reservationTable::getReservationByUser($user);
    
        if ($reservedTrips != null && is_array($reservedTrips)) {
            $allVoyages = []; // store all voyage details
    
            foreach ($reservedTrips as $reservation) {
                $voyageId = $reservation->voyage->id;
                $voyageDetails = voyageTable::getVoyageById($voyageId);
    
                if ($voyageDetails != null) {
                    // add voyages to array
                    $allVoyages[] = $voyageDetails;
                }
            }
    
            // send the array of voyage details to the context
            $context->allVoyages = $allVoyages;
            return context::SUCCESS;
        } else {
            $context->reservedTrips = $reservedTrips;
            return context::ERROR;
        }
        }

        if(($_SESSION['logged']) ===false ) //if the user is not logged in i don't need to access his reserved trips
        {
            $context->reservedTrips = null;
            return context::ERROR;
        }
    }
    

    public static function processReservation($request, $context)
    {
        $tripId = intval(substr($request['tripId'], 0, 45));
        $places = intval(substr($request['places'], 0, 45));
   
        $voyage = voyageTable::getVoyageById($tripId);
    
        // Check if the voyage exists
        if (!$voyage) {
            echo json_encode(['success' => false, 'message' => 'Voyage not found']);
            return;
        }
    
        // Check if there are enough available places
        if ($voyage->nbPlace < $places) {
            echo json_encode(['success' => false, 'message' => 'Not enough available places']);
            return;
        }
        $entityManager = dbconnection::getInstance()->getEntityManager();
        if ($entityManager !== null) {
            try {
                // Update the nbPlace value directly in the voyage object
                $voyage->nbPlace -= $places;
    
                $query = "UPDATE jabaianb.voyage SET nbPlace = ? WHERE id = ?";
                $entityManager->getConnection()->executeUpdate($query, [
                    $voyage->nbPlace, $tripId
                ]);

                //----------------------------INSERT INTO THE RESERVATION IN THE TABLE--------------------------------------
                $query = "INSERT INTO jabaianb.reservation (voyage, voyageur) VALUES (?, ?)";
                $entityManager->getConnection()->executeUpdate($query, [
                    $voyage->id, $_SESSION['userID']
                ]);
                

                return context::SUCCESS;
    
            } catch (\Exception $e) {
                // Log or echo the exception message for debugging
                error_log('Exception: ' . $e->getMessage() . ' SQL Query: ' . $query);
                echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
                return;
            }
        }
       
    }

    public static function processProposal($request, $context)
    {
        $departure = substr($request['departure'], 0, 45);
        $arrival = substr($request['arrival'], 0, 45);
        $departureTime = (int)($request['departureTime']);
        $distance = (int)($request['distance']);
        $availableSeats = (int)($request['availableSeats']);
        $farePerKm = (int)($request['farePerKm']);
        $additionalComments = substr($request['additionalComments'], 0, 500);

        //echo $departure;
        $entityManager = dbconnection::getInstance()->getEntityManager();
        // Check if $entityManager is not null
        if ($entityManager !== null) {
            try {

                // INSERT INTO VOYAGE TABLE
                $trajetId = trajetTable::getId($departure, $arrival);
                $voyageQuery = "INSERT INTO jabaianb.voyage (conducteur, trajet, tarif, nbPlace, heureDepart, contraintes) 
                                VALUES (?, ?, ?, ?, ?, ?)";   
                $userID = $_SESSION['userID'];
                var_dump($userID);
                $entityManager->getConnection()->executeUpdate(
                    $voyageQuery,
                    [$userID, $trajetId, $farePerKm, $availableSeats, $departureTime, $additionalComments] 
                );
                $trajet = trajetTable::getTrajet($departure, $arrival);
                if($trajet != null){ 
                return context::SUCCESS;
                
                }
                else {
                 
                return context::ERROR;
                }
            } catch (Exception $e) {
                // Handle exceptions, log errors, or redirect to an error page
                echo "Error: " . $e->getMessage();
            }
        }
    }



    public static function logout()
    {
        $_SESSION['logged'] = false;
        unset($_SESSION['userID']);
        unset($_SESSION['username']);
        unset($_SESSION['logged']);
        return context::SUCCESS;

    }

    public static function test()
    {
        // In your PHP file handling the AJAX success
        $response = array(
        'status' => 'success',
        'message' => 'Your notification message here'
        );

    }

    public static function login()
    {
        return context::SUCCESS;
    }

    public static function registration()
    {
        return context::SUCCESS;
    }
    public static function proposeTrip()
    {
        return context::SUCCESS;
    }

    public static function searchTrips($request, $context) {
    // Example usage
    $depart ="Vichy";
    $firstArrival = "Amiens";
    $voyages = voyageTable::search($depart, $firstArrival, []);
    $context->result = $voyages;
    return context::SUCCESS;
 
    }
    






    
    
    
        
}