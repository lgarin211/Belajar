<?php

use PhpParser\Node\Expr\Eval_;

function hitung($string_data)
{
  $a = $string_data;
  echo eval("return $a ;");
}

// TEST CASES
echo hitung("102*2"); //204
echo hitung("2+3"); //5
echo hitung("100:25"); //4
echo hitung("10%2"); //5
echo hitung("99-2"); //97


// // CREATE TABLE `test`.`customers` ( 
//   `id` INT NOT NULL AUTO_INCREMENT , 
//   `name` VARCHAR(255) NOT NULL ,
//    `email` VARCHAR(255) NOT NULL , 
//    `password` VARCHAR(255) NOT NULL ,
//     PRIMARY KEY (`id`)) ENGINE = InnoDB;

//   FOREIGN KEY(artist) REFERENCES artists(id)

//   CREATE TABLE artists (
//     id    INTEGER PRIMARY KEY, 
//     name  VARCHAR(255)
//     name  VARCHAR(255)
//     name  VARCHAR(255)

//   );
  
//   CREATE TABLE tracks (
//     traid     INTEGER, 
//     title   TEXT, 
//     artist INTEGER,
//     FOREIGN KEY(artist) REFERENCES artists(id)
//   );