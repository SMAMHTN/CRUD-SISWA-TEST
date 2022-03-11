<?php 
    // include database connection file 
    include_once("config.php"); 
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id_sekolah = $_POST['id_sekolah']; 
        $nama_sekolah = $_POST['nama_sekolah'];
        $alamat_sekolah = $_POST['alamat_sekolah'];
        $akreditasi_sekolah = $_POST['akreditasi_sekolah'];
        $id_jenjang = $_POST['id_jenjang'];
        
        // update data 
        $result = mysqli_query($link, "UPDATE sekolah SET id_sekolah='$id_sekolah', nama_sekolah='$nama_sekolah', alamat_sekolah='$alamat_sekolah', akreditasi_sekolah='$akreditasi_sekolah', id_jenjang='$id_jenjang' WHERE id_sekolah=$id_sekolah"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected minuman based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM sekolah WHERE id_sekolah=$id");

    while($sekolah = mysqli_fetch_array($result)) { 
        $id_sekolah = $sekolah['id_sekolah']; 
        $nama_sekolah = $sekolah['nama_sekolah'];
        $alamat_sekolah = $sekolah['alamat_sekolah'];
        $akreditasi_sekolah = $sekolah['akreditasi_sekolah'];
        $id_jenjang = $sekolah['id_jenjang'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Sekolah</title>
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
    <body><a href="homeadmin.php">Home Admin</a> 
    <br/><br/> 
    
    <div class="Tabel">
    <h2>Edit Tabel Sekolah</h2> 
        <form name="update_sekolah" method="post" action="editSekolah.php">
            <table border="0"> 
                <tr>
                    <td>ID Sekolah</td> 
                    <td><input type="text" name="id_sekolah" value=<?php echo $id_sekolah;?>></td>
                </tr> 
                
                <tr>
                    <td>Nama Sekolah</td> 
                    <td><input type="text" name="nama_sekolah" value=<?php echo $nama_sekolah;?>></td> 
                </tr> 

                <tr>
                    <td>Alamat Sekolah</td> 
                    <td><input type="text" name="alamat_sekolah" value=<?php echo $alamat_sekolah;?>></td> 
                </tr>
                <tr>
                    <td>Akreditasi Sekolah</td> 
                    <td><input type="text" name="akreditasi_sekolah" value=<?php echo $akreditasi_sekolah;?>></td> 
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
    </body>
</html>