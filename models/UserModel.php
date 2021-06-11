<?php

class UserModel extends Model
{

    public function importFromCSV($data)
    {
        $sql = "INSERT INTO users(uid, firstName,lastName,birthDay,dateChange,description) VALUES(:uid, :firstName,:lastName,:birthDay,:dateChange,:description)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":uid", $data[0], PDO::PARAM_INT);
        $statement->bindValue(":firstName", $data[1], PDO::PARAM_STR);
        $statement->bindValue(":lastName", $data[2], PDO::PARAM_STR);
        $statement->bindValue(":birthDay", $data[3], PDO::PARAM_STR);
        $statement->bindValue(":dateChange", $data[4], PDO::PARAM_STR);
        $statement->bindValue(":description", $data[5], PDO::PARAM_STR);
        $statement->execute();

    }

    public function getAllUsers()
    {
        $result = array();
        $sql_query = "SELECT * FROM users";
        $statement = $this->db->prepare($sql_query);
        $statement->execute();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['uid']] = $row;
        }
        return $result;
    }

    public function deleteUserByID($uid)
    {
        $sql_query = "DELETE FROM users WHERE uid =:uid";
        $statement = $this->db->prepare($sql_query);
        $statement->bindValue(":uid", $uid, PDO::PARAM_INT);
        $statement->execute();
        return true;
    }

    public function updateUserDateChange($uid, $dateChange)
    {
        $sql_query = "UPDATE users SET dateChange =:dateChange WHERE uid = :uid ";
        $statement = $this->db->prepare($sql_query);
        $statement->bindValue(":dateChange", $dateChange, PDO::PARAM_STR);
        $statement->bindValue(":uid", $uid, PDO::PARAM_INT);
        $statement->execute();
        return true;
    }

    public function getUserByID($uid, $data)
    { # перевіряєм , якщо в базі є акк а у файлі немає , то видаляємо його
        $sql_query = "SELECT FROM users WHERE uid= :uid";
        $statement = $this->db->prepare($sql_query);
        $statement->bindValue(":uid", $uid, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }

}

?>