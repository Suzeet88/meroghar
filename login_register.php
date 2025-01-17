<?php


require('connection.php');
session_start();



// for registration
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

    // Query to check if the username or email already exists
    $user_exist_query = "SELECT * FROM `meroghar_user` WHERE `username` = '$username' OR `email` = '$email'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        // Check if any rows were returned (meaning the username or email is taken)
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);

            // Check if the existing row has the same username
            if ($result_fetch['username'] == $username) {
                // Username is already taken
                echo "
                    <script>
                        alert('Username \"{$username}\" is already taken');
                        window.location.href='index.php';
                    </script>
                ";
            } else {
                // Email is already registered
                echo "
                    <script>
                        alert('Email \"{$email}\" is already registered');
                        window.location.href='index.php';
                    </script>
                ";
            }
        } else {
            // No existing username or email found, so insert the new user
            $insert_query = "INSERT INTO `meroghar_user`(`fullname`, `username`, `email`, `password`) VALUES ('$fullname', '$username', '$email', '$password')";

            if (mysqli_query($con, $insert_query)) {
                // Registration successful
                echo "
                    <script>
                        alert('Registration successful');
                        window.location.href='index.php';
                    </script>
                ";
            } else {
                // Insert query failed
                echo "
                    <script>
                        alert('Could not run insert query');
                        window.location.href='index.php';
                    </script>
                ";
            }
        }
    } else {
        // Error in the select query
        echo "
            <script>
                alert('Could not run select query');
                window.location.href='index.php';
            </script>
        ";
    }
}



 //for login 


  // for login
if (isset($_POST['login'])) {
    // Query to check if the username or email exists
    $query = "SELECT * FROM `meroghar_user` WHERE `email` = '$_POST[email_username]' OR `username` = '$_POST[email_username]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);

            if (password_verify($_POST['password'], $result_fetch['password'])) {
                // Password matched
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                
                // Redirect to index.php
                header('location:index.php');
                exit();
            } else {
                echo "
                <script>
                    alert('Wrong password');
                    window.location.href='index.php';
                </script>
                ";
            }
        } else {
            echo "
            <script>
                alert('Email or username not registered');
                window.location.href='index.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Could not run select query');
            window.location.href='index.php';
        </script>
        ";
    }
}




?>
