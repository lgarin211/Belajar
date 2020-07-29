<?php
// soal
// buatlah sebuah file dengan nama tentukan-deret-geometri.php. 
// Di dalam file tersebut buatlah function dengan nama tentukan_deret_geometri 
// yang menerima parameter berupa array berisi angka-angka. function akan me-return 
// true jika kumpulan angka tersebut adalah sebuah deret geometri dan me-return false 
// jika bukan merupakan deret geometri. Contohnya jika parameternya [2, 6, 18, 54] akan me-return true 
// karena deret angka tersebut merupakan deret geometri dengan rasio 3.

function tentukan_deret_geometri($arr) {
	// kode di sini
	$nilai =[];
	$data = count($arr);
	if(count($arr)<2){
        return "true<br>";
    }

	$cek = $arr[1]/ $arr[0];
	for($a=0; $a<$data-1; $a++){
		$nilai[$a] = $arr[$a+1] / $arr[$a];
		if($cek !== $nilai[$a]){
			return "false<br>";
		}
	}
	return "true<br>";
}

//TEST CASES
echo tentukan_deret_geometri([1, 3, 9, 27, 81]); // true
echo tentukan_deret_geometri([2, 4, 8, 16, 32]); // true
echo tentukan_deret_geometri([2, 4, 6, 8]); // false
echo tentukan_deret_geometri([2, 6, 18, 54]); // true
echo tentukan_deret_geometri([1, 2, 3, 4, 7, 9]); //false
