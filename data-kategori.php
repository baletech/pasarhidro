<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

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
    <h1><a href="dashboard.php">PetaniHIDRO</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="Profil.php">Profil</a></li>
        <li><a href="data-Kategori.php">Data Kategory</a></li>
        <li><a href="data-Produk.php">Data Produk</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
 </header>
 <!-- conten -->
 <div class="section">
 <div class="container">
    <h3>Data kategori</h3>
    <div class="box">
        
    <table border="1" cellspacing="0" class="tabel">
    <tr>
        <th width="60px">No</th>
        <th>Kategori</th>
        <th width="150">Aksi</th>
    </tr>
    <body>
        <?php
        $pemilik = $_SESSION['id'];
        $no = 1;
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE pemilik=$pemilik ORDER BY category_id DESC");
        if(mysqli_num_rows($kategori) > 0 ){
        while ($row = mysqli_fetch_array($kategori)) {
           
        
        ?>
     <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $row['category_name']?></td>
       <td><button> <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">edit</a></button>|
            |<button><a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin Ingin Hapus...?')">Hapus</a></td></button> 
     </tr> 
     <?php 
        }}else{   ?> 
        <tr>
         <td clospan="3">Tidak Ada Data</td>
        </tr>
        <?php }?> 
    </body>
    </table><br>
    <button><p><a href="tambah-kategori.php">Tambah Data</a></p></button> 
  


 </div>
 </div>

 </div>
<footer>
 <div class="container">
    <small>Copyright &copy; 2022 petani sejahtera</small>
    </footer>
 </div>
</body>
</html>