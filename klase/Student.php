<?php

class Student
{

    private $conn;
    private $table_name = "student";

    public $id_student;
    public $ime;
    public $godina_studija;
    public $lokalna_grupa;
    public $prezime;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function fetch_sve_student()
    {
        $studenti = [];
        $sql = "SELECT * FROM " . $this->table_name . " ORDER BY godina_studija DESC";
        

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($studenti, $row);
            }
        }
        return $studenti;
    }

    public function fetch_po_id()
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id_student = " . $this->id_student;

        $student = $this->conn->query($sql)->fetch_assoc();
        return $student;
    }

    public function create_student()
    {

        $sql = "INSERT INTO " . $this->table_name . " (ime, lokalna_grupa, prezime, godina_studija)
        VALUES ('" . $this->ime . "', '" . $this->lokalna_grupa . "', '" . $this->prezime . "','" . $this->godina_studija ."' )";


        if ($this->conn->query($sql) === TRUE) {
            $this->id_student = $this->conn->insert_id;
            return true;
        }

        return false;
    }


    public function postoji()
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE ime = '" . $this->ime . "' "AND" '" . $this->prezime . "' ";

        if ($result = $this->conn->query($sql)) {

            $student = $result->fetch_assoc();
            if ($student) {
                $this->id_student = $student['id_student'];
                return true;
            }
            return false;
        }
        return false;
    }

}
