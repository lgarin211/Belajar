<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Function</title>
</head>

<body>
  <h1>Berlatih Function PHP</h1>
  <nav>
    <a href="looping.php">Looping</a>
    <a href="function-conditional.php">Fungsi dan kondisi</a>
  </nav>
  <?php

  echo "<h3> Soal No 1 Greetings </h3>";
  /* 
            Soal No 1
            Greetings
            Buatlah sebuah function greetings() yang menerima satu parameter berupa string. 
            contoh: greetings("abduh");
            Output: "Halo Abduh, Selamat Datang di Sanbercode!"
        */

  // Code function di sini
  function greetings($name)
  {
    print('Halo ' . $name . ' Selamat Datang di Sanbercode! <br>');
  }

  // Hapus komentar untuk menjalankan code!
  greetings("Bagas");
  greetings("Wahyu");
  greetings("Abdul");

  echo "<br>";

  echo "<h3>Soal No 2 Reverse String</h3>";
  /* 
            Soal No 2
            Reverse String
            Buatlah sebuah function reverseString() untuk mengubah string berikut menjadi
             kebalikannya menggunakan function dan looping (for/while/do while).
            Function reverseString menerima satu parameter berupa string.
            NB: DILARANG menggunakan built-in function PHP sepert strrev(), HANYA gunakan LOOPING!
            reverseString("abdul");
            Output: ludba
            
        */
  // Code function di sini 
  function reverseString($data)
  {
    $data =  str_split($data);

    for ($i = (count($data) - 1); $i >= 0; $i--) {
      print($data[$i]);
    }
    echo ("<br>");
  }

  // Hapus komentar di bawah ini untuk jalankan Code
  reverseString("abduh");
  reverseString("Sanbercode");
  reverseString("We Are Sanbers Developers");
  echo "<br>";

  echo "<h3>Soal No 3 Palindrome </h3>";
  /* 
            Soal No 3 
            Palindrome
            Buatlah sebuah function yang menerima parameter berupa string yang mengecek apakah 
            string tersebut sebuah palindrome atau bukan. 
            Palindrome adalah sebuah kata atau kalimat yang jika dibalik akan memberikan kata yang 
            sama contohnya: katak, civic.
            Jika string tersebut palindrome maka akan mengembalikan nilai true, sedangkan jika 
            bukan palindrome akan mengembalikan false.
            NB: 
            Contoh: 
            palindrome("katak") =>  output : true
            palindrome("jambu") => output : false
            NB: DILARANG menggunakan built-in function PHP seperti strrev() dll. Gunakan 
            looping seperti biasa atau gunakan function reverseString dari jawaban no.2!
            
        */


  // Code function di sini
  function palindrome($data)
  {
    $data =  str_split($data);
    $hasil = [];

    for ($i = (count($data) - 1); $i >= 0; $i--) {
      $hasil[] = $data[$i];
    }

    $hasil = implode(" ", $hasil);
    $data  = implode(" ", $data);
    if ($hasil == $data) {
      echo ('true <br>');
    } else echo ('flase <br>');
  }

  // Hapus komentar di bawah ini untuk jalankan code
  palindrome("civic");
  palindrome("nababan"); // true
  palindrome("jambaban"); // false
  palindrome("racecar"); // true
  ?>
</body>

</html>