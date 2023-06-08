<?php
$login=0;
$invalid=0;
$wrong_password=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

   
    
    $sql="select * from registration where username='$username'
    and password='$password'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
    if($num>0){
        $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:admin_index.php');

    }else{
      $invalid=1;
}
}
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">

    <title>Login page</title>
</head>

<body>
<div class="main-cont">
<?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>successfully logged in</strong>
        <button type="button" class="exclamation-triangle-fill" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
     <?php
    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Invalid credential,  </strong> You can instead sign up or recheck your credential <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
        <h1 class="heading">Login page</h1>
        <form action="login.php" method="post">
        <div class="inputbox">
                <label for="exampleInputEmail1" class="form-label">Name/Email</label>
                <input type="text" class="form-control" placeholder="Enter your username or email" name="username">
            </div>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <div class="inputbox">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="password" placeholder="Enter your password" name="password">
            </div>
            <p class="sign">
    New to Gadget Review?
    <a href="http://localhost/gadget_review/sign-up.php">Sign up now</a>.
  </p>
  <input type="submit" value="sign in" class="submit">
        </form>
        </div>
</body>

</html>
