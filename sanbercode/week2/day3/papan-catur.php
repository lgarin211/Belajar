<?php


// Soal
// Buatlah sebuah file dengan nama papan-catur.php.
// Tulislah di dalam file tersebut sebuah function dengan
// nama papan_catur yang menerima parameter angka. function tersebut akan 
// mereturn string yang membentuk sebuah papan catur dengan simbol pagar “#” 
// dengan ukuran angka x angka.
function papan_catur($angka) {
// tulis kode di sini
	$text = '';
	// Jumlah Kotak
	$jumlah = $angka;
	
	// Membuat Tag Table
	$text .= '<table>';
	for($n = 0; $n < $jumlah; $n++) {
	  	$text .= '<tr>';
	  	$jumlah_kolom = $jumlah * 2 -1;
	  	for($m = 0; $m < $jumlah_kolom; $m++) {
	   	
	   		$isi = '';
	      	if(($n % 2 == 0 && $m % 2 == 0) || ($n % 2 == 1 && $m % 2 == 1)) {
	        	$isi = '#';
	      	}
	   		else 
	   			$isi = '';
	      		$text .= '<td>'. $isi .'</td>';
	  		}
	  	}
	$text .= '</tr>';	
	// Tag Penutup Table
	$text .= '</table>';
	return $text;

}

// TEST CASES
echo papan_catur(4); 
echo "<br>";
/*
# # # #
 # # #
# # # #
 # # #
 */

echo papan_catur(8);
echo "<br>";
/* 
# # # # # # # #
 # # # # # # # 
# # # # # # # #
 # # # # # # # 
# # # # # # # #
*/

echo papan_catur(5); 
/*
# # # # #
 # # # #
# # # # #
 # # # # 
# # # # #
*/
