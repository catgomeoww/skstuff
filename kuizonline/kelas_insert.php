<?php
include("sambungan.php");

$idkelas = $_POST["idkelas"];
$namakelas = $_POST["namakelas"];

$conn = new mysqli('localhost','root','','kuizonline');
if($conn->connect_error){
     die(' Tidak Berjaya : '.$conn->connect_error);
}else{
     $stmt = $conn->prepare("insert into kelas(idkelas, namakelas)
             values(?,?)");
     $stmt->bind_param("ss",$idkelas, $namakelas);
     $stmt->execute();
     echo " Berjaya";
     $stmt->close();
     $conn->close();
}
?>
<head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>