<?php

/**
 * Created by PhpStorm.
 * User: sinti
 * Date: 4. 06. 2017
 * Time: 23:27
 */
require_once "DBInit.php";
class ProjectDB
{
    public static function getProject($id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT ID_Project, ProjectName, Description, Category, Participants
                                     FROM projects
                                     WHERE ID_Project = :id 
                                 ");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $project = $statement->execute();
        if ($project != null) {
            return $project;
        } else {
            throw new InvalidArgumentException("Error Processing Project Request: $_GET[id]", 1);
        }
    }

    public static function getAllProjects() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT ID_Project, ProjectName, Description, Category, Participants
                                     FROM projects
                                 ORDER BY ID_Project ASC");
        $statement->execute();

        return $statement->fetchAll();
    }



    public static function createProject($ProjectName ,$Description, $Category, $Participants) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO projects (ProjectName, Description, Category, Participants) VALUES (:ProjectName, :Description, :Category, :Participants)");
        $statement->bindParam(":ProjectName", $ProjectName);
        $statement->bindParam(":Description", $Description);
        $statement->bindParam(":Category", $Category);
        $statement->bindParam(":Participants", $Participants);

        $statement->execute();
    }



    public static function deleteAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("TRUNCATE projects");
        $statement->execute();
    }
}