<?php

if(!empty($_POST))
{


    $data['title'] = $_POST['title'];
    $data['speaker'] = $_POST['speaker'];
    $data['slide_link']  = $_POST['slide_link'];
    $data['event_id'] = $_POST['event_id'];

    if(empty($data['title'])){$data['title']=' ';}
    if(empty($data['speaker'])){$data['speaker']=' ';}
    if(empty($data['slide_link'])){$data['slide_link']=' ';}
    if(empty($data['event_id'])){$data['event_id']= 0;}




    $talks = App::getRepository('Talk')->getSearchResult($data);
}
?>

<?php

    include_once 'templates/header.php';
    include_once 'templates/row_start.php';
    include_once 'templates/main_content_start.php';

?>


<?php if(count($talks)==0): ?>
<div class="btn warning">
    No Result Found.
</div>
<?php endif;?>

<?php if(count($talks)>0):?>
<div class="btn warning">
    Total <?php echo count($talks);?> Results Found
</div>

<?php include_once 'templates/event_search_form.php';?>

<?php foreach($talks as $talk): ?>

<?php include_once 'templates/single_talk.php';?>

<?php endforeach;?>

<?php endif;?>


<?php

    include_once 'templates/main_content_end.php';
    include_once 'templates/sidebar.php';
    include_once 'templates/row_end.php';
    include_once 'templates/footer.php';
?>

?>


<?php if(count($events)==0): ?>
<div class="btn warning">
    No Result Found.
</div>
<?php endif;?>

<?php if(count($events)>0):?>
<div class="btn warning">
    Total <?php echo count($events);?> Results Found
</div>

<?php include_once 'templates/event_search_form.php';?>

<?php foreach($events as $event): ?>

<div class="row single-event">

                <div class="span2" style="padding: 10px 0 10px 10px;">
                    <?php if (!empty($event['logo'])): ?>
                        <img src="<?php echo $event['logo'] ?>" />
                    <?php else: ?>
                        <img src="http://placehold.it/90x90" />
                    <?php endif; ?>
                </div>

                <div class="span7">
                    <h2><?php echo $event['title'] ?></h2>
                    <div class="meta">
                        <?php echo ViewHelper::formatDate($event['start_date']) ?> - <?php echo ViewHelper::formatDate($event['end_date']) ?> <br />
                        <?php echo $event['location'] ?><br />
                       <!-- <a href="#" class="btn small">I'm attending</a> &nbsp; <strong><?php //echo $event['total_attending'] ?> people</strong> attending so far!-->
                    </div>
                </div>

            </div>

            <p class="align-justify"><?php echo nl2br($event['summary']) ?></p>
            <p><strong>Event Link:</strong> <br /><a href="<?php echo $event['href'] ?>"><?php echo $event['href'] ?></a></p>
            <p><strong>Status: <?php if($event['is_active']==1) echo 'Active'; else echo 'Closed'?></strong>

<?php endforeach;?>

<?php endif;?>


<?php

    include_once 'templates/main_content_end.php';
    include_once 'templates/sidebar.php';
    include_once 'templates/row_end.php';
    include_once 'templates/footer.php';
?>
