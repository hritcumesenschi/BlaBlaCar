<?php

//nom de l'application
$nameApp = "monApplication";

//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
$action =  $_REQUEST['action'];

require_once 'lib/core.php'; 
require_once $nameApp.'/controller/mainController.php'; 

foreach(glob($nameApp.'/model/*.class.php') as $model)
    include_once $model ;   

    // Set session lifetime to 30 minutes
session_set_cookie_params(1800);
session_start();



$context = context::getInstance();
$context->init($nameApp);

$view=$context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false)
{
    $context->error =  "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
    $template_view=$nameApp."/view/".$action.$view.".php";
    include($nameApp."/layout/".$context->getLayout().".php");
}
//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE)
{
    $template_view=$nameApp."/view/".$action.$view.".php";
    if($action !="printMyReservation" && $action!="processReservation"&& $action!="login" &&
    $action!="registration"&& $action!="proposeTrip"&& $action!="processProposal" && $action!="searchTrips"){

    include($nameApp."/layout/".$context->getLayout().".php");

    }
	else{
    include($template_view);}
}


?>