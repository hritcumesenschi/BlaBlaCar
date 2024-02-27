<!-- success_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corresponding Trips</title>
</head>
<body>
    <h1>Corresponding Trips</h1>
    
    <?php if (isset($context->result)): ?>
        <table border="1">
            <tr>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Trip ID</th>
            </tr>
            <?php foreach ($context->result as $trip): ?>
                <tr>
                    <td><?= $trip['dep_city'] ?></td>
                    <td><?= $trip['arr_city'] ?></td>
                    <td><?= $trip['trip_id'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No corresponding trips found.</p>
    <?php endif; ?>
</body>
</html>
