<?php

if(!UserStatusHelper::isLoggedIn())
{
    header('Location: '.ViewHelper::url('?pages=login',true));
}

$talk = App::getRepository('Talk')->getTalkById($_GET['id']);

include_once 'templates/header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';

include_once 'templates/talk_manage_menu.php';
?>

<?php ViewHelper::flushMessage();?>
<?php
include_once 'templates/single_talk.php';

include_once 'templates/main_content_end.php';
include_once 'templates/sidebar.php';
include_once 'templates/row_end.php';
include_once 'templates/footer.php';
?>