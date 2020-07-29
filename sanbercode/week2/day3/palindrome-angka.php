<?php
// Soal
// Buatlah sebuah file dengan nama palindrome-angka.php. Di dalam file tersebut buatlah sebuah 
// function dengan nama palindrome_angka yang menerima sebuah parameter berupa integer. function 
// tersebut memproses angka tersebut dan mengembalikan angka selanjutnya yang merupakan sebuah palindrome. 
// contoh jika parameter nya angka 38 maka function akan mereturn 44 yang merupakan angka palindrome. Jika 
// parameter yang diberikan merupakan sebuah angka palindrome, maka function me-return angka selanjutnya 
// yang merupakan palindrome. Contoh jika parameter nya angka 6 maka akan mereturn angka 7 yang merupakan 
// palindrome selanjutnya. (Note: angka 0 sampai 9 adalah palindrome)

function palindrome_angka($angka) {
  	// tulis kode di sini
	$angka++;
	if($angka == strrev($angka)){
		return $angka;
	}
	else if ($angka != strrev($angka)){
		for($a=1; $a<$angka; $a++){
			$angka++;
			if($angka == strrev($angka)){
				return $angka;
				break;
			}
		}
	}
}

// TEST CASES
echo palindrome_angka(8); // 9
echo "<br>"; 
echo palindrome_angka(10); // 11
echo "<br>"; 
echo palindrome_angka(117); // 121
echo "<br>"; 
echo palindrome_angka(175); // 181
echo "<br>"; 
echo palindrome_angka(1000); // 1001
