<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($_POST)) {
    if (empty($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
        die();
    }
    $title = App::getRepository("Category")->deleteCategory($_POST);
    unset($_SESSION['token']);
    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Successfully deleted category!.';
    header('Location: ' . ViewHelper::url('?page=adminAction', true));
}
header('Location: ' . ViewHelper::url('?page=adminAction', true));
?>
