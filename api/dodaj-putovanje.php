<?php

require('../db/baza.php');
require('../klase/Student.php');
require('../klase/Putovanje.php');

$host = new Student($conn);
$gost = new Student($conn);

$host->ime = $_POST['ime_host'];
$gost->ime = $_POST['ime_gost'];


if (!$host->postoji()) {
    $host->lokalna_grupa = $_POST['lokalna_grupa_host'];
    $host->prezime = $_POST['prezime_host'];
    $host->godina_studija = $_POST['godina_studija_host'];
    if ($host->lokalna_grupa === "" || $host->prezime === "")
        die("Morate da unesete lokalnu grupu i prezime.");
    $host->create_student();
}

if (!$gost->postoji()) {
    $gost->lokalna_grupa = $_POST['lokalna_grupa_gost'];
    $gost->prezime = $_POST['prezime_gost'];
    $gost->godina_studija = $_POST['godina_studija_gost'];
    if ($gost->lokalna_grupa === "" || $gost->prezime === "")
        die("Morate da unesete lokalnu grupu i prezime.");
    $gost->create_student();
}

if ($host->id_student === $gost->id_student)
    die("Gost i host su isti!");


$naziv_dogadjaja = $_POST['naziv_dogadjaja'];
$broj_dana_boravka = $_POST['broj_dana_boravka'];

//echo $naziv_dogadjaja;
                                                
$utakmica = new Putovanje($conn, $host->id_student, $broj_dana_boravka, $gost->id_student, $naziv_dogadjaja);
