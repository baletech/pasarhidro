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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
</head>
<body>
 <!-- header -->
 <header>
    <div class="container">
    <h1><a href="dashboard.php">PetaniHIDRO</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="data-kategori.php">Data Kategory</a></li>
        <li><a href="data-produk.php">Data Produk</a></li>
        <li><a href="keluar.php">Keluar</a></li>
    </ul>
    </div>
 </header>
 <!-- conten -->
 <div class="section">
 <div class="container">
    <h3>Tambah Data Produk</h3>
    <div class="box">
    <form action="" method="POST" enctype="multipart/form-data">
        <select class="input-control" name="kategori" required>
            <option value=>"--pilih--"</option>
        <?php
            $pemilik = $_SESSION['id'];
            
            $liatProduk = "SELECT * FROM tb_category WHERE pemilik=$pemilik ORDER BY category_id DESC";
            $kategori = mysqli_query($conn,  $liatProduk);
            while($r = mysqli_fetch_array($kategori)){
        ?>
        <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name'];?></option>
        <?php
            }
        ?>

        </select>
        <input type="text" name="nama" class="input-control" placeholder="Nama Produk" require>
        <input type="text" name="harga" class="input-control" placeholder="Harga" require>
        <input type="file" name="gambar" class="input-control" require>
        <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea> <br>
        <select class="input-control" name="status">
            <option value="">--pilih--</option>
            <option value="1">--Aktif--</option>
            <option value="0">--Tidak Aktip--</option>
        </select>

        <input type="submit" name="submit" value="submit" class="btn">
     </form>
     <?php
     if(isset($_POST['submit'])){

        // print_r($_FILES['gambar']);
        //menampung inputan dari form
        $kategori      = $_POST['kategori'];
        $nama          = $_POST['nama'];
        $harga         = $_POST['harga'];
        $deskripsi     = $_POST['deskripsi'];
        $status        = $_POST['status'];

        //menampung data file yang di upload
        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        $type1 = explode('.',$filename);
        $type2 = $type1[1];
        

        $newname = 'produk'.time().'.'.$type2;

        //menampung data format file yang diizinkan
        $tipe_diizinkan = array('jpg','jpeg','png','gif');

        //validasi format fie
        if(!in_array($type2, $tipe_diizinkan)){
            //jika format file tidak diizinkan 
            echo '<script>alert("format file tidak diizinkan")</script>';
        }else{
            //jika format file sesuai dengan yang ada di dalam arry tipe diizinkan
             //proses upload file sekaligus insert ke data base
            move_uploaded_file($tmp_name,'./produk/'.$newname);

            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUE (
                    null,
                    '".$kategori."',
                    '".$nama."',
                    '".$harga."',
                    '".$deskripsi."',
                    '".$newname."',
                    '".$status  ."',
                    null
                     )");

        if($insert){
            
            echo '<script>alert("Tambah Data Berhasil")</script>';
            echo '<script>window.location="data-produk.php"</script>';

        }else{
            echo 'gagal'.mysqli_error($conn);
        }

        }

       
     }
      
      ?> 
     </div>
    
     </div>

 </div>

 </div>
<footer>
 <div class="container">
    <small>Copyright &copy; 2022 petani sejahtera</small>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
 </div>
</body>
</html>