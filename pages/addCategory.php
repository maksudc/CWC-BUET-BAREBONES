<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!empty($_POST)) {
    App::getRepository("Category")->addCategory($_POST);
    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Successfully added category!.';
}

header('Location: ' . ViewHelper::url('?page=adminAction', true));
?>
