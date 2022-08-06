<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin 
    WHERE admin_id = 1");
    $a= mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetaniHIDRO</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="http://fonts.gogleapis.com/css2?familyQuicksand&display=swap" rel="stylesheet">
</head>
<body>
 <!-- header -->
 <header>
    <div class="container">
    <h1><a href="index.php">PetaniHIDRO</a></h1>
    <ul>
        <li><a href="produk.php">Produk</a></li>
     
    </ul>
    </div>
 </header>
<!-- search -->
<div class="search">
    <div class="container">
        <form action="produk.php" >
            <input type="text" name="search" placeholder="Cari Produk" value ="<?php echo $_GET['search']?>" required>
            <input type="hidden" name="kat" value ="<?php echo $_GET['kat']?>">
            <input type="submit" name="cari" value="Cari Produk">
        </form> 
      </div>
    </div>
    
    <!-- produk detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                <img src="produk/<?php echo $p->product_image?>" width="80%">
                </div>
                <div class="col-2">
                <h3><?php echo $p->product_name?></h3>
                <h4>Rp.<?php echo number_format($p->product_price)?> </h4>
                <p>Deskripsi :<br>
                <?php echo  $p->product_descriptio ?>
                </p>
                <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp?>
                &text=Apakah Barang Yang Anda Jual Tersedia...?" target="_blank">Hubungi via Wa 
                <img src="img/icon-wa.jpg"width="50px"></a></p>
                </div>
            </div>
        </div>
    </div>
      
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                <p><?php echo $a->admin_address?></p>

                <h4>Email</h4>
                <p><?php echo $a->admin_email?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->admin_telp?></P>
                <small>Copyright &copy; 2022 - PetaniHIDRO</small>
            </div>
        </div>
</body>
</html>