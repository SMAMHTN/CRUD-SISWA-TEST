<?php
    include_once("config.php");

//Inisialisasi sesi
    session_start();
    
    //Mengecek apakah user telah login, jika tidak akan kembali ke halaman login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginadmin.php");
        exit;
    }

    $sekolah = mysqli_query($link, "SELECT * FROM sekolah WHERE is_delete=1 ORDER BY id_sekolah");
    $jenjang = mysqli_query($link, "SELECT * FROM jenjang WHERE is_delete=1 ORDER BY id_jenjang");
    $siswa = mysqli_query($link, "SELECT siswa.id_siswa, siswa.nama_siswa, siswa.no_hp_siswa, siswa.wali_siswa, sekolah.nama_sekolah, sekolah.alamat_sekolah, sekolah.akreditasi_sekolah, jenjang.jenjang_pendidikan, jenjang.jumlah_kelas FROM siswa LEFT JOIN sekolah ON siswa.id_sekolah=sekolah.id_sekolah LEFT JOIN jenjang ON siswa.id_jenjang=jenjang.id_jenjang WHERE siswa.is_delete=1 ORDER BY siswa.id_siswa;");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage Admin</title>
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
            <h1>Recycle Bin Data Siswa, Sekolah, dan Jenjang</h1>
        </div>
        
        <div class='Tabel'>
        <h3>Data Sekolah</h3>
        <table width='80%' border=1>
            <tr>
                <th>ID Sekolah</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> <th>Aksi</th>   
            </tr>

            <?php
                while($item = mysqli_fetch_array($sekolah)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_sekolah']."</td>"; 
                    echo "<td>".$item['nama_sekolah']."</td>"; 
                    echo "<td>".$item['alamat_sekolah']."</td>"; 
                    echo "<td>".$item['akreditasi_sekolah']."</td>";
                    echo "<td><a href='restoreSekolah.php?id=$item[id_sekolah]'>Restore</a>
                    | 
                    <a href='deleteSekolah.php?id=$item[id_sekolah]'>Delete</a></td></tr>";
                }
            ?>
        </table><br>
        </div>

        <div class='Tabel'>
        <h3>Data Jenjang</h3>
        <table width='80%' border=1>
            <tr>
                <th>ID Jenjang</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th>  <th>Aksi</th> 
            </tr>
        
            <?php
                while($item = mysqli_fetch_array($jenjang)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_jenjang']."</td>"; 
                    echo "<td>".$item['jenjang_pendidikan']."</td>"; 
                    echo "<td>".$item['jumlah_kelas']."</td>"; 
                    echo "<td><a href='restoreJenjang.php?id=$item[id_jenjang]'>Restore</a>
                    | 
                    <a href='deleteJenjang.php?id=$item[id_jenjang]'>Delete</a></td></tr>"; 
                }
            ?>
        </table><br>
        </div>
        
        <div class='Tabel'>
        <h3>Data Siswa</h3>
        <table width='80%' border=1>
            <tr>
            <th>ID Siswa</th> <th>Nama Siswa</th> <th>No HP</th> <th>Wali Siswa</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th> <th>Aksi</th>
            </tr>
            
            <?php
                while($item = mysqli_fetch_array($siswa)) {
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
                    echo "<td><a href='restoreSiswa.php?id=$item[id_siswa]'>Restore</a> 
                    | 
                    <a href='deleteSiswa.php?id=$item[id_siswa]'>Delete</a></td></tr>";
                } 
            ?>
        </table><br>
        </div>
        
        <div style="text-align: center">
            <b><a href="homeadmin.php">Home Admin</a></b>
        </div>
    </body>
</html>