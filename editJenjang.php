<?php 
    // include database connection file 
    include_once("config.php"); 
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id_jenjang = $_POST['id_jenjang']; 
        $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
        $jumlah_kelas = $_POST['jumlah_kelas'];
        
        // update data 
        $result = mysqli_query($link, "UPDATE jenjang SET id_jenjang='$id_jenjang', jenjang_pendidikan='$jenjang_pendidikan', jumlah_kelas='$jumlah_kelas' WHERE id_jenjang=$id_jenjang"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected minuman based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM jenjang WHERE id_jenjang=$id");

    while($jenjang = mysqli_fetch_array($result)) { 
        $id_jenjang = $jenjang['id_jenjang']; 
        $jenjang_pendidikan=$jenjang['jenjang_pendidikan']; 
        $jumlah_kelas=$jenjang['jumlah_kelas'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Jenjang</title>
    </head>
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
                padding: 10px 10px 10px 10px;
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
    <body>
    <body><a href="homeadmin.php">Home Admin</a> 
    <br/><br/> 
    
    <div class="Tabel">
    <h2>Edit Tabel Jenjang</h2> 
        <form name="update_jenjang" method="post" action="editJenjang.php">
            <table border="0"> 
                <tr>
                    <td>ID</td> 
                    <td><input type="text" name="id_jenjang" value=<?php echo $id_jenjang;?>></td>
                </tr> 
                
                <tr>
                    <td>Jenjang Pendidikan</td> 
                    <td><input type="text" name="jenjang_pendidikan" value=<?php echo $jenjang_pendidikan;?>></td> 
                </tr> 

                <tr>
                    <td>Jumlah Kelas</td> 
                    <td><input type="text" name="jumlah_kelas" value=<?php echo $jumlah_kelas;?>></td> 
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