<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Registrar2.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- @todo: fill with your company info or remove -->
        <meta name="description" content="">
        <meta name="author" content="Themelize.me">

        <!-- Bootstrap 3.3.7 CSS via CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Font Awesome 4.5.0 via CDN -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->
        <!-- Plugin: animate.css (animated effects) - http://daneden.github.io/animate.css/ -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet">
        <!-- @LINEBREAK -- <!-- Plugin: flag icons - http://lipis.github.io/flag-icon-css/ -->
        <link href="plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

        <!-- Theme style -->
        <link href="css/theme-style.min.css" rel="stylesheet">

        <!--Your custom colour override-->
        <link href="#" id="colour-scheme" rel="stylesheet">

        <!-- Your custom override -->
        <link href="css/custom-style.css" rel="stylesheet">

        <!-- HTML5 shiv & respond.js for IE6-8 support of HTML5 elements & media queries -->
        <!--[if lt IE 9]>
        <script src="plugins/html5shiv/dist/html5shiv.js"></script>
        <script src="plugins/respond/respond.min.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
        <link rel="shortcut icon" href="img/icons/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icons/114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icons/72x72.png">
        <link rel="apple-touch-icon-precomposed" href="img/icons/default.png">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>

        <!--Plugin: Retina.js (high def image replacement) - @see: http://retinajs.com/-->
        <script src="plugins/retina/dist/retina.min.js"></script>
    </head>

    <!-- ======== @Region: body ======== -->
    <body class="page page-index">
        <a href="#content" class="sr-only">Skip to content</a> 

        <!-- ======== @Region: #navigation ======== -->
        <div id="navigation" class="wrapper">
            <div class="navbar">

                <!--Header search region - hidden by default -->
                <div class="header-search">
                    <form class="search-form container">
                        <input type="text" name="search" class="form-control search" value="" placeholder="Search">
                        <button type="button" class="btn btn-link"><span class="sr-only">Search </span><i class="fa fa-search fa-flip-horizontal search-icon"></i></button>
                        <button type="button" class="btn btn-link close-btn" data-toggle="search-form-close"><span class="sr-only">Close </span><i class="fa fa-times search-icon"></i></button>
                    </form>
                </div>

                <!--Header & Branding region-->
                <div class="header" data-toggle="clingify">
                    <div class="header-inner container">
                        <div class="navbar">
                            <div class="pull-left">
                                <!--branding/logo-->
                                <a class="navbar-brand" href="index.php" title="Home">
                                    <h1>
                                        <span>DNSathon</span>Registrar2<span>.</span>
                                    </h1>
                                </a>
                                <div class="slogan">Un Registrar de Qualite.</div>
                            </div>

                            <!-- mobile collapse menu button - data-toggle="toggle" = default BS menu - data-toggle="jpanel-menu" = jPanel Menu -->
                            <a href="#top" class="navbar-btn" data-toggle="jpanel-menu" data-target=".navbar-collapse" data-direction="right"><i class="fa fa-bars"></i></a>

                            <!--everything within this div is collapsed on mobile-->
                            <div class="navbar-collapse collapse">
                                <!--main navigation-->
                                <ul class="nav navbar-nav">
                                    <li class="home-link">
                                        <a href="#"><i class="fa fa-home"></i><span class="hidden">Home</span></a>
                                    </li>
                                </ul>
                            </div>
                            <!--/.navbar-collapse -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======== @Region: #content ======== -->
        <div id="content">
            <div class="container">
                <?php if (isset($_GET['message']) && isset($_GET['dispo']) && $_GET['dispo'] == 1) { ?>
                    <div class="alert alert-dismissable alert-success text-center"> 
                        <p class="text-center">Domaine disponible: <a href="signup.php" class="btn btn-success">Ajouter domaine</a></p>

                    </div>
                <?php } elseif (isset($_GET['message'])) { ?>
                    <div class="alert alert-dismissable alert-danger text-center"> 
                        <p><?= $_GET['message']; ?></p>
                    </div>
                <?php } ?>

                <div class="block features well ">
                    <div id="header" >
                        <h1 class="text-center">Recherche d'un nom de domaine</h1>
                        <form class="form" role="search" action="recherche.php" method="POST">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" name="nom" class="form-control " id="navbar-search-input" placeholder="Rechercher" required>
                                </div>
                                <div class="col-lg-2">
                                    <select name="topdomaine" class="form-control" required>
                                        <option value=".ctn">.ctn</option>
                                        <option value=".real">.real</option>
                                        <option value=".btn">.btn</option>
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <input type="submit" value="Rechercher" class="btn btn-default">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Pricing Table-->
                <div class="block">
                    <h2 class="title-divider">
                        <span>Nos offres  <span class="de-em">Tarifaires</span></span>
                        <small>Des offres tarifaires en fonctions de vos besoins</small>
                    </h2>
                    <div class="row pricing-stack">
                        <div class="col-md-3">
                            <div class="well">
                                <h3 class="title">
                                    Debutant
                                </h3>
                                <p class="price"><span class="fancy">Gratuit!</span></p>
                                <ul class="unstyled points">
                                    <li>3 Comptes Utilisateurs</li>
                                    <li>3 Projets Prives</li>
                                    <li>Projets Publics Illimites</li>
                                    <li>5GB d'espaces</li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well active">
                                <h3 class="title">
                                    <span class="em">Pro</span> <span class="fancy">Plus</span>
                                </h3>
                                <p class="price">
                                    
                                    <span class="digits">1000</span>
                                    <span class="currency">fcfa</span> 
                                    <span class="term">/MO</span>
                                </p>
                                <ul class="unstyled points">
                                    <li>50 Comptes Utilisateurs</li>
                                    <li>50 Projets Prives</li>
                                    <li>Projets Publics Illimites</li>
                                    <li>Espaces Illimites</li>
                                </ul>                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well active">
                                <h3 class="title">
                                    <span class="em">Business</span> <span class="fancy">Plus</span>
                                </h3>
                                <p class="price">
                                   
                                    <span class="digits">1500</span>
                                    <span class="currency">fcfa</span> 
                                    <span class="term">/MO</span>
                                </p>
                                <ul class="unstyled points">
                                    <li>Comptes Utilisateurs illimites</li>
                                    <li>Projets Prives illimites</li>
                                    <li>Projets Publics Illimites</li>
                                    <li>Espaces Illimites</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well">
                                <h3 class="title">
                                    Master <span class="fancy"></span>
                                </h3>
                                <p class="price">
                                    
                                    <span class="digits">2000</span>
                                    <span class="currency">fcfa</span> 
                                    <span class="term">/MO</span>
                                </p>
                                <ul class="unstyled points">
                                    <li>10 Comptes Utilisateurs </li>
                                    <li>10 Projets Prives</li>
                                    <li>Projets Publics Illimites</li>
                                    <li>15GB d'espaces</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======== @Region: #content-below ======== -->
        <div id="content-below" class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="upsell">
                        <small class="muted"><span class="spacer"></span> Assistance pour mise a jour gratuite!<span class="spacer">//</span> 24/7 Support <span class="spacer">//</span> Des plans pour 20000 FCFA/mois Whaoo!!<span class="spacer"> </span> </small>
                        <a href="pricing.htm" class="btn btn-primary">Commencez votre evaluation aujourd'hui! <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->

        <!-- ======== @Region: #footer ======== -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col">
                        <div class="block contact-block">
                            <!--@todo: replace with company contact details-->
                            <h3>
                                Contactez Nous
                            </h3>
                            <address>
                                <ul class="fa-ul">
                                    <li>
                                        <abbr title="Phone"><i class="fa fa-li fa-phone"></i></abbr>
                                        +229 21457896
                                    </li>
                                    <li>
                                        <abbr title="Email"><i class="fa fa-li fa-envelope"></i></abbr>
                                        regstrar2@adja.ctn
                                    </li>
                                    <li>
                                        <abbr title="Address"><i class="fa fa-li fa-home"></i></abbr>
                                        Hotel KTA COTONOU
                                    </li>
                                </ul>
                            </address>
                        </div>
                    </div>

                    <div class="col-md-5 col">
                        <div class="block">
                            <h3>
                                A Propos
                            </h3>
                            <p>Nous faisons de vos besoins nos offres de services!!  </p>
                        </div>
                    </div>

                    <div class="col-md-4 col">
                        <div class="block newsletter">
                            <h3>
                                Nouveautés
                            </h3>
                            <p>Restez connectez pour les supers offres de fin d'annees</p>
                            <!--@todo: replace with mailchimp code-->
                            <form role="form">
                                <div class="input-group input-group-sm">
                                    <label class="sr-only" for="email-field">Email</label>
                                    <input type="text" class="form-control" id="email-field" placeholder="Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="toplink">
                        <a href="#top" class="top-link" title="Back to top">Remonter <i class="fa fa-chevron-up"></i></a>
                    </div>
                    <!--@todo: replace with company copyright details-->
                    <div class="subfooter">
                        <div class="col-md-6">
                            <p>Producted by <a href="index.php">Registrar2.</a> | Copyright 2017 &copy; Registrar2.</p>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline footer-menu">
                                <li><a href="#">Termes</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Nous Contactez</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Hidden elements - excluded from jPanel Menu on mobile-->
        <div class="hidden-elements jpanel-menu-exclude">
            <!--@modal - signup modal-->
            <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                Sign Up
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="signup.htm" role="form">
                                <h5>
                                    Price Plan
                                </h5>
                                <select class="form-control">
                                    <option>Basic</option>
                                    <option>Pro</option>
                                    <option>Pro +</option>
                                </select>

                                <h5>
                                    Account Information
                                </h5>
                                <div class="form-group">
                                    <label class="sr-only" for="signup-first-name">First Name</label>
                                    <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="signup-last-name">Last Name</label>
                                    <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="signup-username">Userame</label>
                                    <input type="text" class="form-control" id="signup-username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="signup-email">Email address</label>
                                    <input type="email" class="form-control" id="signup-email" placeholder="Email address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="signup-password">Password</label>
                                    <input type="password" class="form-control" id="signup-password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="term">
                                        I agree with the Terms and Conditions. 
                                    </label>
                                </div>
                                <button class="btn btn-primary" type="submit">Sign up</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <small>Already signed up? <a href="login.htm">Login here</a>.</small>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!--@modal - login modal-->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                Login
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="login.htm" role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="login-email">Email</label>
                                    <input type="email" id="login-email" class="form-control email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="login-password">Password</label>
                                    <input type="password" id="login-password" class="form-control password" placeholder="Password">
                                </div>
                                <button type="button" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <small>Not a member? <a href="#" class="signup">Sign up now!</a></small>
                            <br />
                            <small><a href="#">Forgotten password?</a></small>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>


        <!--jQuery 1.12.0 via CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 JS via CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <!-- JS plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->

        <!--Custom scripts mainly used to trigger libraries/plugins -->
        <script src="js/script.min.js"></script>
    </body>
</html>