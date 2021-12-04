<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'kuizonline';

  $sambungan = mysqli_connect($host, $user, $password, $database)
  or die('Connection failed');
  echo ('Connection successful');
?>