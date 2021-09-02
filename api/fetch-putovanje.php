<?php
require('../db/baza.php');
require('../klase/Putovanje.php');

$putovanje = new Putovanje($conn);

echo json_encode($putovanje->fetch_sve_putovanje());
