<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo ViewHelper::config('app.title') ?></title>
    <meta name="description" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo ViewHelper::url("assets/css/bootstrap.css") ?>" rel="stylesheet">
    <link href="<?php echo ViewHelper::url("assets/css/app.css") ?>" rel="stylesheet">
    <link href="<?php echo ViewHelper::url("assets/css/ui-lightness/jquery-ui-1.8.17.custom.css") ?>" rel="stylesheet">
    <script src="<?php echo ViewHelper::url("assets/js/jquery-1.7.1.min.js") ?>" type="text/javascript"></script>
    <script src="<?php echo ViewHelper::url("assets/js/jquery-ui-1.8.17.custom.min.js") ?>" type="text/javascript"></script>
    <script src="<?php echo ViewHelper::url("assets/js/myscript.js") ?>" type="text/javascript"></script>

</head>

<body>

<div class="topbar">

    <div class="fill">

        <div class="container">

            <a class="brand" href="<?php ViewHelper::url() ?>"><?php echo ViewHelper::config('app.title') ?></a>

            <ul class="nav">
                <li><a href="<?php ViewHelper::url() ?>">Home</a></li>
                <li><a href="<?php ViewHelper::url('?page=events') ?>">Events</a></li>
                <li><a href="<?php ViewHelper::url('?page=about') ?>">About</a></li>
                <?php if(isset($_SESSION['user'])):?>
                <li><a href="<?php ViewHelper::url('?page=profile') ?>">My Profile</a></li>
                <?php endif;?>
                <li><a href="<?php ViewHelper::url('?page=search_event') ?>">Search Event</a></li>
                 <li><a href="<?php ViewHelper::url('?page=search_talk')?>">Search Talk</a></li>
                 <li><a href="<?php ViewHelper::url('?page=admin')?>" class="small">Admin</a></li>
            </ul>

            <span class="pull-right">
                <?php if ($_SESSION['user']): ?>
                    <span><?php echo $_SESSION['user']['email'] ?></span> | <a href="<?php ViewHelper::url('?page=logout') ?>">Logout</a>
                <?php else: ?>
                    <a href="<?php ViewHelper::url('?page=login') ?>">
                        <img width="150px" height="26px" src="<?php ViewHelper::url('assets/images/google_signin.png') ?>" alt="Sign in with Google">
                    </a>
                <?php endif; ?>
            </span>

        </div>

    </div>

</div>

<div class="container">

