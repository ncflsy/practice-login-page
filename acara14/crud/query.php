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
            $sql = "insert into login (user_email, user_pass, fullname) values (:email, :pass, :name)";
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

    public function getDataById($id) {
        $query = "SELECT * FROM login WHERE id = :id";
        $statement = $this->koneksi->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement;
    }

    public function updateData($id, $email, $pass, $fullname) {
        $query = "UPDATE login SET user_email = :email, user_pass = :pass, fullname = :fullname WHERE id = :id";
        $statement = $this->koneksi->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
        $statement->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $statement->execute();
    }

    public function deleteData($id) {
        $query = "DELETE FROM login WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
 
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Error in prepared statement";
        }
    }
}
?>