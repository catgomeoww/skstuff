<?php
include("sambungan.php");

$idkelas = $_POST["idkelas"];

$sql = "delete from kelas where idkelas = '$idkelas'";
$result = mysqli_query($sambungan, $sql);
if ($result == true)
    echo " delete successful";
else
    echo " delete unsuccessful";
?>
<head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>