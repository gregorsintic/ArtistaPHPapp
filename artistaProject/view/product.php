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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        #produktSlika {
            padding: 0px 15px 15px 15px;
        }
    </style>
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
            <img class="navbar-image" src="<?= CSS_URL . "logo.png" ?>" id="logo" href="#">
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
                        <li><a href="portfolio.html">Moj Portfolio</a></li>
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
                <li><p class="navbar-text">Already have an account?</p></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    Login via
                                    <div class="social-buttons">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                    </div>
                                    or
                                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                            <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> keep me logged-in
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    New here ? <a href="#"><b>Join Us</b></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div>

    <div class="art-container">
        <div class="row">
            <div class="col-md-2">
                <p class="lead"></p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Dodaj izdelek</a>
                    <a href="mojiIzdelki.html" class="list-group-item">Moji izdelki</a>
                    <a href="urediPortfolio.html" class="list-group-item">Uredi portfolio</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="main">
                    <div id="wrap">
                        <!-- leva kolona je slika -->
                        <div class="column">
                            <img id="produktSlika" class="active" src="<?= PIC_URL . "logo.png" ?>" >
                        </div>


                        <!-- desna kolona so podatki -->
                        <div class="column">


                            <div class="product-description">
                                <span>Tip Izdelka</span>
                                <h1>Ime izdelka</h1>
                                <p>opis</p>
                            </div>


                            <div class="product-configuration">


                                <div class="product-price">
                                    <span>150€</span>
                                    <a href="#" class="cart-btn">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <hr>
                            <!-- Footer -->
                            <footer class="art-footer">
                                <div class="row" padding-right="0" paddingleft="0">
                                    <div class="col-lg-12">
                                        <!-- <p>Copyright &copy; Artista 2017</p> -->
                                    </div>
                                </div>
                            </footer>
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- jQuery -->
                    <script src="<?= js_URL . "jquery.js" ?>"></script>

                    <!-- Bootstrap Core JavaScript -->
                    <script src="<?= js_URL . "bootstrap.min.js" ?>"></script>

</body>

</html>
