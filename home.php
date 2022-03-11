<?php
    include_once("config.php");

    //Inisialisasi sesi
    session_start();
    
    //Mengecek apakah user telah login, jika tidak akan kembali ke halaman login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $listviewsiswa = mysqli_query($link, "SELECT * FROM view_siswa WHERE LOWER(nama_siswa) LIKE LOWER('%".$search."%')");
    } else {
        $listviewsiswa = mysqli_query($link, "SELECT * FROM view_siswa");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; 
            text-align: center; 
            background-color: rgb(0, 0, 0);
            background-image: url("https://henricoschools.us/wp-content/uploads/Microsoft-Teams-Background_School-Supplies_White-background.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1 {
            margin-left: 10px;
            margin-right: 10px;
            color: rgb(48, 46, 34);
        }
        h3 {
            text-align: center;
            color: rgb(74, 71, 53);
            font-weight: bold;
        }
        table {
            margin-left: auto;
            margin-right: auto;
            border-color: rgb(74, 71, 53);
        }
        th {
            padding: 10px 10px 10px 10px;
            text-align: center;
            font-weight: bold;
            font-size: 17px;
            background-color: rgb(48, 46, 34);
            color: rgb(219, 211, 171);
        }
        tr  {
            text-align: center;
            color: rgb(74, 71, 53);
        }
        td {
            padding: 10px 10px 10px 10px;
            color: rgb(74, 71, 53);
        }
        p {
            text-align: center;
        }
        .Tabel {
            padding: 10px 10px 10px 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 20px;
            margin-right: 20px;
            border-style: double;
            border-width: 5px;
            background-color: rgb(255, 250, 227);
            border-color: rgb(74, 71, 53);
        }
        .TabelSearch {
            width: 35%;
            padding: 5px 5px 5px 5px;
            margin-top: 10px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            border-style: double;
            border-width: 5px;
            background-color: rgb(219, 204, 162);
            border-color: rgb(74, 71, 53);
        }
        .buttonSearch {
            background-color: rgb(74, 71, 53);
            color: rgb(255, 250, 227);
            border-color: rgb(74, 71, 53);
            border-radius: 3px;
        }
        .searchLabel {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 class="my-5">Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to Database Siswa.</h1>
    
    <div class="TabelSearch">
    <form action="home.php" method="GET" name="form1"> 
        <table width="25%" border="0"> 
            <tr>
                <td class="searchLabel">Search by Name:</td>
                <td><input type="text" name="search"></td> 
            </tr>
            <td/><td><input class="buttonSearch" type="submit" value="Search" /></td>
        </table> 
    </form>
    </div>

    <div class="Tabel">
    <h3>Tabel Siswa</h3>
        <table width='80%' border=2>
            <tr class="Search">
                <th>ID Siswa</th> <th>Nama Siswa</th> <th>No HP</th> <th>Wali Siswa</th> <th>Nama Sekolah</th> <th>Alamat Sekolah</th> <th>Akreditasi Sekolah</th> <th>Jenjang Pendidikan</th> <th>Jumlah Kelas</th>
            </tr>
            
            <?php
                while($item = mysqli_fetch_array($listviewsiswa)) {
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
                } 
            ?>
        </table><br>
    </div>
    
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
</body>
</html>

<?php
    
?>