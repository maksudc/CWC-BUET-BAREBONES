<?php
$event = App::getRepository('Event')->getEventById($_GET['id']);
$talks = App::getRepository('Talk')->getTalksByEvent($_GET['id']);
$categories = App::getRepository('Category')->getAllCategories();

$comments = App::getRepository('Comment')->getEventComments($_GET['id']);

$total_comments = count($comments);


include_once 'event_header.php';
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

<?php ViewHelper::flushMessage(); ?>

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

                        <strong>
                        <?php
                        $num_of_attendees = App::getRepository('event')->getNumberOfAttendeesByID($event['event_id']);
                        echo $num_of_attendees['count(*)'];
                        ?> 
                            attending
                        </strong> &nbsp;                            
                            <?php
                            $user_id_exists = App::getRepository('attendee')->getUserIDbyEventID($event['event_id']);
                            $event_id_exists = App::getRepository('attendee')->getEventIDByUserID();
                            if (!($user_id_exists && $event_id_exists)):
                                ?>
                            <form action="<?php ViewHelper::url('?page=home') ?>" class="form-stacked" method="post">
                                <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>"/>
                                <input type="submit" name="submit" class="btn small" value="I'm attending"/>
                            </form>
<?php else: ?>
                            <div class="span8"><strong><font color="green">You are attending</font></strong></div>
<?php endif; ?>
                        &nbsp;
                    </div>
                </div>

            </div>

            <p class="align-justify"><?php echo nl2br($event['summary']) ?></p>
            <p><strong>Event Link:</strong> <br /><a href="<?php echo $event['href'] ?>"><?php echo $event['href'] ?></a></p>
            <p><strong>Status: <?php if ($event['is_active'] == 1)
    echo 'Active'; else
    echo 'Closed' ?></strong>
            <div id="TabbedPanels1" class="TabbedPanels">
                <ul class="TabbedPanelsTabGroup">
                    <li class="TabbedPanelsTab" tabindex="0">
                        Talks <?php echo '(' . count($talks) . ')'; ?>
                    </li>
                    <li class="TabbedPanelsTab" tabindex="0">
                        Comments<?php echo '(' . $total_comments . ')'; ?>
                    </li>
                    <li class="TabbedPanelsTab" tabindex="0">
                        Slides<?php echo '(' . count($talks) . ')'; ?>
                    </li>
                </ul>
                <div class="TabbedPanelsContentGroup">
                    <div class="TabbedPanelsContent">
<?php foreach ($talks as $talk): ?>
                            <li>
                                <a href="<?php ViewHelper::url('?page=talk&id=' . $talk['talk_id']) ?>">
    <?php echo $talk['title'] ?>
                                </a>
                            </li>
<?php endforeach; ?>
                    </div>
                    <div class="TabbedPanelsContent">
                        <div class="comments">
<?php
foreach ($comments as $comment) {
    ?>
                                <div class="comment">
                                <?php echo $comment['create_date']; ?>
                                    <br/> by
                                    <!-- Here Link to user profile can be added-->
                                    <?php
                                    if ($_SESSION['user']) {
                                        echo $_SESSION['user']['name'] . $_SESSION['user']['email'] . '  (Feedback)';
                                    } else {
                                        echo "Anonymous (Feedback)";
                                    }
                                    ?>
                                    <br/>
                                    <?php
                                    echo $comment['body'];
                                    ?>
                                </div>                                   

                                    <?php
                                }
                                ?>
                        </div>
                        <div class="post-comment">
                            <h4>Write a comment:</h4>
                            <form action="<?php ViewHelper::url('?page=event_comment') ?>" class="form-stacked" method="post">

                                <textarea class="xxlarge" id="comment" name="body" rows="7" cols="50"></textarea>
                                <span class="help-block">Please be polite in your comment as this is a social site.</span> <br />

                                <input type="hidden" value="<?php echo $event['event_id'] ?>" name="event_id" />
                                <input type="submit" class="btn primary" value="Submit" />

                            </form>
                        </div>

                    </div>
                    <div class="TabbedPanelsContent">
<?php foreach ($talks as $talk): ?>
                            <li>
                                <a href="<?php echo $talk['slide_link']; ?>">
    <?php echo $talk['title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
            </script>
        </div>

        <div class="span4">

            <div class="widget">

                <h4>Categories</h4>

                <ul>
<?php foreach ($categories as $category): ?>
                        <li><a href="<?php ViewHelper::url('?page=cat&id=' . $category['category_id']) ?>"><?php echo $category['title'] ?></a></li>
<?php endforeach; ?>
                </ul>

            </div>

            <div class="widget">

                <h4>Submit your event</h4>

                <p>Arranging an event that is not listed here? Let us know! We love to get the word out about events the community would be interested in.</p>
                <p style="text-align: center;"><a href="<?php ViewHelper::url('?page=add-event') ?>" class="btn success">Submit your event!</a></p>


            </div>
            <?php require_once 'attendee_list.php';?>

        </div>

    </div>

</div>

<?php include_once 'footer.php'; ?>