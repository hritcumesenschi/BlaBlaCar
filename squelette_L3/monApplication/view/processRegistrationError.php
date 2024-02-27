<!-- processRegistrationError.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Failed</title>
</head>

<body>
    <div>
        <h1>Registration Failed</h1>
        <p><?php echo $context->result; ?> was NOT registered! Welcome!</p>

        <script>
            // Automatically redirect to the layout page after 3 seconds
            setTimeout(function () {
                window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php";
            }, 3000); // 3000 milliseconds (3 seconds)
        </script>
    </div>
</body>

</html>
