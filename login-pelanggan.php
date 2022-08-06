<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | PETASATERA</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="http://fonts.gogleapis.com/css2?familyQuicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
   <div class="box-login">
<h2>Login</h2>
<form action="" method="POST">
    <input type="email" name="email" placeholder="masukan email" class="input-control">
    <input type="password" name="password" placeholder="masukan password" class="input-control">
    <input type="submit" name="submit" value="Login" class="btn">
    
</form>
<?php
if(isset($_POST['submit'])){
session_start();
include 'db.php';

  if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $password = $_POST['password'];

   $ambil = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email_pelanggan ='".$email."' AND password_pelanggan = '".($password)."'");

    $akunyangcocok = $ambil->num_rows;

    if($akunyangcocok==1){

        $akun = $ambil->fetch_assoc();

        $_SESSION["pelanggan"] = $akun;
        echo "<script> alert('SUKSES LOGIN');</script>";
        echo "<script>location='index.php';</script>"; 

    }else{
        echo "<script> alert('username atau kata sandi salah!');</script>";
        echo "<script>location='login-pelanggan.php';</script>";  
    }


  }}
?>
   </div> 
</body>
</html>