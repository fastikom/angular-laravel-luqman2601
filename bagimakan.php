<!DOCTYPE html>
<?php include"fungsilib.php";
      include"koneksi.php";
?>
<html>
<head>
  <title>Jadwal Makan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dir/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="dir/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:relative;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:relative;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:relative;color: #fff; background-color: #ff9800;}
 
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid<script id="gpt-impl-0.5316251250915229" src="http://partner.googleadservices.com/gpt/pubads_impl_79.js"></script>id">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Jadwal Makan Anda</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Makan Pagi</a></li>
          <li><a href="#section2">Makan Ringan</a></li>
          <li><a href="#section3">Makan Siang & Malam</a></li>
          <li><a href=""><button  class="btn btn-success btn-sm">Kembali</button></a></li>
          <li><a href="index.php"><button  class="btn btn-success btn-sm">Coba lagi</button></a></li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1>Makan Pagi</h1>
  <div class="row">
    <div class="col-sm-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Makan Pokok</th>
        <th>Sayuran</th>
        <th>Lauk</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
<?php
  $cetak=PembagianKalori($ak,$um,$tb,$jk);
  $rowset = mysql_query("select * from sayuran s,lauk l inner join 
        poko p on p.kaloriPokok where p.kaloriPokok+s.kaloriSayuran+l.kaloriLauk<=$cetak[0]
        and p.namaPokok='$mp'");
     
        while($dp = mysql_fetch_array($rowset)){
       
          
  /*
  $sub="select * from poko where kalori<=$cetak[0]";
  $sql=mysql_query($sub);
  while($data=mysql_fetch_array($sql)){*/
?>
<td><?php echo $dp['beratPokok']." gr ".$dp['namaPokok'];?></td>
<td><?php echo $dp['beratSayuran']." gr ".$dp['namaSayuran'];?></td>
<td><?php echo $dp['beratLauk']." gr ".$dp['namaLauk'];?></td>
</tr><?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
<div id="section2" class="container-fluid">
  <h1>Makan Ringan</h1>
  <div class="row">
    <div class="col-sm-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Makan Ringan</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
<?php
  $cetak=PembagianKalori($ak,$um,$tb,$jk);
  $rowset = mysql_query("select * from ringan where kalori<=$cetak[1]
        ");
      
        while($dp = mysql_fetch_array($rowset)){
        
          
  /*
  $sub="select * from poko where kalori<=$cetak[0]";
  $sql=mysql_query($sub);
  while($data=mysql_fetch_array($sql)){*/
?>
<td><?php echo $dp['berat']." gr ".$dp['nama_makanan'];?></td>

</tr><?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
<div id="section3" class="container-fluid">
  <h1>Makan Siang & Malam</h1>
  <div class="row">
    <div class="col-sm-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Makan Pokok</th>
        <th>Sayuran</th>
        <th>Lauk</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
<?php
  $cetak=PembagianKalori($ak,$um,$tb,$jk);
  $rowset1 = mysql_query("select * from sayuran s,lauk l inner join 
        poko p on p.kaloriPokok where p.kaloriPokok+s.kaloriSayuran+l.kaloriLauk<=$cetak[2]
        and p.namaPokok='$mp'");
      
        while($dp = mysql_fetch_array($rowset1)){
        
          
  /*
  $sub="select * from poko where kalori<=$cetak[0]";
  $sql=mysql_query($sub);
  while($data=mysql_fetch_array($sql)){*/
?>
<td><?php echo $dp['beratPokok']." gr ".$dp['namaPokok'];?></td>
<td><?php echo $dp['beratSayuran']." gr ".$dp['namaSayuran'];?></td>
<td><?php echo $dp['beratLauk']." gr ".$dp['namaLauk'];?></td>
</tr><?php } ?>
</div>
</tbody>
</table>
</div>
</div>

<script>
$(document).ready(function(){
    $('body').scrollspy({target: ".navbar", offset: 50});   
});
</script>

</body>
</html>