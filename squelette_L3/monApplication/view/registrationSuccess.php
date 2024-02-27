<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<style>
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

            button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                cursor: pointer;
                margin: 5px;
            }

            button:hover {
                background-color: #45a049;
            }

            h2 {
                    color: #333;
                    font-family: 'Rockwell', sans-serif;
                    font-weight: bold;
                    text-align: center;
                }

                
                #places {
                    width: 50px;
                }

                #registrationForm {
                    text-align: center;
                    margin: 20px auto; /* Center the form horizontally and add margin */
                }

                #registrationForm label {
                    display: block;
                    margin: 10px 0; /* Adjust margin for labels */
                    font-weight: bold; /* Make the labels bold */
                }

                #registrationForm input {
                    width: 50%; /* Make the input fields take the full width of the container */
                    padding: 8px;
                    box-sizing: border-box; /* Include padding and border in the total width/height */
                    margin-bottom: 15px; /* Add some space between input fields */
                }

                #registrationForm {
                    background-color: #40826D;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    cursor: pointer;
                    font-weight: bold; /* Make the button text bold */
                }

                #registrationForm:hover {
                    background-color: #023020; /* Darken the background color on hover */
                }

</style>

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
    <h2>Registration Form</h2>

    
    <form id="registrationForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="avatar">Avatar URL:</label>
        <input type="text" id="avatar" name="avatar">
        <br><br>
        <button type="submit">Register</button>
    </form>

    <script>
        
        $(document).ready(function () {
            $('#registrationForm').submit(function (event) {
                event.preventDefault();

                console.log("Registration form submitted!");

                var username = $("#username").val();
                var password = $("#password").val();
                var lastname = $("#lastname").val();
                var firstname = $("#firstname").val();
                var avatar = $("#avatar").val();

                console.log("Data to be sent:", { username, password, lastname, firstname, avatar });

                $.ajax({
                    type: "GET",
                    url: "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=processRegistration",
                    data: {
                        username: username,
                        password: password,
                        lastname: lastname,
                        firstname: firstname,
                        avatar: avatar
                    },
                    dataType: "html",
                    success: function (response) {
                        console.log("Registration AJAX request successful");
                        //redirect to layout
                        //window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?source=registration";
                        window.location.href = "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?"
                    },
                    error: function (error) {
                        console.log("Registration AJAX request failed:", error);
                        alert("Registration failed. Please try again.");
                    }
                });
                
            });
        });
    </script>

</body>

</html>
