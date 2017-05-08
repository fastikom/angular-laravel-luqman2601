<title>KALKULATOR ANTI DIABETES</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="dir/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="dir/js/bootstrap.min.js"></script>

<?php
error_reporting(0); 
include ("config.php");
include ("functionlib.php");

$nama = isset($_GET['nama'])?$_GET['nama']:'';
$beratbadan=isset($_GET['beratbadan'])?$_GET['beratbadan']:'';
$tinggibadan=isset($_GET['tinggibadan'])?$_GET['tinggibadan']:'';
$usia=isset($_GET['usia'])?$_GET['usia']:'';
$gender=isset($_GET['gender'])?$_GET['gender']:'';
$aktivitas=isset($_GET['aktivitas'])?$_GET['aktivitas']:'';

if (empty($beratbadan)){
	echo"<script>alert('Mohon maaf, pehitungan kalori belum dapat diproses karena data berat badan masih kosong !!!');  window.history.back();</script>";
}elseif (empty($tinggibadan)){
	echo"<script>alert('Mohon maaf, pehitungan kalori belum dapat diproses karena data tinggi badan masih kosong !!!');  window.history.back();</script>";
}elseif (empty($usia)){
	echo"<script>alert('Mohon maaf, pehitungan kalori belum dapat diproses karena data usia masih kosong !!!');  window.history.back();</script>";
}elseif (empty($gender)){
	echo"<script>alert('Mohon maaf, pehitungan kalori belum dapat diproses karena data gender masih kosong !!!');  window.history.back();</script>";
}elseif (empty($aktivitas)){
	echo"<script>alert('Mohon maaf, pehitungan kalori belum dapat diproses karena data aktivitas masih kosong !!!');  window.history.back();</script>";
}elseif(!empty($nama) and !empty($tinggibadan) and !empty($beratbadan) and !empty($usia) and !empty($gender) and !empty($aktivitas))
{
?>
<br>
<body background="c.jpg">
<b>
<div class="container"> 

<div class="alert alert-success" role="alert"  >
<font size="5"> 
<?php
//mengatur waktu
echo waktu();

echo ucapan($gender,$usia)." ".$nama;
?>

</font>

		<font class="nav navbar-nav navbar-right" style="margin-right:15px">
	  	
		</font>
		<br>
	</div>

<center>
<div class="alert alert-warning" role="alert"  >
<?php
echo "Berdasarkan data yang telah ".ucapan($gender,$usia)." $nama inputkan sebagai berikut : <br> <br>
		<ul > Berat Badan = $beratbadan kilogram </ul>
		<ul >Tinggi Badan = $tinggibadan centimeter </ul>
		<ul >Usia = $usia tahun </ul>
		<ul >Gender = $gender </ul>  
		<ul> Aktivitas = $aktivitas </ul>
		<br> Dan berikut hasil yang perlu  ".ucapan($gender,$usia)." ketahui : <br> ";
?>
</div>
</center>

<div class="row">
<div class="col-md-6">
<div class="panel panel-info" style="height:390px">
  <!-- Default panel contents -->
<div class="panel-heading">Berat Badan</div>
<div class="panel-body">

<?php

echo "Berat Badan yang ".ucapan($gender,$usia)." inputkan : $beratbadan kilogram <br> ";
echo "Berat Badan Normal ".ucapan($gender,$usia)." : ".beratbadanormal($tinggibadan)." kilogram";
echo "<br>Berat Badan Ideal ".ucapan($gender,$usia)." : ".beratbadanideal($tinggibadan,$gender)." kilogram";
echo "<br><br>Setelah kami hitung berat badan ".ucapan($gender,$usia)." $nama, maka termasuk dalam kategori"; ?>
<font color="red"> <?php bmi($beratbadan,$tinggibadan); echo kategoriberatbadan($gender, $beratbadan, $tinggibadan); ?><br> </font> 
<?php echo "<br>Agar tetap sehat dan bugar, kami sarankan untuk merubah ke berat badan ideal ".ucapan($gender,$usia)." menjadi ".beratbadanideal($tinggibadan,$gender)." kilogram "; ?>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-danger" style="height:390px">
  <!-- Default panel contents -->
<div class="panel-heading">Kebutuhan Kalori Per Hari</div>
<div class="panel-body">

<?php

echo " agar badan tetap sehat dan berat badan berubah menjadi ideal ".beratbadanideal($tinggibadan,$gender)." Kg.<br><br>Maka,  <br>
 Kebutuhan Kalori Normal ".ucapan($gender,$usia)." : ".kalorinormal($gender, $tinggibadan)." Kkal";
echo "<br>Kebutuhan Kalori ".ucapan($gender,$usia)." berdasarkan usia : ".kaloriusia($usia, $tinggibadan, $gender)." Kkal";
echo "<br>Kebutuhan Kalori ".ucapan($gender,$usia)." berdasarkan aktivitas : ".kaloriaktivitas($aktivitas, $tinggibadan, $gender)." Kkal";
echo "<br> jumlah kalori perhari anda".ucapan($gender,$usia)." adalah <font color=\"red\"> ".jumlahkalori($tinggibadan , $gender , $aktivitas , $usia ). " Kkal/Hari </font>" ;

echo "<font color=\"red\"><br><br> Pembagian Kalori Per Hari ".ucapan($gender,$usia)." (".jumlahkalori($tinggibadan , $gender , $aktivitas , $usia )." Kkal/Hari ) :</font>";

$cetak = pembagiankalori($tinggibadan,$gender);
echo "<br>Makan Pagi     : ".$cetak[0]." Kkal";
echo "<br>Makan Ringan 1 : ".$cetak[1]." Kkal";
echo "<br>Makan Siang    : ".$cetak[2]." Kkal";
echo "<br>Makan Ringan 2 : ".$cetak[3]." Kkal";
echo "<br>Makan Malam    : ".$cetak[4]." Kkal";
echo "<br>Makan Ringan 3 : ".$cetak[5]." Kkal";

?>

</div>
</div>
</div>
</div>


<div class="panel panel-success" style="height:3250px">
		  <!-- Default panel contents -->
		<div class="panel-heading">Daftar Menu Makanan</div>
		<div class="panel-body">

		<?php 
		//$aa = round(($cetak[0] * 0.55);
		//$bb = round(($cetak[0] - $aa);
		$hasil = round(($cetak[0] / 4),1);
		$hasil2 = round(($cetak[1] / 2),1);
		$hasil3 = round(($cetak[2] / 4),1);

		$a = mysql_query("select * from makan where jenis = 'Makanan Pokok' order by RAND() limit 3 ");
		$b = mysql_query("select * from makan where jenis = 'Buah' order by RAND() limit 3 ");
		$c = mysql_query("select * from makan where jenis = 'Sayuran' order by RAND() limit 3 ");
		$d = mysql_query("select * from makan where jenis = 'Lauk Pauk' order by RAND() limit 3 ");

		$e = mysql_query("select * from makan where jenis = 'Ringan' order by RAND() limit 3 ");
		$f = mysql_query("select * from makan where jenis = 'Siap Saji' order by RAND() limit 3 ");

		$g = mysql_query("select * from makan where jenis = 'Makanan Pokok' order by RAND() limit 3 ");
		$h = mysql_query("select * from makan where jenis = 'Buah' order by RAND() limit 3 ");
		$i = mysql_query("select * from makan where jenis = 'Sayuran' order by RAND() limit 3 ");
		$j = mysql_query("select * from makan where jenis = 'Lauk Pauk' order by RAND() limit 3 ");

		$k = mysql_query("select * from makan where jenis = 'Ringan' order by RAND() limit 3 ");
		$l = mysql_query("select * from makan where jenis = 'Siap Saji' order by RAND() limit 3 ");

		$m = mysql_query("select * from makan where jenis = 'Makanan Pokok' order by RAND() limit 3 ");
		$n = mysql_query("select * from makan where jenis = 'Buah' order by RAND() limit 3 ");
		$o = mysql_query("select * from makan where jenis = 'Sayuran' order by RAND() limit 3 ");
		$p = mysql_query("select * from makan where jenis = 'Lauk Pauk' order by RAND() limit 3 ");

		$q = mysql_query("select * from makan where jenis = 'Ringan' order by RAND() limit 3 ");
		$r = mysql_query("select * from makan where jenis = 'Siap Saji' order by RAND() limit 3 ");


		echo "Kami sarankan untuk memilih menu makanan yang sudah kami perhitungkan sesuai kalori ".ucapan($gender,$usia).", sebagai berikut : <br>";
		echo "<br><button class='btn btn-success'> <b> Makan Pagi  </b><br> Sebesar $cetak[0] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($a)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($d)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($c)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($b)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>

		<?php
		echo "<br><button class='btn btn-success'> <b> Makan Ringan 1  </b><br> Sebesar $cetak[1] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($e)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($f)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
		<?php
		echo "<br><button class='btn btn-success'> <b> Makan Siang  </b><br> Sebesar $cetak[2] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($g)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($j)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($i)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($h)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo  round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
		<?php
		echo "<br><button class='btn btn-success'> <b> Makan Ringan 2  </b><br> Sebesar $cetak[3] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($k)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(( $hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($l)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo  round(($hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
		<?php
		echo "<br><button class='btn btn-success'> <b> Makan Malam  </b><br> Sebesar $cetak[4] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($m)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo  round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($p)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo  round(($hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($o)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(( $hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody><tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($n)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(( $hasil3 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil3." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
		<?php
		echo "<br><button class='btn btn-success'> <b> Makan Ringan 3  </b><br> Sebesar $cetak[5] kkal</button><br><br>";
		?>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>No.</center></th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Porsi</th>
					<th>Kalori</th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($q)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($r)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['jenis']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo round(($hasil2 * $row['berat2']),1)." gram";?></td>
					<td><?php echo $hasil2." kkal"; ?></td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
		</div>
	  	</div>

</div>
<center>
<a href="index.php">  <button type="submit" class="btn btn-danger">  <b>Coba Lagi</button></a><br><br>
</div></body>
<?php } ?>