<!-- processProposalSuccess-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propose Trip</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

            #proposeTripForm {
                text-align: center;
                margin: 20px auto; /* Center the form horizontally and add margin */
            }

            #proposeTripForm label {
                display: block;
                margin: 10px 0; /* Adjust margin for labels */
                font-weight: bold; /* Make the labels bold */
            }

            #proposeTripForm input {
                width: 25%; /* Make the input fields take the full width of the container */
                padding: 8px;
                box-sizing: border-box; /* Include padding and border in the total width/height */
                margin-bottom: 15px; /* Add some space between input fields */
            }

            #proposeTripForm {
                
                color: white;
                padding: 10px 15px;
                border: none;
                cursor: pointer;
                font-weight: bold; /* Make the button text bold */
            }

            #proposeTripForm:hover {
                background-color: #023020; /* Darken the background color on hover */
            }

    </style>


<body>
<div id = "proposeTripSuccess"></div>

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

    <h1>Propose a Trip</h1>

    <form id="proposeTripForm" action="processProposeTrip.php" method="post">
        <!-- Fields for proposing a trip -->
        <label for="departure">Departure:</label>
        <input type="text" id="departure" name="departure" required>
        <br>
        <label for="arrival">Arrival:</label>
        <input type="text" id="arrival" name="arrival" required>
        <br>
        <label for="distance">Distance:</label>
        <input type="text" id="distance" name="distance" required>
        <br>
        <label for="departureTime">Departure Time:</label>
        <input type="number" id="departureTime" name="departureTime" required>
        <br>
        <label for="availableSeats">Available Seats:</label>
        <input type="number" id="availableSeats" name="availableSeats" required><br>
        <br>
        <label for="farePerKm">Fare per Kilometer:</label>
        <input type="number" id="farePerKm" name="farePerKm" required><br>
        <br>
        <label for="additionalComments">Additional Comments:</label>
        <textarea id="additionalComments" name="additionalComments" rows="4" cols="50"></textarea><br>
        <br>
        <button type="submit" id="submit">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        
        $(document).ready(function () {
            $('#submit').click(function (event)  {
            // Prevent the default form submission
            event.preventDefault();
            console.log("Form proposal submitted!");

            // Collect form data
            var departure = $('#departure').val();
            var arrival = $('#arrival').val();
            var distance = $('#distance').val();
            var departureTime = $('#departureTime').val();
            var availableSeats = $('#availableSeats').val();
            var farePerKm = $('#farePerKm').val();
            var additionalComments = $('#additionalComments').val();


            // Perform AJAX request
            $.ajax({
                type: "POST",
                url: "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=processProposal",
                data: {
                    departure: departure,
                    arrival: arrival,
                    distance: distance,
                    departureTime: departureTime,
                    availableSeats: availableSeats,
                    farePerKm: farePerKm,
                    additionalComments: additionalComments
                    
                },
                dataType: "html",
                success: function (response) {

                    alert("Form was sent!");
                    $('#proposeTripSuccess').html(response);   
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Request failed. Status:', textStatus, 'Error:', errorThrown);
                    alert("Couldn't add proposed trip");
                    window.location.replace(layoutPage);
                }
            });
        });
    });

    </script>

</body>
</html>
