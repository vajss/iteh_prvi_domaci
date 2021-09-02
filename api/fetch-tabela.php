<?php
require('../db/baza.php');
require('../klase/Student.php');

$student = new Student($conn);

echo json_encode($student->fetch_sve_student());
