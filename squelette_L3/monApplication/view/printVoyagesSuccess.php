<!-- printSuccessVoyages.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages List</title>
</head>
<body>
    <h2>Voyages List</h2>
    
        <ul>
            <?php foreach ($context->voyage as $voyage): ?>
                <li>
                    ID: <?php echo $voyage->id; ?><br>
                    Conducteur ID: <?php echo $voyage->conducteur->nom; ?><br>
                    Trajet ID: <?php echo $voyage->id; ?><br>
                    Tarif: <?php echo $voyage->tarif; ?><br>
                    Number of Places: <?php echo $voyage->nbPlace; ?><br>
                    Departure Time: <?php echo $voyage->heureDepart; ?><br>
                    Contraintes: <?php echo $voyage->contraintes; ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
   
</body>
</html>
