<?php
if(isset($_POST['username'])){
$username = $_POST['username'];
$password = $_POST['password'];
}
if (!empty($username) || !empty($password)) {
 $host = "localhost";
    $dbUsername = "";
    $dbPassword = "";
    $dbname = "profile";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT username from login where username = ? Limit 1";
     $INSERT = "INSERT Into login (username, password) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
       echo '<script type="text/javascript">';
echo ' alert("account creation successful")';  //not showing an alert box.
echo '</script>';
     } else {
      echo '<script type="text/javascript">';
echo ' alert("someone already registered using this username")';  //not showing an alert box.
echo '</script>';
     }
     $stmt->close();
     $conn->close();
    }
} else {
 //echo "All field are required";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Profile%20GG/css/style.css">

</head>
<body>
    <div class="login-dark">
        <form action="" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon icon ion-planet"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Comfirm password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Submit</button></div><a href="#" class="forgot">Forgot your email or password?</a>
            <br>
            <a href="#"  class="forgot"><p style="text-align:center">Already registered?</p>  </a><button id="login" type="button" class=" btn-forgot" >Back to Login</button>
            <button type="button" class="cancelbtn2" id="back">Back to Homepage</button>
         </form>
            
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<script type="text/javascript">
    document.getElementById("login").onclick = function () {
        window.location.href = "";
    };
    document.getElementById("back").onclick = function () {
        window.location.href = "";
    };
</script>
</html>
