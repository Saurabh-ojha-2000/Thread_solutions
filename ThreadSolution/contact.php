<?php
ob_start();

include 'partials/_dbconnect.php';
include 'partials/_header.php';

$showAlert = false;
$nameerr = $mnerr = $emailerr = "";
$name = $mn = $email = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    // required fields

    if (empty($_POST["username"])) {
        $nameerr = "Name is required";
    } else {
        $name = test_input($_POST["username"]);
    }

    if (empty($_POST["mn"])) {
        $mnerr = "Mobile number is required";
    } else {
        $mn = test_input($_POST["mn"]);
    }

    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($nameerr) && empty($mnerr) && empty($emailerr)) {
        $sql = "INSERT INTO `contact` (`username`, `mn`, `email`, `cdt`) VALUES ('$name', '$mn', '$email', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
    }
}

ob_end_flush();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Thread Solutions Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .main-box {
            background-color: #c0eddd;
            overflow: auto;
        }

        .container {
            background-image: url("tele.jpg");
            height: 520px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 100px;

        }

        .contact_form {

            position: relative;
            top: 68px;
            width: 60%;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            display: grid;
            height: 230px;
            font-size: 20px;
            margin-left: 100px;
        }

        input {
            width: 450px;
        }

        .alert.alert-danger.alert-dismissible.fade.show {
            position: absolute;
            top: 0;
            margin-top: 80px;
            width: 100%;
        }

        .alert.alert-success.alert-dismissible.fade.show {
            position: absolute;
            top: 0;
            margin-top: 80px;
            width: 100%;
        }
        .row>* {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5) !important;
    margin-top: var(--bs-gutter-y);
    margin-bottom: 0;
}
.navbar {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 0.5rem 0;
}
    </style>
</head>

<body>
    <div class="main-box" style="padding-left:10%">
        <div class="container" style="border:2px solid black;">
            <div class="form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="contact_form">
                    <h2 style="text-align: center; font-size: 42px; "> Contact Us</h2>
                    <input type="text" placeholder="Your name" name="username">

                    <input type="number" placeholder="Mobile Number" name="mn">

                    <input type="email" placeholder="Your Email Address" name="email">
                    <button class="btn btn-success" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php
if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> Success! </strong> Your name '.$name.', mobile number '.$mn. ', and email id '.$email.' is successfully submitted.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>';

    // Redirect after a 2-second delay

    echo '<script>
                setTimeout(function(){
                    window.location.href = "contact.php";
                }, 5000);
              </script>';
} elseif (!empty($nameerr) || !empty($mnerr) || !empty($emailerr)) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong> Invalid! </strong> All Fields are required to submit.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';
}
?>

</body>
</html>

<?php include 'partials/_footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>