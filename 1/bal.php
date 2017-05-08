<html>
<?Php
$kb='';
$bbi='';
$bbn='';
$nama=$_POST['nama'];
$tinggi_badan=$_POST['tinggi_badan'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$usia=$_POST['usia'];
$aktifitas=$_POST['aktifitas'];
echo "nama = ";
echo $nama;
echo "<br> jenis kelamin= ";
		 echo $jenis_kelamin;
		 echo "<br> usia= ";
		 echo $usia;
echo "<br>tinggi badan = ";
echo $tinggi_badan;
$bbn=$tinggi_badan-100;
echo"<br> berat badan normal anda = ";
echo $bbn;
if($jenis_kelamin="pria" && $tinggi_badan>="160" || $jenis_kelamin="wanita" && $tinggi_badan>="150")
{
	$bbi=$bbn-(10/100*$bbn);
		echo "<br> berat badan ideal anda =";
		echo $bbi;
}
else
{
	echo"<br> tinggi badan tidak sesuai dari 160 dan 150 keatas";
}
if($jenis_kelamin="pria" && $tinggi_badan<"160" || $jenis_kelamin="wanita" && $tinggi_badan<"150")
{
	$bbi=$bbn-10;
		echo "<br> berat badan ideal anda =";
		echo $bbi;
}
else {
echo"<br> tinggi badan tidak sesuai dari 160 dan 150 kebawah";
}

if ($jenis_kelamin=="pria")
{
	$kb=$bbi*30;
		echo "<br>kebutuhan kalori pria adalah = ";
		echo $kb;
	}
		else{
			$kb=$bbi*25;
		echo "<br>kebutuhan kalori wanita adalah = ";
		echo $kb;
		}
	if($usia="40-59")
	{
		$kku=$kb-5/100;
		echo "<br>kebutuhan kalori anda menurut kriteria usia = ";
		echo $kku;
	}
	if ($usia=="60-69") {
		$kku=$kb-10/100;
		echo "<br>kebutuhan kalori anda menurut kriteria usia = ";
		echo $kku;
	}
	if ($usia>"70") {
		$kku=$kb-20/100;
		echo "<br>kebutuhan kalori anda menurut kriteria usia = ";
		echo $kku;
	}
	if ($aktifitas=="ringan") {
		$kkf=$kb-20/100;
		echo "<br>kebutuhan kalori anda menurut kriteria aktifitas = ";
		echo $kkf;
	}
	if ($aktifitas=="sedang") {
		$kkf=$kb-30/100;
		echo "<br>kebutuhan kalori anda menurut kriteria aktifitas = ";
		echo $kkf;
	}
    if ($aktifitas=="berat") {
		$kkf=$kb-50/100;
		echo "<br>kebutuhan kalori anda menurut kriteria aktifitas = ";
		echo $kkf;
	}

?>
</html>
