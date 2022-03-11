<?php
    include_once("config.php");
    
    //Inisialisasi sesi
    session_start();
    
    //Mengecek apakah user telah login, jika tidak akan kembali ke halaman login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginadmin.php");
        exit;
    }

    $listsekolah = mysqli_query($link, "SELECT * FROM sekolah WHERE is_delete=0 ORDER BY id_sekolah");
    $listjenjang = mysqli_query($link, "SELECT * FROM jenjang WHERE is_delete=0 ORDER BY id_jenjang");
    $listhandphone = mysqli_query($link, "SELECT * FROM view_siswa");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage Admin</title>
        <script src="https://kit.fontawesome.com/10cb25b44c.js" crossorigin="anonymous"></script>
        <style>
            body{ 
            font: 14px sans-serif; 
            background-color: rgb(0, 0, 0);
            background-image: url("https://henricoschools.us/wp-content/uploads/Microsoft-Teams-Background_School-Supplies_White-background.png");
            background-repeat: no-repeat;
            background-size: cover;
            }
            h3 {
                text-align: center;
            }
            table {
                margin-left: auto;
                margin-right: auto;
            }
            th {
                padding: 10px 10px 10px 10px;
                text-align: center;
            }
            tr  {
                text-align: center;
            }
            td {
                padding: 10px 10px 10px 10px;
            }
            p {
                text-align: center;
            }
            .Tabel {
                margin-bottom: 10px;
                margin-left: 20px;
                margin-right: 20px;
                border-style: solid;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align: center">
            <h1>Data Siswa, Sekolah, dan Jenjang</h1>
        </div>
        
        <div class='Tabel'>
        <h3>Tabel Sekolah</h3>
        <table width='80%' border=1>
        <p>
            <a href="addSekolah.php">Tambah Sekolah</a>
        </p> 
            <tr>
                <th>ID Sekolah</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> <th>Aksi</th>  
            </tr>

            <?php
                while($item = mysqli_fetch_array($listsekolah)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_sekolah']."</td>"; 
                    echo "<td>".$item['nama_sekolah']."</td>"; 
                    echo "<td>".$item['alamat_sekolah']."</td>"; 
                    echo "<td>".$item['akreditasi_sekolah']."</td>";
                    echo "<td><a href='editSekolah.php?id=$item[id_sekolah]'>Edit</a> 
                    | 
                    <a href='softdeleteSekolah.php?id=$item[id_sekolah]'>Soft Delete</a></td></tr>";
                }
            ?>
        </table><br>
        </div>

        <div class='Tabel'>
        <h3>Tabel jenjang</h3>
        <table width='80%' border=1>
        <p>
            <a href="addJenjang.php">Tambah Jenjang</a>
        </p> 
            <tr>
                <th>ID Jenjang</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th>  <th>Aksi</th> 
            </tr>
        
            <?php
                while($item = mysqli_fetch_array($listjenjang)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_jenjang']."</td>"; 
                    echo "<td>".$item['jenjang_pendidikan']."</td>"; 
                    echo "<td>".$item['jumlah_kelas']."</td>"; 
                    echo "<td><a href='editJenjang.php?id=$item[id_jenjang]'>Edit</a> 
                    | 
                    <a href='softdeleteJenjang.php?id=$item[id_jenjang]'>Soft Delete</a></td></tr>"; 
                }
            ?>
        </table><br>
        </div>
        
        <div class='Tabel'>
        <h3>Tabel Siswa</h3>
        <table width='80%' border=1>
        <p>
            <a href="addSiswa.php">Tambah Siswa</a>
        </p>
            <tr>
                <th>ID Siswa</th> <th>Nama Siswa</th> <th>No HP</th> <th>Wali Siswa</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th> <th>Aksi</th>
            </tr>
            
            <?php
                while($item = mysqli_fetch_array($listhandphone)) {
                    echo "<tr>";
                    echo "<td>".$item['id_siswa']."</td>";
                    echo "<td>".$item['nama_siswa']."</td>";
                    echo "<td>".$item['no_hp_siswa']."</td>";
                    echo "<td>".$item['wali_siswa']."</td>";
                    echo "<td>".$item['nama_sekolah']."</td>";
                    echo "<td>".$item['alamat_sekolah']."</td>";
                    echo "<td>".$item['akreditasi_sekolah']."</td>";
                    echo "<td>".$item['jenjang_pendidikan']."</td>";
                    echo "<td>".$item['jumlah_kelas']."</td>";
                    echo "<td><a href='editSiswa.php?id=$item[id_siswa]'>Edit</a> 
                    | 
                    <a href='softdeleteSiswa.php?id=$item[id_siswa]'>Soft Delete</a></td></tr>";
                } 
            ?>
        </table><br>
        </div>
        
        <div style="text-align: center">
            <b><a href="viewSoftDelete.php"><i class="fas fa-trash-alt"></i></a></b>
        </div>

        <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
        </p>
    </body>
</html>