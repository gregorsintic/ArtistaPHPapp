<?php

require_once "DBInit.php";

class UserDB
{
    public static function getUser($userdata){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT id, name, email, pwdhash, regTimestamp, type
                                     FROM user
                                     WHERE email = :email 
                                 ");
        $statement->bindParam(":email", $userdata["email"], PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch();
        if ($user != null) {
            return $user;
        }
    }

    public static function getUserByEmail($email){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT id, name, email, pwdhash, regTimestamp, type
                                     FROM user
                                     WHERE email = :email 
                                 ");
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch();
        if ($user != null) {
            return $user;
        }
    }

    public static function getDescriptionById($id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("select description from portfolio where seller = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $description = $statement->fetch();
        if($description == ""){
            return $description = " ";
        }
        if(!$description){
            return $description = " ";
        }
        return implode("|",$description);
    }

    public static function editportfolioinfo($name,$email,$description,$id,$sellerId){

        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE user SET name = :name, email = :email WHERE id = :id");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $statement = $db->prepare("UPDATE portfolio SET description = :description WHERE seller = :id");
        $statement->bindParam(":description", $description, PDO::PARAM_STR);
        $statement->bindParam(":id", $sellerId, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function getAllUsers() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, name, email, pwdhash, regTimestamp, type
                                     FROM user
                                 ORDER BY ID_User ASC");
        $statement->execute();

        return $statement->fetchAll();
    }



    public static function createUser($name, $email, $pwdhash, $type) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO user (name, email, pwdhash , type) VALUES (:name, :email, :pwdhash, :type)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pwdhash", $pwdhash);
        $statement->bindParam(":type", $type);
        $statement->execute();

        $statement = $db->prepare("SELECT id FROM user WHERE email = :email ");
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
        $id = $statement->fetch();
        $identifikator = implode("",$id);
        $statement = $db->prepare("INSERT INTO seller (`user`) VALUES (:id)");
        $statement->bindParam(":id", $identifikator);
        $statement->execute();
        /*
        $statement = $db->prepare("INSERT INTO portfolio (`user`) VALUES (:id)");
        $statement->bindParam(":id", $identifikator);
        $statement->execute();
        */
        /*
         * Nastavljanje slike
         */
        $temp = UserDB::getSellerID($identifikator);
        $path = UPIC_URL . "uporabnik.PNG";
        $statement2 = $db->prepare( "CALL proc_addProfilePicture(:sellerID, :path)");
        $statement2->bindParam(":sellerID" , $temp, PDO::PARAM_INT);
        $statement2->bindParam(":path", $path, PDO::PARAM_STR);
        $statement2->execute();
    }

    public static function getSellerID($id){
        $identifikatorOsebe = $id;
        //$identifikatorOsebe = implode("",$id);
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT id FROM seller where user = :idUser");
        $statement->bindParam(":idUser", $identifikatorOsebe);
        $statement->execute();
        return implode("",$statement->fetch());
    }

    public static function updateProfilePicture($idOsebe, $path){
        $db = DBInit::getInstance();
        $temp = UserDB::getSellerID($idOsebe);
        $statement2 = $db->prepare( "CALL proc_addProfilePicture(:sellerID, :path)");
        $statement2->bindParam(":sellerID" , $temp, PDO::PARAM_INT);
        $statement2->bindParam(":path",$path, PDO::PARAM_STR);
        $statement2->execute();
    }

    public static function getProfilePath($sellerId){

        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT path FROM picture where seller = :sellerId and isProfile = 1");
        $statement->bindParam(":sellerId", $sellerId);
        $statement->execute();
        if(!$statement){
            return "";
        }
        return implode("",$statement->fetch());
    }



    /*public static function deleteAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("TRUNCATE users");
        $statement->execute();
    }*/
}