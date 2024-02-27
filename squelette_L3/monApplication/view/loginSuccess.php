<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
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

                #loginForm {
                    text-align: center;
                    margin: 20px auto; /* Center the form horizontally and add margin */
                }

                #loginForm label {
                    display: block;
                    margin: 10px 0; /* Adjust margin for labels */
                    font-weight: bold; /* Make the labels bold */
                }

                #loginForm input {
                    width: 50%; /* Make the input fields take the full width of the container */
                    padding: 8px;
                    box-sizing: border-box; /* Include padding and border in the total width/height */
                    margin-bottom: 15px; /* Add some space between input fields */
                }

                #loginButton {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    cursor: pointer;
                    font-weight: bold; /* Make the button text bold */
                }

                #loginButton:hover {
                    background-color: #45a049; /* Darken the background color on hover */
                }

    </style>

<body>
    <div id = "loginSuccess"></div>
        <h2>Login</h2>

        

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

        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit" id="loginButton">Login</button>
        </form>

        <div id="resultContainer"></div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            
            $(document).ready(function () {
            $('#loginForm').submit(function (event) {
                event.preventDefault();
                
                console.log("Login form submitted!");

                var username = $("#username").val();
                var password = $("#password").val();

                console.log("Username: " + username);
                console.log("Password: " + password);

                $.ajax({
                    type: "POST",
                    url: "https://pedago.univ-avignon.fr/~uapv2402849/squelette_L3/monApplication.php?action=processLogin",
                    data: { username: username, password: password },
                    dataType: "html",
                    success: function (response) {
                        console.log(response);
                        console.log("AJAX request successful");
                        window.location.href = layoutPage;
                        //$('#loginSuccess').html(response);   
                    },
                    error: function (error) {
                        console.log("AJAX request failed: " + error);
                    }
                });
            });
            });

        </script>
    
</body>
</html>
