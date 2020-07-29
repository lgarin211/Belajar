<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array</title>
</head>

<body>
    <h1>Berlatih Array</h1>

    <?php
    echo "<h3> Soal 1 </h3>";
    /* 
            SOAL NO 1
            Kelompokkan nama-nama di bawah ini ke dalam Array.
            Kids : "Mike", "Dustin", "Will", "Lucas", "Max", "Eleven" 
            Adults: "Hopper", "Nancy",  "Joyce", "Jonathan", "Murray"
        */
    $kids = ["Mike", "Dustin", "Will", "Lucas", "Max", "Eleven"]; // Lengkapi di sini
    $adults = ["Hopper", "Nancy",  "Joyce", "Jonathan", "Murray"];
    echo "var_dump dari kids =";
    var_dump($kids);
    echo "<hr>";
    echo "var_dump dari adults =";
    var_dump($adults);
    echo "<hr>";
    echo "<h3> Soal 2</h3>";
    /* 
            SOAL NO 2
            Tunjukkan panjang Array di Soal No 1 dan 
            tampilkan isi dari masing-masing Array.
        */
    echo "Cast Stranger Things: ";
    echo "<br>";
    echo "Total Kids: " . count($kids); // Berapa panjang array kids
    echo "<br>";
    echo "<ol>";
    for ($i = 0; $i < count($kids); $i++) {
        echo "<li> array index ke $i = $kids[$i];</li>";
    }

    // Lanjutkan

    echo "</ol>";

    echo "Total Adults: " . count($adults); // Berapa panjang array adults
    echo "<br>";
    echo "<ol>";
    for ($i = 0; $i < count($adults); $i++) {
        echo "<li> array index ke $i =  $adults[$i];</li>";
    }
    // Lanjutkan

    echo "</ol>";
    echo "<h3> Soal 3</h3>";
    /*
            SOAL No 3
            Susun data-data berikut ke dalam bentuk
            Asosiatif Array (Array Multidimensi)
            
            Name: "Will Byers"
            Age: 12,
            Aliases: "Will the Wise"
            Status: "Alive"

            Name: "Mike Wheeler"
            Age: 12,
            Aliases: "Dungeon Master"
            Status: "Alive"

            Name: "Jim Hopper"
            Age: 43,
            Aliases: "Chief Hopper"
            Status: "Deceased"

            Name: "Eleven"
            Age: 12,
            Aliases: "El"
            Status: "Alive"
            
        */
    $data = [
        ["Name" => "Will Byers", "Age" => "12", "Aliases" => "Will the Wise", "Status" => "Alive"],
        ["Name" => "Mike Wheeler", "Age" => "12", "Aliases" => "Dungeon Master", "Status" => "Alive"],
        ["Name" => "Jim Hopper", "Age" => "43", "Aliases" => "Chief Hopper", "Status" => "Deceased"],
        ["Name" => "Eleven", "Age" => "12", "Aliases" => "El", "Status" => "Alive"]
    ];
    echo "<pre>";
    print_r($data);
    echo "</pre>";


    echo "<hr>";
    echo "<p> Menampilkan Semua Data :</p>";
    foreach ($data as $d) {
        echo "Nama : " . $d["Name"] . "<br/>";
        echo "Umur : " . $d["Age"] . "<br/>";
        echo "Alias : " . $d["Aliases"] . "<br/>";
        echo "Status : " . $d["Status"] . "<br/>";
        echo "<br>";
    }
    ?>
</body>

</html>