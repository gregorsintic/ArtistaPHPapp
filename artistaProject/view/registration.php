<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Artista - Najdi umetnika v sebi</title>
    <!-- CORE CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

    <style type="text/css">
        html,
        body {
            height: 100%;
        }
        html {
            display: table;
            margin: auto;
        }
        body {
            display: table-cell;
            vertical-align: middle;
        }
        .margin {
            margin: 0 !important;
        }
    </style>

</head>

<body style="background-color: whitesmoke">


<div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
        <form class="login-form" method="post" action="<?= BASE_URL . "register" ?>">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="<?= PIC_URL . "logo.png"?>" alt="" class="responsive-img valign profile-image-login">
                    <p class="center login-form-text">Pridruži se!</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input type="text" name="fname" id="fname" placeholder="Ime"  class="validate">
                    <label for="fname" class="center-align">Ime</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input name="lname" id="lname" placeholder="Priimek" type="text">
                    <label for="lname" class="center-align">Priimek</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-communication-email prefix"></i>
                    <input name="regEmail" id="regEmail" placeholder="Email"  type="email" class="validate">
                    <label for="regEmail" class="center-align">Email</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input type="password" name="pass" id="pass" placeholder="Geslo" class="validate">
                    <label for="pass">Geslo</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input type="password" name="cpass" id="cpass" placeholder="Potrdi geslo" >
                    <label for="cpass">Potrdite geslo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn col s12">Registriraj se</button>
                </div>
            </div>

        </form>
    </div>
</div>




<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--materialize js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>


<script src="//load.sumome.com/" data-sumo-site-id="1cf2c3d548b156a57050bff06ee37284c67d0884b086bebd8e957ca1c34e99a1" async="async"></script>



</body>

</html>