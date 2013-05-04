<?php

if(!UserStatusHelper::isLoggedIn())
{
    header('Location: '.ViewHelper::url('?page=login',true));
}

if(!empty($_POST))
{
    $talk_id = App::getRepository('Talk')->create($_POST);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Talk Successfully Created';

    header('Location: '.ViewHelper::url('?page=manage_talk&id='.$talk_id,true));
}

$event = App::getRepository('Event')->getEventById($_GET['id']);
?>
<?php
include_once 'templates/header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';
?>
<div class="btn warning large">
    Add a new Talk
</div>
<a class="btn success large"  href="<?php ViewHelper::url('?page=manage_event&id='.$talk['event_id']);?>">
    Back To Main Event
</a>
    <?php ViewHelper::flushMessage();?>
        <div class="post-comment">
                <form action="<?php ViewHelper::url('?page=add_talk&id='.$_GET['id']) ?>" class="form-stacked" method="post">

                    <div class="clearfix">
                        <label for="xlInput3">Talk Title:</label>
                        <div class="input">
                            <input class="xxlarge" id="title" name="title" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Talk Description:</label>
                        <div class="input">
                            <textarea class="xxlarge" id="summary" name="summary" rows="7" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Speaker:</label>
                        <div class="input">
                            <input class="xlarge" id="location" name="speaker" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Slide Link:</label>
                        <div class="input">
                            <input class="xlarge" id="href" name="slide_link" size="30" type="url">
                        </div>
                    </div>

                    <input type="hidden" name="event_id" value="<?php echo $event['event_id']?>"/>
                    <input type="submit" class="btn primary" value="Submit" />

                    <a href="<?php ViewHelper::url('?page=manage_talks&id='.$_GET['id'])?>" class="btn primary">
                        Cancel
                    </a>
                </form>
            </div>

<?php
include_once 'templates/main_content_end.php';
include_once 'templates/sidebar.php';
include_once 'templates/row_end.php';
include_once 'templates/footer.php';
?>
