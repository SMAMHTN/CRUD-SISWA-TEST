<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Siswa</title>
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
        <a href="homeadmin.php">Home Admin</a> 
        <br/><br/>

        <div class="Tabel">
        <h2>Tambah Sekolah</h2>
        <form action="addSekolah.php" method="post" name="form1"> 
            <table width="25%" border="0"> 
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id_sekolah"></td> 
                </tr>
                <tr>
                    <td>Nama Sekolah</td>
                    <td><input type="text" name="nama_sekolah"></td> 
                </tr> 
                <tr>
                    <td>Alamat Sekolah</td> 
                    <td><input type="text" name="alamat_sekolah"></td> 
                </tr>
                <tr>
                    <td>Akreditasi</td> 
                    <td><input type="text" name="akreditasi_sekolah"></td> 
                </tr>
                <tr>
                    <td>ID Jenjang</td> 
                    <td><input type="text" name="id_jenjang"></td> 
                </tr>
                <tr>
                    <td></td> 
                    <td><input type="submit" name="Submit" value="Add"></td> 
                </tr> 
            </table> 
        </form>
        </div>

        <?php
            // Check If form submitted, insert form data into users table.
            if(isset($_POST['Submit'])) { 
                $id_sekolah = $_POST['id_sekolah']; 
                $nama_sekolah = $_POST['nama_sekolah'];
                $alamat_sekolah = $_POST['alamat_sekolah'];
                $akreditasi_sekolah = $_POST['akreditasi_sekolah'];
                $id_jenjang = $_POST['id_jenjang'];

                // include database connection file 
                include_once("config.php");

                // Insert user data into table 
                $result = mysqli_query($link, "INSERT INTO sekolah(id_sekolah, nama_sekolah, alamat_sekolah, akreditasi_sekolah, id_jenjang) VALUES('$id_sekolah', '$nama_sekolah', '$alamat_sekolah', '$akreditasi_sekolah', '$id_jenjang')"); 
                // Show message when user added 
                echo "Berhasil menambahkan $nama_sekolah ke Katalog Tabel Sekolah! <br><a href='homeadmin.php'>Kembali ke Home Admin</a>"; 
            }
        ?>
    </body>
</html>