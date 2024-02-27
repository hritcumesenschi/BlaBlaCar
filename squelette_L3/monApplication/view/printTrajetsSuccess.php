<!-- printSuccessTrajet.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets List</title>
</head>
<body>
    <h2>Trajets List</h2>
    
            <?php foreach ( $context->trajet as $trajet): ?>
                <li>
                    ID: <?php echo $trajet->id; ?><br>
                    Depart: <?php echo $trajet->depart; ?><br>
                    Arrivee: <?php echo $trajet->arrivee; ?><br>
                    Distance: <?php echo $trajet->distance; ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>

</body>
</html>
