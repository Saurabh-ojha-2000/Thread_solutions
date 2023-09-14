 <?php session_start();?>

<?php
//  navbar

 include 'partials/_dbconnect.php';
 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="border:1px solid white;padding:2px; border-radius:14px">Thread Solutions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Top Categories
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbardropdown">';

                    $sql = "SELECT category_name, category_id FROM `categories` LIMIT 5 ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                       {
                        echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'"> ' . $row['category_name'] . ' </a> ' ;
                       }
                 
                 echo '</div>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
            <div class="row mx-2" style="width: 50%;" > ';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '
            <form class="" role="search" style="width:100%; padding-left:34px;" method="get"  action="search.php">
            <a href="partials/_logout.php" class="btn btn-success ml-2" style="float:right;" data-bs-target="#loginmodal">Logout</a>
            <p style="padding-right:10px; margin-top:10px; float:right;" class="text-light" my-0 mx-2"> welcome '. $_SESSION['useremail'].' </p>
            <button class="btn btn-outline-success" style="margin-right:20px; float:right;" name="submit" type="submit">Search</button>
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" style="width:200px; float:right;"/>
            </form>';
}
else{
         echo'  <form class="d-flex" role="search" style="width:70%;">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" style="margin-right:20px" type="submit">Search</button> 
            </form>
           <a class="btn btn-success ml-2" data-bs-toggle="modal" data-bs-target="#loginmodal" style="width:90px;">Login</a>
            <a class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal" style="width:90px;">SignUp</a>';
}
          echo ' </div>
    </div>   
    </nav>';

include '_loginmodal.php';
include '_signupmodal.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You can now login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    echo '<script>
                setTimeout(function(){
                    window.location.href = "index.php";
                }, 3000);
              </script>';
 }
// else{
//     echo '<div class="alert alert-danger alert-dismissible fade show my-0 p-1" role="alert">
//     <strong> Invalid!</strong> username and password.
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';
//    echo '<script>
//                 setTimeout(function(){
//                     window.location.href = "index.php";
//                 }, 3000);
//               </script>';
// }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">