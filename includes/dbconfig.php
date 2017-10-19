<?php
class Database
{   
    private $host = "localhost";
    private $db_name = "pantheon_db2017";
    private $username = "pantheon_user";
    private $password = "CRDzlSx12Uz}";
    public $conn;
     
    public function dbConnection()
    {
     
        $this->conn = null;    
        try
        {    $this->$conn = new mysqli($host, $username, $password, $dbname);
//Check
             if ($this->$conn->connect_error)
              {
              die("Connection failed: " . $conn->connect_error);
                }
        echo "Yaaay";
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
           // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>