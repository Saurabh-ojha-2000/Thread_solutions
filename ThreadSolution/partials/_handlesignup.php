<?php
session_start();
$showAlert = false;
$showerror = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    
    $user_email = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    // Check if any of the fields are empty
    if (empty($user_email) || empty($pass) || empty($cpass)) {
        $_SESSION['$showerror'] = "All fields are required.";
        header("location:/phpfiles/ThreadSolution/index.php");
        exit();
    }

    // Check whether this email exists
    $existsql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        $_SESSION['$showerror'] = "Email already in use.";
        header("location:/phpfiles/ThreadSolution/index.php");
        exit();      
    } else {
        if ($pass == $cpass) {
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$pass', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                header("location:/phpfiles/ThreadSolution/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $_SESSION['$showerror'] = "Passwords do not match.";
            header("location:/phpfiles/ThreadSolution/index.php");
            exit();
        }
    }
    header("location:/phpfiles/ThreadSolution/index.php?signupsuccess=false&error=$showerror");
}
?>
