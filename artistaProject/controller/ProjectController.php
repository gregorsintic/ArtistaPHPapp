<?php

require_once("model/ProjectDB.php");
require_once("ViewHelper.php");

class ProjectController
{
    public static function showProjects(){
        $projects = [
            "projects" => ProjectDB::getAllProjects()
        ];
        ViewHelper::render("view/editPortfolio.php", $projects);
    }

    public static function showCreateProjectPage(){
        $variables = [
            "variables" => ""
        ];
        ViewHelper::render("view/createProject.php", $variables);
    }

    public static function createProject(){

        $postOkay =  isset($_POST["ProjectName"]) && !empty($_POST["ProjectName"]) &&
            isset($_POST["Category"]) && !empty($_POST["Category"]) &&
            isset($_POST["Description"]) && !empty($_POST["Description"]);


        if ($postOkay){
          ProjectDB::createProject($_POST["ProjectName"],$_POST["Description"],$_POST["Category"],($_SESSION["username"] . " ,"));
          echo "<script type='text/javascript'>alert('Project created');</script>";
          self::showProjects();
        }else{
          echo "<script type='text/javascript'>alert('There was a problem creating a new project.');</script>";
          self::showCreateProjectPage();
        }
    }
}