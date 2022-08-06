<?php

        session_start();
        include 'db.php';
        if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
        if(mysqli_num_rows($produk) == 0 ){
        echo '<script>window.location="data-produk.php"</script>';   
    }
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
    <h3>Edit Data Produk</h3>
    <div class="box">
    <form action="" method="POST" enctype="multipart/form-data">
        <select class="input-control" name="kategoi" required>
            <option value=>"--pilih--"</option>
        <?php
            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC" );
            while($r = mysqli_fetch_array($kategori)){
        ?>
        <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p-> category_id)? 'selected'
        :'';?>><?php echo $r['category_name'] ?></option>
        <?php
            }
        ?>

        </select>
        <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name?>" required>
        <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price?>"required>
      
        <img src="produk/<?php echo $p->product_image ?>" width="100px">
        <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
        <input type="file" name="gambar" class="input-control">
        <textarea class="input-control" name="deskripsi" placeholder= "Deskripsi"><?php echo $p->product_descriptio?>"</textarea> <br>
        <select class="input-control" name="status">
            <option value="">--pilih--</option>
            <option value="1" <?php echo($p->product_status == 1)? 'selected':'';?>>--Aktif--</option>
            <option value="0" <?php echo($p->product_status == 0)? 'selected':'';?>>--Tidak Aktip--</option>
        </select>

        <input type="submit" name="submit" value="submit" class="btn">
     </form>
     <?php
     if(isset($_POST['submit'])){
    
        //data inputan dari form

        $kategori      = $_POST['kategori'];
        $nama          = $_POST['nama'];
        $harga         = $_POST['harga'];
        $deskripsi     = $_POST['deskripsi'];
        $status        = $_POST['status'];
        $foto          = $_POST['foto'];

        // data gambar yang baru

        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

      
        //jika admin ganti gambar

        if($filename != ''){

            $type1 = explode('.',$filename);
            $type2 = $type1[1];
            
    
            $newname = 'produk'.time().'.'.$type2;
    
            // menampung data format file yang diizinkan
            $tipe_diizinkan = array('jpg','jpeg','png','gif');
    

        //validasi format fie
        if(!in_array($type2, $tipe_diizinkan)){
        //jika format file tidak diizinkan 
            echo '<script>alert("format file tidak diizinkan")</script>';

        }else{
        //menghapus data produk yang lama di folder produk
            unlink('./produk/'.$foto);
        //proses upload file sekaligus insert ke data base
            move_uploaded_file($tmp_name,'./produk/'.$newname);
        //tampung data gambar baru
            $namagambar = $newname;

        }
            
        }else{
        //jika admin tidak ganti gambar
            $namagambar = $foto;
        }
        //quary update produk
            $update = mysqli_query($conn, "UPDATE tb_product SET
                    category_id         = '".$kategori      ."',
                    product_name        = '".$nama          ."',
                    product_price       = '".$harga         ."',
                    product_descriptio  = '".$deskripsi     ."',
                    product_image       = '".$namagambar    ."',
                    product_status      = '".$status        ."'
                    WHERE product_id    = '".$p->product_id ."'");
    if($update){
            
         echo '<script>alert("Tambah Data Berhasil")</script>';
         echo '<script>window.location="data-produk.php"</script>';
                                
    }else{
         echo 'gagal'.mysqli_error($conn);

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