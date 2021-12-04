<?php
include("sambungan.php");

$idkelas = $_POST["idkelas"];
$namakelas = $_POST["namakelas"];

$sql = "update kelas set namakelas =
'$namakelas' where idkelas = '$idkelas' ";
        
$result = mysqli_query($sambungan,$sql);
if ($result == true)
    echo " Update Successful";
else
    echo " Update Unsuccessful";
?>
<head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>
  