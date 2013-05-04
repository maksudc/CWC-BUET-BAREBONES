<?php

if(!UserStatusHelper::isLoggedIn())
{
    header('Location: '.ViewHelper::url('?page=login',true));
}

$talk = App::getRepository('Talk')->getTalkById($_GET['id']);
$event = App::getRepository('Event')->getEventById($talk['event_id']);

if($event['user_id']!=$_SESSION['user']['user_id'])
{
    $_SESSION['flash']['type'] = 'warning';
    $_SESSION['flash']['type'] = 'You  Do not have permission to delete the talk';
    header('Location: '.ViewHelper::url('?page=user_events',true));//profile Address
    exit;
}

if($_GET['d']==1)
{
    App::getRepository('Talk')->delete($_GET['id']);

    $_SESSION['flash']['type'] = 'success' ;
    $_SESSION['flash']['message'] = 'Talk Successfully Deleted';

    header('Location: '.ViewHelper::url('?page=manage_talks&id='.$talk['event_id'],true));
    exit;
}
?>

<?php
$talk = App::getRepository('Talk')->getTalkById($_GET['id']);
?>

<?php include_once 'templates/header.php';?>

<?php
    include_once 'templates/row_start.php';
    include_once 'templates/main_content_start.php';

?>
<a class="btn success large"  href="<?php ViewHelper::url('?page=manage_talk&id='.$talk['talk_id']);?>">
    Back To Talk
</a>
<a class="btn success large"  href="<?php ViewHelper::url('?page=manage_event&id='.$talk['event_id']);?>">
    Back To Main Event
</a>
<center class="post-comment large">
    <p class="btn large post-comment"> Do you really want to delete this Talk</p>
    <a class="btn large primary" href="<?php ViewHelper::url('?page=delete_talk&id='.$_GET['id'].'&d=1');?>">Yes</a>
    <a class="btn large primary" href="<?php ViewHelper::url('?page=manage_talk&id='.$_GET['id'].'&d=0');?>"> No </a>
</center>
<?php

    include_once 'templates/single_talk.php';
?>

<?php

    include_once 'templates/main_content_end.php';
    include_once 'templates/sidebar.php';
    include_once 'templates/row_end.php';
?>
