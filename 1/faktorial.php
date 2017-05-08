


<?php							             // pembuka php
echo"nilai faktorialnya= ";
function faktorial($a) { 		   // deklarasi fungsi faktorial dengan parameter variabel a
if ($a==1) 						         // jika variabel a sama dengan 1
	return 1;					           // maka variabel a akan mengembalikan nilai variabel a menjadi 1 
else 							            // atau jika variabel a bukan sama dengan 1
	return $a*faktorial($a-1);	// maka variabel a akan mengembalikan nilai variabel a dikali fungsi faktorial ( variabel a - 1);
}								             // akhir fungsi

echo faktorial(9);				  // memanggil fungsi faktorial dengan isi parameter sama dengan 6
								            // penutup pphp
?>								
