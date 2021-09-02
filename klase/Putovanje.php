<?php

class Putovanje
{

    private $conn;
    private $table_name = "putovanje";

    public $id_putovanja;

    public $id_host;
    public $broj_dana_boravka;

    public $id_posetilac;

    public $naziv_dogadjaja;


//                                               
public function __construct($conn, $id_host = 0, $broj_dana_boravka = 0, $id_posetilac = 0, $naziv_dogadjaja = 0)
    {
        $this->conn = $conn;
        $this->id_host = $id_host;
        $this->id_posetilac = $id_posetilac;
        $this->naziv_dogadjaja = $naziv_dogadjaja;
        $this->broj_dana_boravka = $broj_dana_boravka;

        if ($id_host != 0 && $broj_dana_boravka != 0)
            $this->zabelezi_putovanje();
    }

    public function fetch_po_id()
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id_putovanja = " . $this->id_putovanja;

        if ($result = $this->conn->query($sql)) {
            $putovanje = $result->fetch_assoc();
            $this->id_host = $putovanje['id_host'];
            $this->broj_dana_boravka = $putovanje['broj_dana_boravka'];
            $this->id_posetilac = $putovanje['id_posetilac'];
            $this->naziv_dogadjaja = $putovanje['naziv_dogadjaja'];
            
        }
    }
    public function fetch_sve_putovanje()
    { 
        
        $sql = "SELECT 
        e1.ime AS naziv_student_domacin,
        e2.ime AS naziv_student_gost,
        u.*
        FROM " . $this->table_name . " u 
        JOIN student e1 ON e1.id_student=u.id_host 
        JOIN student e2 ON e2.id_student=u.id_posetilac
        ORDER BY datum
        ";

        
        $putovanja = [];
        
        $res = $this->conn->query($sql);
      
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($putovanja, $row);
            }
        }
        return $putovanja;
    }

    private function zabelezi_putovanje()
    {
        $naziv_dogadjaja = 'KUL MANIFESTACIJA';
        $sql = "INSERT INTO     " . $this->table_name . " ( id_posetilac, id_host, broj_dana_boravka, naziv_dogadjaja) VALUES
         ('" .$this->id_posetilac."','" . $this->id_host."', '" .$this->broj_dana_boravka."','" . $this->naziv_dogadjaja."')";
       
        $this->conn->query($sql);
       // $this->id_student = $this->conn->insert_id;
    }
    


    public function delete_po_id()
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_putovanja = " . $this->id_putovanja;
        
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
