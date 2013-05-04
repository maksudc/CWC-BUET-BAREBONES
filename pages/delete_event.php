<?php

if( (!empty($_GET['d']))  &&  ($_GET['d']==1))
{
    App::getRepository('Event')->deleteEvent($_GET['id']);
    
    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Event Successfully Deleted';

    header('Location: '.ViewHelper::url('?page=user_events',true));
    exit;
}

$event = App::getRepository('Event')->getEventById($_GET['id']);
?>
<?php include_once 'templates/header.php';?>

<?php
    include_once 'templates/row_start.php';
    include_once 'templates/main_content_start.php';
?>
<center class="post-comment large">
    <p class="btn large post-comment"> Do you really want to delete this event</p>
    <a class="btn large primary" href="<?php ViewHelper::url('?page=delete_event&id='.$_GET['id'].'&d=1');?>">Yes</a>
    <a class="btn large primary" href="<?php ViewHelper::url('?page=manage_event&id='.$_GET['id'].'&d=0');?>"> No </a>
</center>
<?php

    include_once 'templates/single_event.php';
?>
<?php include_once 'templates/comment_block_start.php';?>

<?php include_once 'templates/comment_block_end.php';?>

<?php

    include_once 'templates/main_content_end.php';
    include_once 'templates/sidebar.php';
    include_once 'templates/row_end.php';
?>