<!-- printSuccessReservedTrips.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserved Trips</title>
</head>
<body>
    
    <h2>Reserved Trips</h2>
    <?php foreach ($context->reservedTrips as $reservedTrip): ?>
        <li>
            ID: <?php echo $reservedTrip->id; ?><br>
            Voyage ID: <?php echo $reservedTrip->voyage; ?><br>
            Voyageur ID: <?php echo $reservedTrip->voyageur; ?><br>
            <hr>
        </li>
    <?php endforeach; ?>

</body>
</html>
