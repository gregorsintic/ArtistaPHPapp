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
    <link href="<?= CSS_URL . "bootstrap.css" ?>" rel="stylesheet">

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
            <img href="<?= BASE_URL . "homepage"?>" class="navbar-image" src="<?= PIC_URL . "logo.png" ?>" id="logo" href="#">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse bg-art" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="bg-art"><a href="<?= BASE_URL . "homepage"?>">Domov</a></li>
                <li class="bg-art"><a href="<?= BASE_URL . "about"?>">O nas</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown">Moj Profil <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= BASE_URL . "upload"?>">Dodaj nov izdelek</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= BASE_URL . "editportfolio"?>">Uredi profil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= BASE_URL . "portfolio"?>">Moj Portfolio</a></li>
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
                <a href="<?= BASE_URL . "upload"?>" class="list-group-item">Dodaj izdelek</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="main">
                <hr>

                <div class="container">
                    <h1>Urejanje portfolia</h1>
                    <hr>
                    <div class="row">
                        <!-- left column -->



                        <div class="col-md-9 personal-info">
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a>
                                <i class="fa fa-coffee"></i>
                                Zaradi <strong>povečanega</strong> števila uporabnikov prihaja do degradacije storitev. Trenutno še odpravljamo problem. Hvala za razumevanje!
                            </div>
                            <h3>Podatki</h3>
                            <!-- FORM -->
                            <form class="form-horizontal" role="form" method="post" action="<?= BASE_URL . "portfolioinfo" ?>" accept-charset="UTF-8" id="register-nav" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Ime:</label>
                                    <div class="col-lg-8">
                                        <input id="ime" name="ime" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Priimek:</label>
                                    <div class="col-lg-8">
                                        <input id="priimek" name="priimek" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">E-naslov:</label>
                                    <div class="col-lg-8">
                                        <input id="email" name="email" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Opis:</label>
                                    <div class="col-lg-8">
                                        <input id="opis" name="opis" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-primary" value="Shrani spremembe">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="text-center">
                                        <h6>Naložite drugo sliko...</h6>

                                        <input type="file" class="form-control" id="picture" name="picture" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- /.container -->


                <!-- /.container -->

                <!-- jQuery -->
                <script src="<?= js_URL . "jquery.js" ?>"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="<?= js_URL . "bootstrap.min.js" ?>"></script>

</body>

</html>
