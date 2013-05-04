<?php

if(!UserStatusHelper::isLoggedIn())
{

    $_SESSION['flash']['type'] = 'warning';
    $_SESSION['flash']['message'] = 'You must Log in to see this page';
    
    header('Location: '.ViewHelper::url('?page=login',TRUE));
}

$event = App::getRepository('Event')->getEventById($_GET['id']);
$talks = App::getRepository('Talk')->getTalksByEvent($_GET['id']);

?>

<?php

include_once 'templates/header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';
?>
<?php
include_once 'templates/talks_home_menu.php';
?>


<?php ViewHelper::flushMessage();?>
<div class="events">

    <?php foreach($talks as $talk):?>
    <?php include_once 'templates/single_talk.php';?>
    <?php endforeach;?>
    
</div>

<?php
include_once 'templates/main_content_end.php';
include_once 'templates/sidebar.php';
include_once 'templates/row_end.php';
include_once 'templates/footer.php';
?>

