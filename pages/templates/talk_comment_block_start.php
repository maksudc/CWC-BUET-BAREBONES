<?php

$talk = App::getRepository('Talk')->getTalkById($_GET['id']);
$event = App::getRepository('Event')->getEventById($talk['event_id']);
$comments = App::getRepository('Comment')->getCommentsByTalk($talk['talk_id']);
$categories = App::getRepository('Category')->getAllCategories();

?>