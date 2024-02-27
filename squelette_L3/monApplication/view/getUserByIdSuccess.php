<!-- getUserByIdSuccess.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h2>User Information</h2>
    
    <?php if ($user !== null): ?>
        <ul>
            <li>ID: <?php echo $context->result->id; ?></li>
            <li>Identifiant: <?php echo $context->result->identifiant; ?></li>
            <li>Password: <?php echo $context->result->pass; ?></li>
            <li>Nom: <?php echo $context->result->nom; ?></li>
            <li>Prenom: <?php echo $context->result->prenom; ?></li>
        </ul>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</body>
</html>
