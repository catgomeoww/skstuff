<?php
include('sambungan.php');
if(isset($_POST['idpelajar'])) {
    $idpelajar = $_POST["idpelajar"];
    $namapelajar = $_POST["namapelajar"];
    $idkelas = $_POST["idkelas"];
    $password = $_POST["password"];
    $sql = "insert into pelajar values('$idpelajar', '$namapelajar', '$idkelas', '$password')";
    $berjaya = mysqli_query($sambungan, $sql);
    if ($berjaya == true)
        echo "<script>alert('Berjaya Signup')</script>";
    else{
        echo "<script>alert('Tidak berjaya signup');</script>";
    echo "Ralat : $sql<br>".mysqli_error($sambungan);
    echo "<script>window.location='login.php'</script>";
    }
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body background="">
    <center>
    <img src='welcome.png'><br>
    <img src='tajuk.png'>
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pelajar</td>
            <td><input type="text" name="idpelajar" placeholder="P001 max 4 char"></td>
        </tr>
        <tr>
            <td>Nama Pelajar</td>
            <td><input type="text" name="namapelajar"></td> 
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
            <select name="idkelas">
            <?php
            $sql = "select * from kelas";
            $data = mysqli_query($sambungan, $sql);
            while ($kelas = mysqli_fetch_array($data)) {
                echo "<option value='$kelas[idkelas]'>$kelas[namakelas]</option>";
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="max: 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit">Daftar</button>
    <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
    </form>
</body>
        <head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>