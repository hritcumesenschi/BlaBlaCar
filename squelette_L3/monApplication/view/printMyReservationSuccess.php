<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>My Trips</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: left;
        }

        #tripTable {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
            font-family: 'Rockwell', sans-serif;
            font-weight: bold;
            text-align: center;
        }

        p {
            text-align: center;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <button id="homeButton">Home</button>
    </div>

    <script>
        var layoutPage = document.referrer;
        $(document).ready(function () {
            $('#homeButton').click(function () {
                window.location.href = layoutPage;
            });
        });
    </script>

    <div>
        <h2>MY TRIPS</h2>

        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] === true): // If logged in, display trips
        ?>
            <h2>Reserved Trips</h2>
            
            <table id="tripTable">
                <tr>
                    <th>ID</th>
                    <th>Conducteur ID</th>
                    <th>Trajet ID</th>
                    <th>Tarif</th>
                    <th>Number of Places</th>
                    <th>Departure Time</th>
                    <th>Contraintes</th>
                </tr>

                <?php $places = $context->places; ?>
                <?php foreach ($context->allVoyages as $voyage): ?>
                    <?php if ($voyage->nbPlace > $places): ?>
                        <tr>
                            <td><?php echo $voyage->id; ?></td>
                            <td><?php echo $voyage->conducteur->nom; ?></td>
                            <td><?php echo $voyage->id; ?></td>
                            <td><?php echo $voyage->tarif; ?></td>
                            <td><?php echo $voyage->nbPlace; ?></td>
                            <td><?php echo $voyage->heureDepart; ?></td>
                            <td><?php echo $voyage->contraintes; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
            

        <?php else:
            echo "You are not logged in!";
        endif;
        ?>
    </div>
</body>

</html>
