<?php


if(!empty($_POST))
{
    /*
     * Val;idation for XSS must be enabled
     * Pending to be fulfilled by providing the XSS filtering of posting and commenting
     */
    App::getRepository('Comment')->createEventComment($_POST);

    App::getRepository('Event')->incrementTotalComments($_POST['event_id']);

    //header('Location: '. ViewHelper::url('?page=event&id='.$_POST['event_id'],true));
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
else
{
   header('Location: '.$_SERVER['HTTP_REFERER']);
}
?>
