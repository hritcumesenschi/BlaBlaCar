<!-- printErrorVoyages.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
    <h2>Try again!</h2>
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


</head>
</html>
