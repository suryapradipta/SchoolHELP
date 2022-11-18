<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
<br/>
<a href="tambah.php">+ TAMBAH MAHASISWA</a>
<br/>
<br/>
<table border="1">
    <tr>
        <th>NO</th>
        <th>username</th>
        <th>password</th>
        <th>email</th>
        <th>phone</th>
        <th>OPSI</th>
    </tr>
    <?php
    include 'connection.php';
    $no = 1;
    $data = mysqli_query($koneksi,"select * from user");
    while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['username']; ?></td>
            <td><?php echo $d['password']; ?></td>

        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>