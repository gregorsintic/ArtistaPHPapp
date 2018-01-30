<?php
/**
 * Created by PhpStorm.
 * User: sinti
 * Date: 12-Jan-18
 * Time: 11:05 PM
 */
require_once "DBInit.php";
class ListingDB
{
    /*public static function getAllListings(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.ID, Listing.Seller, Listing.Price, Listing.Description, listing.timestamp, listing.category, listing.name as lname, user.id, user.name
                                            FROM Listing INNER JOIN user ON Listing.seller = user.id
                                 ");
        $statement->execute();

        return $statement->fetchAll();
    }*/
    public static function getAllListings(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getMyListings($id){
        $db = DBInit::getInstance(); # user.name = 'Anton Banana'
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id
WHERE listing.seller = :id");
        $statement->bindParam(":id", $id );
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getListingById($id){
        $db = DBInit::getInstance();
        $statement = $db->prepare("Select * from listing
                                     WHERE id = :id 
                                 ");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $listing = $statement->fetch();
        if ($listing != null) {
            return $listing;
        }
    }

    public static function getOnlyPaintings(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id
WHERE listing.category = 1");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getOnlyStatues(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id
WHERE listing.category = 2
");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getOther(){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id
WHERE listing.category = 3
");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function search($search){
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT listing.*, artista.user.name as username, picture.path
FROM listing
LEFT JOIN picture ON listing.mainPic = picture.id
LEFT JOIN seller ON listing.seller = seller.id
LEFT JOIN artista.user ON seller.user = artista.user.id
WHERE listing.name LIKE :search OR artista.user.name LIKE :search
");
        $statement->bindParam(":search" , $search, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }


    public static function uploadListing($newListing){
        $db = DBInit::getInstance();
        $statement = $db->prepare("Insert into listing (Listing.seller,Listing.price,Listing.description, Listing.shown, Listing.category, Listing.mainPic ,Listing.name) 
                                    values(:sellerid,:price,:description,1,:category,NULL, :productName)
                                 ");
        $temp = UserDB::getSellerID($_SESSION["userData"]["id"]);

        $statement->bindParam(":sellerid" , $temp, PDO::PARAM_INT);
        $statement->bindParam(":price" , $newListing["price"], PDO::PARAM_INT);
        $statement->bindParam(":description" , $newListing["description"], PDO::PARAM_STR);
        //$statement->bindParam(":shown" , $newListing["shown"], PDO::PARAM_INT);
        $statement->bindParam(":category" , $newListing["category"], PDO::PARAM_INT);
        $statement->bindParam(":productName" , $newListing["productName"], PDO::PARAM_STR);
        $statement->execute();



        $getListingID = $db->prepare("SELECT id FROM listing ORDER BY id DESC LIMIT 1");
        $getListingID->execute();
        $id = $getListingID->fetch();
        $id = implode("",$id);

        $statement2 = $db->prepare( "CALL proc_addListingPicture(:listingID, :path)");
        $statement2->bindParam(":listingID" , $id, PDO::PARAM_INT);
        $statement2->bindParam(":path",$newListing["picture"], PDO::PARAM_STR);
        $statement2->execute();



    }

}