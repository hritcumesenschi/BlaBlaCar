<!-- testGetTrajetSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Get Trajet</title>
</head>
<body>
    <h2>Test Get Trajet</h2>
    

    <li>ID: <?php echo $context->result->id; ?></li>
    <li>Departure: <?php echo $context->result->depart; ?></li>
    <li>Arrival: <?php echo $context->result->arrivee; ?></li>
    <li>Distance: <?php echo $context->result->distance; ?></li>

</body>
</html>
