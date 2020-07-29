<?
require_once 'Animal.php';
require_once 'Ape.php';
require_once 'Frog.php';

$sheep = new Animal("shaun");

echo $sheep->getName(); // "shaun"
echo $sheep->getLegs(); // 2
echo $sheep->getCold_Blooded(); // false

echo "<br>";

$sungokong = new Ape("kera sakti");
echo $sungokong->getName(); // "kera sakti"
echo $sungokong->getLegs(4); // 4
echo $sungokong->getCold_Blooded(); // false
echo $sungokong->yell(); // "Auooo"

echo "<br>";
$kodok = new Frog("buduk");
echo $kodok->getName(); // "kera sakti"
echo $kodok->getLegs(); // 4
echo $kodok->getCold_Blooded(); // false
echo $kodok->jump() ; // "hop hop"

// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())