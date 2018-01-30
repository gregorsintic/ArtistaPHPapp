<?php
/**
 * Created by PhpStorm.
 * User: sinti
 * Date: 12-Jan-18
 * Time: 11:50 PM
 */

require_once("model/ListingDB.php");
require_once ("controller/UserController.php");
require_once("ViewHelper.php");



class ListingController
{
	public static function uploadListing(){

        $postOkay =  isset($_POST["price"]) && !empty($_POST["price"]) &&
            isset($_POST["description"]) && !empty($_POST["description"]) &&
            isset($_POST["vrstaIzdelka"]) && !empty($_POST["vrstaIzdelka"])&&
            isset($_POST["productName"]) && !empty($_POST["productName"]);

        $fileSet = isset($_FILES["picture"]);

        if ($postOkay){
            if ($fileSet){

                $ext = '.png';
                $filename = '..\public\pictures\\' . time() . $ext;

                if (!is_uploaded_file($_FILES['picture']['tmp_name']) or
                    !copy($_FILES['picture']['tmp_name'], $filename))
                {
                    echo "<script type='text/javascript'>alert('Samo .png format!');</script>";
                }else{
                    $newListing = [
                        "price" => $_POST["price"],
                        "description" => $_POST["description"],
                        "category" => $_POST["vrstaIzdelka"],
                        "productName" => $_POST["productName"],
                        "picture" => $filename
                    ];

                    ListingDB::uploadListing($newListing);
                    UserController::showPortfolioPage();
                }


            }


        }



    }




}