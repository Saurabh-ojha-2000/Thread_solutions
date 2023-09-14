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

    <?php include 'partials/_dbconnect.php';
    include 'partials/_header.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <!-- JUMBOTRON CLASS  -->

    <div class="container J my-4">
        <div class="jumbotron">
            <h1 class="display-4"> Welcome To
                <?php echo $catname; ?> Forums
            </h1>
            <p class="lead">
                <?php echo $catdesc; ?>
            </p>
            <hr class="my-4">
            <p> This is a peer-to-peer forum for sharing knowledge with each other.</p>
        </div>
    </div>

    <?php
    $showAlert = false;
    $th_descerr = $th_titleerr = "";
    $th_desc = $th_title = "";

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
    
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        if (empty($_POST["title"])) {
            $th_titleerr = "Title is required";
        } else {
            $th_title = test_input($_POST["title"]);
        }

        if (empty($_POST["desc"])) {
            $th_descerr = "Description is required";
        } else {
            $th_desc = test_input($_POST["desc"]);
        }

        $sno = $_POST['sno'];
        if (empty($th_titleerr) && empty($th_descerr)) {
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (?, ?, ?, ?, current_timestamp())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssii", $th_title, $th_desc, $id, $sno);
            $result = mysqli_stmt_execute($stmt);
            $showAlert = true;
        }
    }
    ob_end_flush();
    ?>

    <?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your thread has been added.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>';

        // Redirect after a 3-second delay
    
        echo '<script>
                setTimeout(function(){
                    window.location.href = "threadlist.php?catid=' . $id . '";
                }, 3000);
              </script>';
    } elseif (!empty($th_descerr) || !empty($th_titleerr)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong> Invalid! </strong> All Fields are required to submit.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';
        echo '<script>
     setTimeout(function(){
        window.location.href = "threadlist.php?catid=' . $id . '";
     }, 3000);
   </script>';
    }
    ?>

    <!-- form question box -->

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '   <div class="container">
                    <h1>Tell About Your Query</h1>
                    <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Problem Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title"
                                placeholder="Enter title" style="width:40%" required>
                            <small id="emailHelp" class="form-text text-muted">Keep Your Title As Short As Crisp As Possible</small>
                        </div>
                        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . ' ">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                            <textarea class="form-control" id="desc" name="desc" rows="5" style="width:40%" required3></textarea>
                        </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>';
    } else {
        echo ' <div class="container">
                <h1 class="py-2">Tell About Your Querry</h1>
                <p class="lead" style="color:black; background-color: rgb(233, 137, 120); width:50%;" >Sorry! you are not loggedin. Please login to be able to start a discussion</p>
                </div>';
    }
    ?>

    <!-- threads -->

    <div class="container " id="ques">
        <h1>Browse Questions</h1>
        <?php

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];

            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id' ";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '<div class="media my-3" style="display:flex;">
                  <img src="vector-users-icon.webp" width=50px class="mr-3 " alt="Loading Error">
                    <div class="media-body">' .
                ' <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a>
                      </h5>' . $desc . '</div> ' . ' <div class="font-weight-bold my-0" style="position: absolute; right: 10px;">
                       Asked by:   <b>' . $row2['user_email'] . ' at (' . $thread_time . ' )</b>
                   </div>' .
                '</div>';

        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4 my-2">No Threads Found </h1>
                  <p class="lead"><b>Be the first person to ask a question</b> </p> 
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