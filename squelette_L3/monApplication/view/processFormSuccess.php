<!-- processFormSuccess.php ---THE SEARCH FORM -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Voyages List</title>

</head>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-family: 'Rockwell', sans-serif;

        }

        th {
            background-color: #f2f2f2;
        }
        #tripForm {
            text-align: center;
            margin: 20px auto; /* Center the form horizontally and add margin */
        }

        #tripForm label {
            display: block;
            margin: 10px 0; /* Adjust margin for labels */
            font-weight: bold; /* Make the labels bold */
        }

        #tripForm input {
            width: 50%; /* Make the input fields take the full width of the container */
            padding: 8px;
            box-sizing: border-box; /* Include padding and border in the total width/height */
            margin-bottom: 15px; /* Add some space between input fields */
        }

        #submitReservation {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-weight: bold; /* Make the button text bold */
        }

        #submitReservation:hover {
            background-color: #45a049; /* Darken the background color on hover */
        }
        p{
            font-family: 'Rockwell', sans-serif;
            text-align: center;
        }

</style>
<body>
    <!-- PRINT THE SEARCH FORM-->
    <div id="notification" class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
        <p>Search finished successfully!</p>
    </div>

    <h2>RESULT</h2>
    <table>
    <tr>
        <th>ID</th>
        <th>Name of Driver</th>
        <th>Tarif</th>
        <th>Number of Places</th>
        <th>Departure Time</th>
        <th>Contraintes</th>
    </tr>

    <?php $places = $context->places; ?>
    <?php foreach ($context->result as $voyage): ?>
        <?php if ($voyage->nbPlace > $places): ?>
            <tr>
                <td><?php echo $voyage->id; ?></td>
                <td><?php echo $voyage->conducteur->nom; ?></td>
                <td><?php echo $voyage->tarif; ?></td>
                <td><?php echo $voyage->nbPlace; ?></td>
                <td><?php echo $voyage->heureDepart; ?></td>
                <td><?php echo $voyage->contraintes; ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>




 <!-- PRINT RESERVE TRIP YOU WANT TO RESERVE-->
 <?php if ($_SESSION['logged'] === true ): ?>
    <form id="tripForm">
        Trip Details: <input type="text" name="tripDetails" id="tripDetails"><br>
        <input type="submit" value="Submit Reservation" id="submitReservation">
    </form>
<?php else: ?>
    <p>Please log in to reserve a trip.</p>
<?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submitReservation').click(function (event)  {
            event.preventDefault();
            var tripId = $("#tripDetails").val(); // Gets the tripId introduced in the form
            var places = <?php echo json_encode($context->places); ?>; //gets the places introduced in the search form
            console.log(tripId);
            console.log(places);
            $.ajax({
                type: "GET",
                url: "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=processReservation",
                data: { tripId: tripId, places: places },
                dataType: "html",
                success: function (response) {
                        alert("Trip saved successfully!");
                        //window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication/layout/myTrips.php";
                        //window.location.href = 'monApplication.php?action=processReservation';

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error: ");
                }
            });
        });
    });
</script>
</body>
</html>
