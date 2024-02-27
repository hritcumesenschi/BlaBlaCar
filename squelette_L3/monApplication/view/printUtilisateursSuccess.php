<!-- printUtilisateursSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs List</title>
</head>
<body>
    <h2>Utilisateurs List</h2>
    


    ID: <?php echo $context->user->id; ?><br>
    Identifiant: <?php echo $context->user->identifiant; ?><br>
    Nom: <?php echo $context->user->nom; ?><br>
    Prenom: <?php echo $context->user->prenom; ?><br>
    Avatar: <?php echo $context->user->avatar; ?><br>
    <hr>




</body>
</html>
