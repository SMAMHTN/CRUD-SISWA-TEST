<?php 
    // include database connection file 
    include_once("config.php"); 

    $listsekolah = mysqli_query($link, "SELECT * FROM sekolah WHERE is_delete=0 ORDER BY id_sekolah");
    $listjenjang = mysqli_query($link, "SELECT * FROM jenjang WHERE is_delete=0 ORDER BY id_jenjang");
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id_siswa = $_POST['id_siswa']; 
        $nama_siswa = $_POST['nama_siswa']; 
        $no_hp_siswa = $_POST['no_hp_siswa'];
        $wali_siswa = $_POST['wali_siswa'];
        $id_sekolah = $_POST['id_sekolah']; 
        $id_jenjang = $_POST['id_jenjang'];
        
        // update data 
        $result = mysqli_query($link, "UPDATE siswa SET id_siswa='$id_siswa', nama_siswa='$nama_siswa', no_hp_siswa='$no_hp_siswa', wali_siswa='$wali_siswa', id_sekolah='$id_sekolah', id_jenjang='$id_jenjang' WHERE id_siswa=$id_siswa"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected minuman based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM siswa WHERE id_siswa=$id");

    while($siswa = mysqli_fetch_array($result)) { 
        $id_siswa = $siswa['id_siswa']; 
        $nama_siswa = $siswa['nama_siswa']; 
        $no_hp_siswa = $siswa['no_hp_siswa'];
        $wali_siswa = $siswa['wali_siswa'];
        $id_sekolah = $siswa['id_sekolah']; 
        $id_jenjang = $siswa['id_jenjang'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Siswa</title>
        <style>
            body{ 
            font: 14px sans-serif; 
            background-color: rgb(0, 0, 0);
            background-image: url("https://henricoschools.us/wp-content/uploads/Microsoft-Teams-Background_School-Supplies_White-background.png");
            background-repeat: no-repeat;
            background-size: cover;
            }
            table {
                margin-left: auto;
                margin-right: auto;
            }
            h2 {
                text-align: center;
            }
            h3 {
                text-align: center;
            }
            h4 {
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
            td  {
                text-align: center;
                padding: 7px 10px 7px 10px;
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
    <body><a href="homeadmin.php">Home Admin</a> 
    <br/><br/> 
    
    <h2>Edit Tabel Siswa</h2> 

        <div class="Tabel">
        <form name="update_siswa" method="post" action="editSiswa.php">
            <table border="0"> 
                <tr>
                    <td>ID Siswa</td> 
                    <td><input type="text" name="id_siswa" value=<?php echo $id_siswa;?>></td>
                </tr> 
                
                <tr>
                    <td>Nama Siswa</td> 
                    <td><input type="text" name="nama_siswa" value=<?php echo $nama_siswa;?>></td> 
                </tr> 

                <tr>
                    <td>No HP</td> 
                    <td><input type="text" name="no_hp_siswa" value=<?php echo $no_hp_siswa;?>></td> 
                </tr>

                <tr>
                    <td>Nama Wali</td> 
                    <td><input type="text" name="wali_siswa" value=<?php echo $wali_siswa;?>></td> 
                </tr>

                <tr>
                    <td>ID Sekolah</td> 
                    <td><input type="text" name="id_sekolah" value=<?php echo $id_sekolah;?>></td> 
                </tr>

                <tr>
                    <td>ID Jenjang</td> 
                    <td><input type="text" name="id_jenjang" value=<?php echo $id_jenjang;?>></td> 
                </tr>

                <tr> 
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td> 
                    <td><input type="submit" name="update" value="Update"></td> 
                </tr> 
            </table> 
        </form>
        </div>

        <h3>Masukkan ID Sekolah dan Jenjang sesuai nomor tabel di bawah:</h3>

        <div class="Tabel">
        <h4>Daftar Sekolah</h4>
        <table width='80%' border=1>
            <tr>
                <th>ID Sekolah</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> 
            </tr>

            <?php
                while($item = mysqli_fetch_array($listsekolah)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_sekolah']."</td>"; 
                    echo "<td>".$item['nama_sekolah']."</td>"; 
                    echo "<td>".$item['alamat_sekolah']."</td>"; 
                    echo "<td>".$item['akreditasi_sekolah']."</td>"; 
                }
            ?>
        </table><br>
        </div>

        <div class="Tabel">
        <h4>Daftar Jenjang</h4>
        <table width='80%' border=1>
            <tr>
                <th>ID Jenjang</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th> 
            </tr>
        
            <?php
                while($item = mysqli_fetch_array($listjenjang)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_jenjang']."</td>"; 
                    echo "<td>".$item['jenjang_pendidikan']."</td>"; 
                    echo "<td>".$item['jumlah_kelas']."</td>"; 
                }
            ?>
        </table><br>
        </div>
    </body>
</html>