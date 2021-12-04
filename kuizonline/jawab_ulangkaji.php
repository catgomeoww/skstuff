<?php
  include('sambungan.php');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $idtopik = $_GET['idtopik'];
  }
?>
<link rel="stylesheet" href="senarai.css">
<table>
    <tr>
        <caption>SCHEME AND RESULTS</caption>
        <th>BIL</th>
        <th>QUESTIONS</th>
        <th>RESULTS</th>
    </tr>
<?php
    $jumlah = 0;
    $betul = 0;
    $idpelajar = $_SESSION['username'];
    $sql = "select * from kuiz join soalan on kuiz.idsoalan = soalan.idsoalan 
    where soalan.idtopik='".$idtopik."' and idpelajar = '".$idpelajar."'";
    $data = mysqli_query($sambungan, $sql);
    $bil = 1;
    while ($kuiz = mysqli_fetch_array($data)) {
?>
  <tr>
      <td class="bil"><?php echo $bil;?></td>
      <td class="soalan">
          <?php
              echo $kuiz['namasoalan']."<br>";
              echo "A.".$kuiz['pilihana']."<br>";
              echo "B.".$kuiz['pilihanb']."<br>";
              echo "C.".$kuiz['pilihanc']."<br>";
          ?>
      </td>
      <td class="skema">
          <?php
              echo "Jawapannya : ".$kuiz['jawapan']."<br>";
              echo "Anda pilih : ".$kuiz['pilih']."<br>";
              if ( $kuiz['pilih'] == $kuiz['jawapan']) {
                  echo "<img src='betul.png'>";
                  $betul = $betul + 1;
              }
              else
                  echo "<img src='salah.png'>";
          ?>
      </td>
  </tr>
  <?php
      $idsoalan[$bil-1] = $kuiz['idsoalan'];
      $bil = $bil + 1;
      $jumlah = $jumlah + 1;
      $topik = $kuiz['namatopik'];
    }
    ?>
</table>
<?php
    $peratus = $betul / $jumlah * 100;
    $salah = $jumlah - $betul;

    for ($i = 0; $i < count($idsoalan);$i++) {
        $sql = "update kuiz set peratus = $peratus where idsoalan='".$idsoalan[$i]."' and 
        idpelajar = '".$idpelajar."'";
        $data = mysqli_query($sambungan, $sql);
    }
?>
<table>
 <caption>INDIVIDUAL PERFORMANCE RESULTS</caption>
  <tr>
      <th class="results">Topic</th>
      <th class="results"><?php echo $topik; ?></th>
  </tr>
  <tr>
      <td class="results">CORRECT ANSWERS</td>
      <td class="results"><?php echo $betul ?></td>
  </tr>
  <tr>
      <td class="results">WRONG ANSWERS</td>
      <td class="results"><?php echo $salah ?></td>
  </tr>
  <tr>
      <td class="results">TOTAL QUESTIONS</td>
      <td class="results"><?php echo $jumlah ?></td>
  </tr>
  <tr>
      <td class="results">RESULTS</td>
      <td class="results"><?php echo number_format($peratus,0) ?> % </td>
  </tr>
</table>
<head>
    <style>
    body{
        background-image: url(backgroundcolor.jpg);
    }
    </style>
</head>