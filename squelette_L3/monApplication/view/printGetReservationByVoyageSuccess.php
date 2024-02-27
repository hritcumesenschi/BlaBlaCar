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
    
    <?php if (!empty($reservations)): ?>
        <ul>
            <?php foreach ($reservations as $reservation): ?>
                <li>
                    Reservation ID: <?php echo $reservation->id; ?><br>
                    Voyage ID: <?php echo $reservation->voyage->id; ?><br>
                    Voyageur ID: <?php echo $reservation->voyageur->id; ?><br>
                    
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No reservations found for the voyage.</p>
    <?php endif; ?>
</body>
</html>
