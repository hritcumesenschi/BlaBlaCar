<!-- printReservationsSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
</head>
<body>
    <h2>Reservations List</h2>
    
            <?php foreach ($context->reservation as $reservation): ?>
                <li>
                    ID: <?php echo $reservation->id; ?><br>
                    Voyage ID: <?php echo $reservation->id; ?><br>
                    Voyageur ID: <?php echo $reservation->voyageur->nom; ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>

</body>
</html>
