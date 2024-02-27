<!-- processProposalError.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failed Voyages</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Hide the notification after 3 seconds
        setTimeout(function () {
            $('#notification').fadeOut();
        }, 3000);

        // Reload the page after 3 seconds
        setTimeout(function () {
            var layoutPage = document.referrer;
            window.location.replace("monApplication.php?");
        }, 3000);
    });
</script>

<div id="notification" class="w3-panel w3-red w3-display-container">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
    <p>Form Data was wrong. Try again!</p>
</div>

</body>
</html>
