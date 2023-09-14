<?php
session_start();
$showerror = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';

    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    // Check if email and password are not empty
    if (empty($email) || empty($pass)) {
        $_SESSION['$showerror'] = "Both email and password are required.";
        header("location:/phpfiles/ThreadSolution/index.php");
        exit();
    }
    // UPDate data into the database
    $sql = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedin'] = true;
        $_SESSION['sno'] = $row['sno'];
        $_SESSION['useremail'] = $email;
        echo "Logged in: " . $email;
        header("location:/phpfiles/ThreadSolution/index.php");
        exit();
    } else {
        $_SESSION['$showerror'] = "Invalid email or password";
        header("location:/phpfiles/ThreadSolution/index.php");
        exit();
    }
}
?>