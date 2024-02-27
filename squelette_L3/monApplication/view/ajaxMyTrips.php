<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
</head>
<style>
    body {
        font-family: Arial, sans-serif;
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
            margin: 20px auto; /* Center the form horizontally and add margin */
        }

        #searchForm label {
            display: block;
            margin: 10px 0; /* Adjust margin for labels */
            font-weight: bold; /* Make the labels bold */
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
    <div class="top-bar">
        <button id="homeButton">Home</button>
    </div>

    <script>
    var layoutPage = document.referrer;
    $(document).ready(function () {
        $('#homeButton').click(function () {
            window.location.href = layoutPage;
        });
    });

    </script>

    <div>
        <h2>MY TRIPS</h2>

        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
            // Only include the JavaScript code if the user is logged in
        ?>
            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- Your HTML content -->

            <script>
            $(document).ready(function() {
                
                $.ajax({
                    url: 'https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=printMyReservation', // Replace with the actual endpoint
                    type: 'GET',
                    success: function(response) {
                        // Handle the response
                        console.log(response);
                        

                    },
                    error: function(error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            });
            </script>
        <?php
        } else {
            // Handle the case when the user is not logged in
            echo 'You are not logged in.';
        }
        ?>



    </div>
</body>

</html>
