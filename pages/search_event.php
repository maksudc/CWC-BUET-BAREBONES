<?php

$categories = App::getRepository('Category')->getAllCategories();

include_once 'templates/header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';
?>
<?php include_once 'templates/event_search_form.php';?>

<?php
include_once 'templates/main_content_end.php';
include_once 'templates/row_end.php';
include_once 'templates/footer.php';
?>


