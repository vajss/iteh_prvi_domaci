<?php

require('../db/baza.php');
require('../klase/Student.php');


$id_student = $_GET['id_student'];

$student = new Student($conn);

$student->id_student = $id_student;

echo json_encode($student->fetch_po_id());
