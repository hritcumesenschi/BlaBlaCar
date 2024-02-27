<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="monApplication/view/style.css">
    
    <title>Ton appli !</title>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"> 
    </script> 
</head>

    <style>
            body {
                font-family: 'Rockwell', sans-serif;
                margin: 0;
                padding: 0;
            }

            .top-bar {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: left;
            }

            button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                cursor: pointer;
                margin: 5px;
            }

            button:hover {
                background-color: #45a049;
            }

            h2 {
                    color: #333;
                    font-family: 'Rockwell', sans-serif;
                    font-weight: bold;
                    text-align: center;
                }

                
                #places {
                    width: 50px;
                }

                #searchForm {
                    text-align: center;
                    margin: 20px auto; 
                }

                #searchForm label {
                    display: block;
                    margin: 10px 0; /* Adjust margin for labels */
                    font-weight: bold; 
                }

                #searchForm input {
                    width: 50%; /* Make the input fields take the full width of the container */
                    padding: 8px;
                    box-sizing: border-box; /* Include padding and border in the total width/height */
                    margin-bottom: 15px; /* Add some space between input fields */
                }

                #searchButton {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    cursor: pointer;
                    font-weight: bold; /* Make the button text bold */
                }

                #searchButton:hover {
                    background-color: #45a049; /* Darken the background color on hover */
                }

    </style>

<body>
<div id="page">

    <div class="top-bar" id="top-bar">

        <?php  
        if (!isset($_SESSION['logged'])) $_SESSION['logged'] = false;
            // Check if the PHP session variable indicates the user is logged in
            if ($_SESSION['logged'] === true) {//daca e logat
                echo '<button id="logoutButton">Logout</button>'; //arat logout
                echo '<button id="proposeTrip">Propose Trip</button>';
               
            } else {
                echo '<button id="loginButton">Login</button>';
            }
        
        ?>

    
    <button id="registrationButton">Register</button>
    <button id="tripsButton">My Trips</button>
    
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        var layoutPage = document.referrer;
        $(document).ready(function () {
            $('#registrationButton').click(function () {
                window.location.href = "monApplication.php?action=registration";
                
            });

            $('#loginButton').click(function () {
                //window.location.href = "monApplication/layout/login.php";
                window.location.href = 'monApplication.php?action=login';
                
            });

            $('#tripsButton').click(function () {
            window.location.href = 'monApplication.php?action=printMyReservation';

            });

            $('#logoutButton').click(function () {
                window.location.href = 'monApplication.php?action=logout';
            });

            $('#proposeTrip').click(function () {
                window.location.href = 'monApplication.php?action=proposeTrip';
                
            });
        });
    </script>

    <!-- <h2>Super c'est ton appli ! HERE WAS THE CONNECTION BUTTON</h2> -->
    <?php if ($context->getSessionAttribute('user_id')): ?>
        <?php// echo $context->getSessionAttribute('user_id') . " est connecte"; ?>
    <?php endif; ?>

    <!-- <div id="page"> -->
        
    <?php if ($context->notification): ?>
        <div id="notification" class="<?php echo $context->notificationType; ?>">
            <?php echo $context->notification; ?>
        </div>
    <?php endif; ?>

    <?php if ($context->error): ?>
        <div id="flash_error" class="error w3-blue w3-panel">
            <?php echo " $context->error !!!!!" ?>
        </div>
    <?php endif; ?>

    <?php if ($context->warning): ?>
        <div id="warning" class="warning">
            <?php echo $context->warning; ?>
        </div>
    <?php endif; ?>

        <!-- SEARCH TRIPS -->
        
    <h2>Search Voyages</h2>
        <br><br>

    <form id="searchForm">
        <label for="departure">Departure:</label>
        <input type="text" id="departure" name="departure" required>

        <label for="arrival">Arrival:</label>
        <input type="text" id="arrival" name="arrival" required>

        <label for="arrival">Places:</label>
        <input type="text" id="places" name="places" required>
        <br>
        <button type="submit" id="searchButton">Search</button>
    </form>

    <div id="resultContainer"></div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--  <div id="resultContainer"></div> -->

    <script>
       
        $(document).ready(function () {
        $('#searchForm').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            console.log("Form submitted!");

            // Get form input values
            var departure = $("#departure").val();
            var arrival = $("#arrival").val();
            var places = $("#places").val();
            

            // Perform AJAX request
            $.ajax({
                type: "GET",
                url: "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=processForm",
                data: { departure: departure, arrival: arrival, places: places,
                     },
                dataType: "html",
                success: function (response) {
                    $('#page').html(response);                  
                },
                error: function (error) {
                    console.log("AJAX request failed: " + error);
                    
                }

            });
        });

    });

    
    </script>
    <!-- END SEARCH -->



    <div id="page_maincontent">

    <?php include($template_view); ?>
        
    </div>

</div>
</body>

</html>
