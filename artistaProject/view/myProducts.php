<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Artista - Najdi umetnika v sebi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= CSS_URL . "bootstrap.min.css" ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= CSS_URL . "shop-homepage.css" ?>" rel="stylesheet">
    <link href="<?= CSS_URL . "artista.css" ?>" rel="stylesheet">
    <link href="<?= CSS_URL . "portfolio.css" ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header bg-art">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-image" src="<?= PIC_URL . "logo.png" ?>" id="logo" href="#">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse bg-art" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="bg-art"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown">Moj Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Moji izdelki</a></li>
                        <li><a href="#">Dodaj nov izdelek</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Uredi profil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= VIEW_URL . "portfolio.html" ?>">Moj Portfolio</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="<?= BASE_URL . "logout" ?>" ><b>Odjava</b></a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<div class="art-container">
    <div class="row">
        <div class="col-md-2">
            <p class="lead"></p>
            <div class="list-group">
                <a href="#" class="list-group-item">Dodaj izdelek</a>
                <a href="<?= VIEW_URL . "urediPortfolio.html" ?>" class="list-group-item">Uredi portfolio</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="main">
                <hr>

                <h3>Moji izdelki</h3>
                <?php
                foreach ($listings as $listing){

                    ?><div class="column">
                        <div class="content">
                            <img href="#" src="<?= PIC_URL . "index-picture1.jpg" ?>" alt="Mountains" style="width:100%">
                            <h3><?= $listing["name"] ?></h3>
                            <p><?= $listing["Description"] ?></p>
                        </div>
                    </div>
                <?php }?>

<!--
                <div class="column">
                    <div class="content">
                        <img src="<?= PIC_URL . "index-picture1.jpg" ?>" alt="Mountains" style="width:100%">
                        <h3>Naslov dela</h3>
                        <p>Opis dela</p>
                    </div>
                </div>
                <div class="column">
                    <div class="content">
                        <img src="<?= PIC_URL . "index-picture1.jpg" ?>"  alt="Lights" style="width:100%">
                        <h3>Naslov dela</h3>
                        <p>Opis dela</p>
                    </div>
                </div>
                <div class="column">
                    <div class="content">
                        <img src="<?= PIC_URL . "index-picture0.jpg" ?>"  alt="Nature" style="width:100%">
                        <h3>Naslov dela</h3>
                        <p>Opis dela</p>
                    </div>
                </div>
                <div class="column">
                    <div class="content">
                        <img src="<?= PIC_URL . "index-picture1.jpg" ?>"  alt="Mountains" style="width:100%">
                        <h3>Naslov dela</h3>
                        <p>Opis dela</p>
                    </div>
                </div>
-->
            </div>
        </div>


    </div>


    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer class="art-footer">
            <div class="row" padding-right="0" paddingleft="0">
                <div class="col-lg-12">
                    <p>Copyright &copy; Artista 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?= js_URL . "jquery.js" ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= js_URL . "bootstrap.min.js" ?>"></script>

</body>

</html>
