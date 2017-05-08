<?php include "atas.php";?> 
<html>
 <body>
 <body background="2.jpg">
 <center>
	<form method="post">
	Masukan nama anda:<br>
	<input name="nama" type="text"><br><br>
	
	Masukan tinggi anda:<br>
	<input name="tinggi" type="text"> cm<br><br>
	
	Usia anda:<br>
	<input type="text" name="usia"> tahun<br><br>
	Aktivitas sehari-hari anda:
      <select name="activitas">
      <option value="r">RINGAN</option>
      <option value="s">SEDANG</option>
      <option value="b">BERAT</option>

     </select>
	Jenis kelamin:
		<Select name="jk" ><br>
		<option value="p">PRIA</option>
		<option value="w">WANITA</option>
		</select><br><br>

		<br><input type="Submit" value="Hitung"><br />

<?php
$usia=$_POST['usia'];
$tb=$_POST['tinggi'];

//menghitung bbn
if($_POST['jk']=="p")
	{
	$bbn = $tb-100;
	}

else if($_POST['jk']=="w")
	{
	$bbn = $tb-100;
	}

else{

     	$bbn;

    	}
//menghitung bbi
if($_POST['jk']=="p" && $tb >=160)
	{
	$bbi = $bbn - (10/100 * $bbn);
	}
else if($_POST['jk']=="p" && $tb <160)
	{
	$bbi = $bbn - 0;
	}

else if($_POST['jk']=="w" && $tb >=150)
	{
	$bbi = $bbn - (10/100 * $bbn);
	}
	
else if($_POST['jk']=="w" && $tb <150)
	{
	$bbi = $bbn - 0;
	}
else{

     	$bbn=$bbi;

    	}

//menghitung kebutuhan kalori
if($_POST['jk']=="p")
	{
	$kk=$bbi * 30;
	}

else if($_POST['jk']=="w")
	{
	$kk=$bbi * 25;
	}

else{

     	$bbi=$kk;

    	}

		//menghitung kalori berdasarkan usia
if($usia < 40)
	{
	$ku=$kk - 0;
	}
else if($usia >= 40 && $usia <=59)
	{
	$ku=$kk - (5/100 * $kk);
	}

elseif($usia >=60 && $usia <=69)
	{
	$ku=$kk - (10/100 * $kk);
	}

elseif($usia >=70)
	{
	$ku=$kk - (20/100 * $kk);
	}

//menghitung kalori berdasarkan aktivitas
if($_POST['activitas']=="r")
	{
	$ka=$ku + (20/100 * $ku);
	}

elseif($_POST['activitas']=="s")
	{
	$ka=$ku + (30/100 * $ku);
	}
elseif($_POST['activitas']=="b")
	{
	$ka=$ku + (50/100 * $ku);
	}
else{

     	$ka=$ku;

    	}

//pembagian kalori
$mp=$ka * 20/100;
$mrp=$ka * 10/100;
$ms=$ka * 25/100;
$mrs=$ka * 10/100;
$ml=$ka * 25/100;
$mrm=$ka * 10/100;
?>		

    Hasil:<br  />
<INPUT type="text" name="hasil"
value="<?php echo ($ka) ?>" READONLY /><br  />
	<br>Pembagian Kalori:<br>
	1.Makan Pagi<br>
<INPUT type="text" name="bagi"
value="<?php echo ($mp) ?>" READONLY /><br  />
=>Ringan 1<br>
<INPUT type="text" name="bagi"
value="<?php echo ($mrp) ?>" READONLY /><br  />
	2.Makan Siang<br>
<INPUT type="text" name="bagi"
value="<?php echo ($ms) ?>" READONLY /><br  />
=>Ringan 2<br>
<INPUT type="text" name="bagi"
value="<?php echo ($mrs) ?>" READONLY /><br  />
	3.Makan Malam<br>
<INPUT type="text" name="bagi"
value="<?php echo ($ml) ?>" READONLY /><br  />
Ringan 3<br>
<INPUT type="text" name="bagi"
value="<?php echo ($mrm) ?>" READONLY /><br  />
<?php include "bawah.php";?> 