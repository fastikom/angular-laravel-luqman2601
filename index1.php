<html>
<head>

	<meta charset="utf-8" />
	<title>KALKULATOR ANTI DIABATES</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="dir/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="dir/js/bootstrap.min.js"></script>
<body background="c.jpg">
 <center><font color="red"><h1><b>KALKULATOR ANTI DIABATES</b></h1></font><br></center></marque>
<form methode="POST" action="proses.php">
<div class="container">
<div class="container">
<div class="row">
  <div class="col-md-8">
	<b>

	<font color="white"> <h4><b>
	<?php

	
	include ("config.php");
	include ("functionlib.php");
	error_reporting(0); 
	//mengatur waktu
	echo waktu();
	?>

  Lengkapi data di bawah ini sesuai yang pada diri anda sekarang<br></b></h4></font>
  <div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Masukan Nama Anda</div></li>
  <div class="panel-body">
     <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
  </div>
  </div>

  <div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Berat Badan Anda</div></li>
  <div class="panel-body">
    <select class="form-control" id="beratbadan" name="beratbadan">
    <option value=""><li>Pilih Berat Badan Anda sekarang</option></li>
      <?php
		for ($tb = 10; $tb <= 200; $tb++) {
		 echo '<option value="' .$tb.'">'.$tb.' kilogram </option>';
		}
      ?>
    </select>
  </div>
  </div>

  <div class="panel panel-warning">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Tinggi Badan Anda</div></li>
  <div class="panel-body">
     <select class="form-control" id="tinggibadan" name="tinggibadan">
     <option value=""><li>Pilih Tinggi Badan Anda</option></li>
      <?php
		for ($tb = 100; $tb <= 250; $tb++) {
		 echo '<option value="' .$tb.'">'.$tb.' centimeter </option>';
		}
      ?>
    </select>
  </div>
  </div>

  <div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Usia Anda</div></li>
  <div class="panel-body">
    <select class="form-control" id="usia" name="usia">
    <option value=""><li>Pilih Usia Anda</option></li>
      <?php
		for ($tb = 1; $tb <= 150; $tb++) {
		 echo '<option value="' .$tb.'">'.$tb.' tahun </option>';
		}
      ?>
    </select>
  </div>
  </div>

  <div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Jenis Kelamin Anda</div></li>
  <div class="panel-body">

		<label class="radio-inline">
		  <input type="radio" name="gender" id="gender" value="Pria">   <img src="dir/image/m.jpg"> <br><b><center>Pria</center></b>
		</label>

		<label class="radio-inline">
		  <input type="radio" name="gender" id="gender" value="Wanita">   <img src="dir/image/f.jpg"><br> <b><center>Wanita</center></b>
		</label>
  </div>
  </div>

  <div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading"><li>Aktivitas Anda</div></li>
  <div class="panel-body">
		<label class="radio-inline">
		  <input type="radio" name="aktivitas" id="aktivitas" value="Ringan">   <b>Ringan</b>
		</label>

		<label class="radio-inline">
		  <input type="radio" name="aktivitas" id="aktivitas" value="Sedang">   <b>Sedang</b>
		</label>

		<label class="radio-inline">
		  <input type="radio" name="aktivitas" id="aktivitas" value="Berat">   <b>Berat</b>
		</label>
  </div>
  </div>
  </b>

      </div>
	  <br><br>
	  <div class="col-md-2">
	  	<div class="alert alert-info" role="alert" style="height:400px;text-align: justify;" >
	  	<body bgcolor="red">
	<br><br><center>	
	<b>MENU UTAMA</b>
	
	  	 <tr>
    <td width="160" height="118">
    <table border="2">
	        <td width="160" align="center" height="90"><a href="index.php"> HOME </a></td>
    </tr><br>
    <tr>
    <td width="160" align="center" height="90"><a href="kalori.php"> HITUNG KALORI</a></td>
    </body>
	</tr>
    	<tr>
       <td width="160" align="center" height="90"><a href="index1.php">KALKULATOR DIABETES</a></td>
    </tr>
    </table>
    </td>
    <td width="800">
    <div>
		</div>
	  </div>
	</div>
	</center>
<br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <button type="submit" class="btn btn-danger">  <b>HITUNG</button>
  <font color="white"><big >Jagalah kesehatan anda dengan sering berolahraga...</big></font>
 

</div>
</div>
</form>
</body></html>