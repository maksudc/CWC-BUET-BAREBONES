<?php



$event = App::getRepository('Event')->getEventById($_GET['id']);
$talks = App::getRepository('Talk')->getTalksByEvent($_GET['id']);
$categories = App::getRepository('Category')->getAllCategories();

$comments = App::getRepository('Comment')->getEventComments($_GET['id']);

$total_comments = count($comments);
?>