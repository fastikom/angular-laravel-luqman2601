<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>HITUNG BERAT BADAN IDEAL dan KALORI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<br>

<div id="formoid-info">
<div class="title"><h2>Asty Riyani [2014150095]<br>Fitri Syukriasari [2014150097]<br>Astuti [2014150099]</h2></div>
</div>

<body class="blurBg-true" style="background-color:#EBEBEB">
<!-- Start Formoid form-->
<link rel="stylesheet" href="index_files/formoid1/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="index_files/formoid1/jquery.min.js"></script>
<form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" methode="POST" >

<div class="title"><h2>HITUNG BERAT BADAN IDEAL dan KALORI</h2></div>

	<div class="element-name" >
	
	<label class="title">Masukan Nama Anda *</label>
	

	<input  class="large" type="text" size="10" name="nama" required/>


	</div>
	
	<div class="element-radio" >
	<label class="title">Pilih Gender</label>		
		<div class="column column2"><input type="radio" name="gender" value="Pria" />
			<span>Pria</span><br/>
		</div>
		<span class="clearfix"></span>

		<div class="column column2"><input type="radio" name="gender" value="Wanita" />
			<span>Wanita</span><br/>
		</div>
		<span class="clearfix"></span>
	</div>
	
	<div class="element-number" ><label class="title">Masukkan Tinggi Badan</label>
		<input class="large" type="text" min="0" max="250" name="tinggibadan"  value=""/>
	</div>

	<div class="element-radio" >
	<label class="title">Pilih Aktifitas Harian Anda</label>
		<div class="column column3">
		<input type="radio" name="aktivitas" value="Ringan" /><span>Ringan</span><br/></div><span class="clearfix"></span>
		
		<div class="column column3">
		<input type="radio" name="aktivitas" value="Sedang" /><span>Sedang</span><br/></div><span class="clearfix"></span>

		<div class="column column3">
		<input type="radio" name="aktivitas" value="Berat" /><span>Berat</span><br/></div><span class="clearfix"></span>
	</div>

	<div class="element-number" ><label class="title">Masukan usia anda</label><input class="large" type="text" min="0" max="120" name="usia"  value=""/></div>

<div class="submit"><input type="submit" name="enter" value="Proses"/> </div></form>
<script type="text/javascript" src="index_files/formoid1/formoid-default-skyblue.js"></script>


</body>
</html>
<br>
<center>
<font color="red" size="5"> 
<?php
$nama = $_GET['nama']?:'';
$tinggibadan=isset($_GET['tinggibadan'])?$_GET['tinggibadan']:'';
$usia=isset($_GET['usia'])?$_GET['usia']:'';
$gender=isset($_GET['gender'])?$_GET['gender']:'';
$aktivitas=isset($_GET['aktivitas'])?$_GET['aktivitas']:'';

if(!empty($tinggibadan) and !empty($usia) and !empty($gender) and !empty($aktivitas))
{
?>

<?php

echo "Nama Anda : $nama";

$bbn = $tinggibadan - 100;
echo "<br>Berat Badan Normal anda : $bbn ";

if($gender == "Pria" && $tinggibadan >= 160 ||$gender == "Wanita" && $tinggibadan >= 150){
	$bbi = $bbn - (0.1 * $bbn);
	echo "<br>Berat Badan Ideal anda : $bbi";
}else if($gender == "Pria" && $tinggibadan < 160 ||$gender == "Wanita" && $tinggibadan < 150){
	$bbi = $bbn - 1;
	echo "<br>Berat Badan Ideal anda : $bbi";
}

if($gender == "Pria"){
	$kb = $bbi * 30;
	echo "<br>Kebutuhan Kalori anda : $kb kkal";
}else {
	$kb = $bbi * 25;
	echo "<br>Kebutuhan Kalori anda : $kb kkal";
}

if($usia <=39){
	echo "<br>Kebutuhan Kalori anda berdasarkan usia : 0 kkal ";
}else if($usia >=40 && $usia <= 59){
	$kbu = $kb - 0.05;
	echo "<br>Kebutuhan Kalori anda berdasarkan usia : $kbu kkal";
}else if($usia >=60 && $usia <= 569){
	$kbu = $kb - 0.1;
	echo "<br>Kebutuhan Kalori anda berdasarkan usia : $kbu kkal";
}else if($usia >=70){
	$kbu = $kb - 0.2;
	echo "<br>Kebutuhan Kalori anda berdasarkan usia : $kbu kkal";
}

if($aktivitas == "Ringan"){
	$kba = $kb - 0.2;
	echo "<br>Kebutuhan Kalori anda berdasarkan aktivitas : $kba kkal";
}else if($aktivitas == "Sedang"){
	$kba = $kb - 0.3;
	echo "<br>Kebutuhan Kalori anda berdasarkan aktivitas : $kba kkal";
}else if($aktivitas == "Berat"){
	$kba = $kb - 0.5;
	echo "<br>Kebutuhan Kalori anda berdasarkan aktivitas : $kba kkal";
}
?>

<?php
}else{
		echo"<script>alert('Data Kosong')</script>";
}
?>

</font>
<br>
<a href="index.php"> Coba Lagi</a>
</center>
<br><br>