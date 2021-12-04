<?php
include("sambungan.php");

$idsoalan = $_POST["idsoalan"];

$sql = "delete from soalan where idsoalan =
'$idsoalan' ";
$result = mysqli_query($sambungan,$sql);
if ($result == true)
    echo " berjaya padam";
else
    echo " tidak berjaya padam";
?>
<head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>