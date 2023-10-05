<?php
class crud extends koneksi{
   public function lihatData(){
        $sql = "select * from login";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
   }
   public function insertData($email, $pass, $name){
        try{
            $sql = "insert into login (user_email, user_password, fullname) values (:email, :pass, :name)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;

        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
   }
}
?>