<!-- registrationSuccess.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
</head>

<body>
    <div>
        <h1>Registration Success</h1>
        <p>Your registration was successful! Welcome!</p>

        <script>
            // Display the success message for 3 seconds
            setTimeout(function () {
                document.getElementById("successMessage").style.display = "none";
            }, 3000);

            // Automatically refresh the page after 3 seconds
            setTimeout(function () {
                window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication/layout/myTrips.php";
            }, 3000);
        </script>
    </div>
</body>

</html>
