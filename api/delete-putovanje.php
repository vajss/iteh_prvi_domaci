<?php

require('../db/baza.php');
require('../klase/Putovanje.php');
require('../klase/Student.php');

$id_putovanja= $_POST['id_putovanja']; //ovde hvate id koji mu salje index.js sa 41 linije

$putovanje = new Putovanje($conn);

$putovanje->id_putovanja= $id_putovanja;



if (!$putovanje->delete_po_id())
    die("Greska prilikom brisanja utakmice!");

echo "Uspesno obrisana putovanje.";
