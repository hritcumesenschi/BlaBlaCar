<!-- printSuccessVoyages.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
</head>
<body>
<div id="notification" class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
        <p>Search finished successfully!</p>
    </div>

    <h2>RESULT</h2>



<div id="reserveButtonContainer">
        <label for="tripIdInput">Insert Trip ID You Want to Reserve:</label>
        <input type="text" id="tripIdInput" placeholder="Enter Trip ID">
        <button id="reserveTripButton">Reserve Trip</button>
</div>

<h2>RESULT</h2>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication/layout/myTrips.php";

    </script>




</body>
</html>
