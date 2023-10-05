<?php
class koneksi{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "user";
    protected $koneksi;
    public function __construct()
    {
        try{
            $this->koneksi = new PDO("mysql:host=$this->host; dbname=$this->db;", $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "sukses";
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->koneksi;
    }
}
?>
