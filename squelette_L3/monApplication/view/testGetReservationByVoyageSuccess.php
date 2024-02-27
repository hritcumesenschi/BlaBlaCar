<!-- printGetReservationByVoyageSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations for Voyage</title>
</head>
<body>
    <h2>Reservations for Voyage</h2>
    

            <?php foreach ($context->result as $reservation): ?>
                <li>
                    
                    Reservation ID: <?php echo $reservation->id; ?><br>
                    Voyage ID: <?php echo $reservation->voyage->id; ?><br>
                    Voyageur ID: <?php echo $reservation->voyageur->id; ?><br>
                    <!-- Add more details as needed -->
                    <hr>
                </li>
            <?php endforeach; ?>

</body>
</html>
