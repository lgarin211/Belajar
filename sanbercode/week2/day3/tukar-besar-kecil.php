
<?php
// soal
// buatlah sebuah file dengan nama tukar-besar-kecil.php. 
// Di dalam file tersebut buatlah function dengan nama tukar_besar_kecil
//  yang menerima parameter berupa string. function akan mengembalikan sebuah 
//  string yang sudah ditukar ukuran besar dan kecil per karakter yang ada di parameter.
//   Contohnya jika parameter “pHp” maka akan mengembalikan “PhP”.

function tukar_besar_kecil($string)
{
    //kode di sini
    for ($i = 0; $i < strlen($string); $i++) {
        # code...
        $asciiCode = ord($string[$i]);
        if ($asciiCode >= 65 && $asciiCode <= 90) {
            $string[$i] = chr($asciiCode + 32);
        } elseif ($asciiCode >= 97 && $asciiCode <= 122) {
            $string[$i] = chr($asciiCode - 32);
        }
    }
    return "$string<br>";
}

// TEST CASES
echo tukar_besar_kecil('Hello World'); // "hELLO wORLD"
echo tukar_besar_kecil('I aM aLAY'); // "i Am Alay"
echo tukar_besar_kecil('My Name is Bond!!'); // "mY nAME IS bOND!!"
echo tukar_besar_kecil('IT sHOULD bE me'); // "it Should Be ME"
echo tukar_besar_kecil('001-A-3-5TrdYW'); // "001-a-3-5tRDyw"

?>