<?php
// soal

// buatlah sebuah file dengan nama pasangan-terbesar.php. 
// Di dalam file tersebut buatlah function dengan nama pasangan_terbesar
//  yang menerima sebuah parameter berupa angka dan akan mengembalikan pasangan 
//  angka yang merupakan angka terbesar. Contoh jika parameternya adalah 16749549 maka 
//  function me-return 95 karena angka tersebut adalah pasangan angka terbesar.

function pasangan_terbesar($angka){
// kode di sini
	$panjang = strlen($angka);
	$data = [];
	for($a=0; $a<$panjang; $a++){
		$data[$a] = substr($angka, $a, 2);
		$nilai[$a] = $data[$a];
	}
	return "pasangan terbesar : " . max($nilai) ."<br>";
}

// TEST CASES
echo pasangan_terbesar(641573); // 73
echo pasangan_terbesar(12783456); // 83
echo pasangan_terbesar(910233); // 91
echo pasangan_terbesar(71856421); // 85
echo pasangan_terbesar(79918293); // 99
