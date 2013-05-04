<?php

if (!empty($_POST)) {
    App::getRepository('Comment')->create($_POST);

    App::getRepository('Talk')->incrementTotalComments($_POST['talk_id']);
    
    header('Location: ' . ViewHelper::url('?page=talk&id=' . $_POST['talk_id'], true));
} else {
    header('Location: ' . ViewHelper::url('', true));
}