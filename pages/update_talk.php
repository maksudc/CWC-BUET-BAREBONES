<?php

if(!UserStatusHelper::isLoggedIn())
{
    header('Location: '.ViewHelper::url('?page=login'));
    exit;
}

if(!empty($_POST))
{
    App::getRepository('Talk')->update($_POST);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Talk Successfully Updated';

    header('Location: '.ViewHelper::url('?page=manage_talk&id='.$_GET['id'],true));
}

$talk = App::getRepository('Talk')->getTalkById($_GET['id']);

include_once 'templates/header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';

?>
<div class="warning btn large">
    Update your Talk
</div>
<a class="btn success large"  href="<?php ViewHelper::url('?page=manage_talk&id='.$talk['talk_id']);?>">
    Back To Talk
</a>
<a class="btn success large"  href="<?php ViewHelper::url('?page=manage_event&id='.$talk['event_id']);?>">
    Back To Main Event
</a>

  <?php ViewHelper::flushMessage();?>
        <div class="post-comment">
                <form action="<?php ViewHelper::url('?page=add_talk&id='.$_GET['id']) ?>" class="form-stacked" method="post">

                    <div class="clearfix">
                        <label for="xlInput3">Talk Title:</label>
                        <div class="input">
                            <input class="xxlarge" id="title" name="title" value="<?php echo $talk['title']?>" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Talk Description:</label>
                        <div class="input">
                            <textarea class="xxlarge" id="summary" name="summary" value="<?php echo $talk['summary'];?>" rows="7" cols="50" required><?php echo $talk['summary']?></textarea>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Speaker:</label>
                        <div class="input">
                            <input class="xlarge" id="location" name="speaker" value="<?php echo $talk['speaker'];?>" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Slide Link:</label>
                        <div class="input">
                            <input class="xlarge" id="href" name="slide_link"  value="<?php echo $talk['slide_link'];?>" size="30" type="url">
                        </div>
                    </div>

                    <input type="hidden" name="event_id" value="<?php echo $talk['event_id'];?>"/>

                    <input type="submit" class="btn primary" value="Submit" />
                    <a href="<?php ViewHelper::url('?page=manage_talk&id='.$talk['talk_id'])?>" class="btn primary">
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