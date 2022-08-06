<?php
    if(isset($_POST['submit'])){
        session_start();
        include 'db.php';

        $user = mysqli_real_escape_string($conn,$_POST['no_wa']);

        // echo $user;

        $sql = "INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `kode_verifikasi`) VALUES (NULL, NULL, '$user', '123', '$user', NULL, NULL, '12345');";

        header('Location:index.php');
        // echo $sql;
        
        $cek = mysqli_query($conn, $sql);

        if($cek > 0){
                echo '<script>window.location="login.php"</script>';  
        }else{
                echo '<i><script> alert("No Salah!!")</script></i>';
        }
   }

?>

<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi | PetaniHidro</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="http://fonts.gogleapis.com/css2?familyQuicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
   <div class="box-login">
<h2>Verifikasi Kode</h2>
    <form action="" method="POST">
        <input type="text" name="no_telp" placeholder="" class="input-control" value="<?php echo $user ?>">
        <input type="text" name="kode" placeholder="Masukkan Kode Verifikasi" class="input-control">
        <input type="submit" name="submit" value="Daftar" class="btn">
    </form>
   </div> 
</body>
</html> -->