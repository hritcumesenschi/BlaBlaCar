<!-- printGetVoyagesByTrajetSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages by Trajet</title>
</head>
<body>
    <h2>Voyages by Trajet</h2>
    

            <?php foreach ($context->result as $voyage): ?>
                <li>
                    Voyage ID: <?php echo $voyage->id; ?><br>
                    Conducteur ID: <?php echo $voyage->conducteur; ?><br>
                    Trajet ID: <?php echo $voyage->trajet; ?><br>
                    Tarif: <?php echo $voyage->tarif; ?><br>
                    Nb Places: <?php echo $voyage->nbPlace; ?><br>
                    Heure Depart: <?php echo $voyage->heureDepart; ?><br>
                    Contraintes: <?php echo $voyage->contraintes; ?><br>
                    <hr>
                </li>
            <?php endforeach; ?>

</body>
</html>
