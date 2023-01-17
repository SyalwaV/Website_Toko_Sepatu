<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['usn'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM form_login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['usn'] = $row['usn'];
        echo "<script>alert('login berhasil')</script>";
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Penjualan Tas SyaSya</title>
    <style>
        *{
            padding: 0;
            margin-left: auto;
            margin-right: auto;
            box-sizing:border-bpx;
            align-items: center;
            text-align: center;

        }
        body{
            background: rgb(219, 226, 226);
        }
        .row{
            background: white;
            border-radius: 30px;
        }
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px; 
            height: 400px;

        }

        .btn{
            border: none;
            outline: none;
            height: 50px;
            width: 320px;
            background-color:black;
            color: white;
            border-radius: 4px;
            font-weight: bold;

        }
        .btn:hover{
            background: white;
            border: 1px solid;
            color:black;
        }
    </style>
  </head>
  <body>
   
  <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
               <div class="col-lg-5">
                  <img src="assets/img/bag.png"  class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Login</h1>
                    <h4>Sign into your account</h4>
                    <form action="" method="POST" class="login-email">
                      <div class="form-row">
                        <div class="col-lg-7">
                           <input type="username" placeholder="username" name="username"  class="form-control my-3 p-4" value="<?php echo $_POST['username']; ?>" required>
                        </div>
                       </div>
                       <div class="form-row">
                        <div class="col-lg-7">
                        <input type="password" placeholder="Password" name="password" class="form-control my-3 p-4" value="<?php echo $_POST['password']; ?>" required>
                        </div>
                       </div>
                       <div class="form-row">
                        <div class="col-lg-7">
                            <button name="submit" class="btn mt-3 mb-5">Login</button>
                          </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>