<?php
/**
 * Created by PhpStorm.
 * User: sinti
 * Date: 5. 06. 2017
 * Time: 02:32
 */
require_once("controller/UserController.php");
require_once("controller/ProjectController.php");
require_once ("controller/ListingController.php");

# Define a global constant pointing to the URL of the application
define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/css/");
define("js_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/js/");
define("PIC_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/pictures/");
define("VIEW_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "view/");

define("UPIC_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php"));
# Request path after /index.php/ with leading and trailing slashes removed
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";


session_start();
$inactive = 7200;
ini_set('session.gc_maxlifetime', $inactive);
$_SESSION['expire'] = time() + $inactive;
if (time() > $_SESSION['expire']){
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();
}


# The mapping of URLs. It is a simple array where:
# - keys represent URLs
# - values represent functions to be called when a client requests that URL
$urls = [


    "homepage" => function () {
        UserController::showHomepage();

    },

    "login" => function(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();

        }else{
            UserController::showHomepage();
        }
    },
	"purchase" => function(){
        UserController::showPurchasePage();
    },

    "editportfolio" => function () {
        UserController::showEditPortfolio();

    },

    "portfolioinfo" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::editportfolio();
        }
        UserController::showEditPortfolio();

    },

    "logout"  => function(){
        session_unset();
        session_destroy();
        UserController::showHomepage();
    },
  
	"upload" => function(){
        UserController::showUploadPage();
    },

    "uploadListing" => function(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ListingController::uploadListing();
        }else{
            UserController::showUploadPage();
        }
    },
    "about" => function(){
        UserController::showAboutPage();
    },

    "portfolio" => function(){
        UserController::showPortfolioPage();
    },

    "myproduct" => function(){
        UserController::showMyProducts();
    },

    "projects" => function () {
        ProjectController::showProjects();
    },

    "" => function() {
        ViewHelper::redirect(BASE_URL . "homepage");
    },
   

    "registrationpage" => function () {
        UserController::showRegistrationPage();

    },

    "register" => function(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::register();
        }else{
            UserController::showHomepage();
        }
    },

    "slikarstvo" => function () {
        UserController::onlySlike();
    },

    "kiparstvo" => function () {
        UserController::onlyKipi();
    },

    "drugo" => function () {
        UserController::onlyOther();
    },

    "search" => function () {
        UserController::search();
    }



];

# The actual router.
# Tries to invoke the function that is mapped for the given path
try {
    if (isset($urls[$path])) {
        # Great, the path is defined in the router
        $urls[$path](); // invokes function that calls the controller
    } else {
        # Fail, the path is not defined. Show an error message.
        #echo "No controller for '$path'";
        ViewHelper::error400("This page doesn't exist!");
    }
} catch (Exception $e) {
    # Provisional: whenever there is an exception, display some info about it
    # this should be disabled in production
    ViewHelper::error400($e);
} finally {
    exit();
}
