<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Thread Solutions Coding Forums</title>
    <style>
        #ques {
            min-height: 433px;
        }

        .alert.alert-danger.alert-dismissible.fade.show {
            position: absolute;
            top: 0;
            margin-left: 75%;
            margin-top: 5%;
            opacity: 0.9;
        }
        .alert.alert-success.alert-dismissible.fade.show {
            position: absolute;
            top: 0;
            margin-left: 75%;
            margin-top: 5%;
            opacity: 0.9;
}
    </style>
</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
    
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    ?>


    <!-- JUMBOTRON CLASS   -->

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $title; ?>
            </h1>
            <p class="lead">
                <?php echo $desc; ?>
            </p>
            <hr class="my-4">
            <p> This is a peer to peer forum for sharing knowledge with each other.</p>
            <p class="text-left">Posted by:<b>
                    <?php echo $posted_by; ?>
                </b></p>
        </div>
    </div>

    <!-- insert comment to threads from database -->

    <?php

    $showAlert = false;
    $commenterr = "";
    $comment = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'partials/_dbconnect.php';

        // Required fields
        $id = $_GET['threadid'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        if (empty($_POST["comment"])) {
            $commenterr = "Field is required";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($commenterr)) {
            $sno = $_POST['sno'];

            // Insert into the `comments` table
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (?, ?, ?, current_timestamp())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sii", $comment, $id, $sno);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $showAlert = true;
            } else {
                echo "Error: " . mysqli_error($conn); // Display any errors for debugging
            }
        }
    }
    ob_end_flush();
    ?>

    <?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your comment has been added.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>';

        // Redirect after a 3-second delay
    
        echo '<script>
                setTimeout(function(){
                    window.location.href = "thread.php?threadid=' . $id . '";
                }, 3000);
              </script>';

    } elseif (!empty($commenterr)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong> Invalid! </strong>  Field are required to submit.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';

        echo '<script>
     setTimeout(function(){
        window.location.href = "thread.php?threadid=' . $id . '";
     }, 3000);
   </script>';
    }
    ?>

    <?php

    // adding comment to the database  using user input
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1> 
        <form action= "' . $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form> 
    </div>';

    } else {
        echo '   
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead" style="color:black; background-color: rgb(233, 137, 120); width:50%;">Sorry! You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
    }
    ?>



    <!-- fetching comments from the database-->

    <div class="container mb-5" id="ques">
        <h1>Discussions</h1>

        <?php

        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];

            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id' ";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


            echo '<div class="media my-3" style="display:flex;">
                  <img src="vector-users-icon.webp" width=50px class="mr-3 " alt="loading error">
                    <div class="media-body">
                    <p class="font-weight-bold my-0"><b>' . $row2['user_email'] . 'at &nbsp;(' . $comment_time . ' )</b></p>
                    ' . $content . '
                   </div>
              </div>';
        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4 my-2">No Comments Found </h1>
                  <p class="lead"><b>Be the first person to comment. </b> </p>
                </div>
              </div>';
        }

        ?>
    </div>

    <?php include 'partials/_footer.php'; ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
</body>

</html>