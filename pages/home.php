<?php
/* if(empty($_SESSION['user']))
  {
  header('Location: '.ViewHelper::url('?page=login',true));
  } */

if (isset($_POST['event_id'])) {

    if (!UserStatusHelper::isLoggedIn()) {
        header('Location: ' . ViewHelper::url('?page=login', true));
    }

    $data['event_id'] = $_POST['event_id']; //$event_id;
    $insert_id = App::getRepository('attendee')->insertAttendee($data);

    /*
     * Must Increment The corresponding even table's total_attending column
     */

    App::getRepository('Event')->incrementTotalAttending($_POST['event_id']);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Attendence Confirmed !!.';

    unset($_POST);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['page_num'])) {
    $from = $_POST['page_num'];
}
else
    $from=0;
$totalEvents = App::getRepository('Event')->getEvents();
$activeEvents = App::getRepository('Event')->getActiveEventsForPagination($from + 1);
$totalActiveEvents = count($totalEvents);
//echo $totalActiveEvents;
$totalEventsPerPage = 3;
$numOfLinks = ceil($totalActiveEvents / $totalEventsPerPage);
$categories = App::getRepository('Category')->getAllCategories();
$isShown = 0;
?>

<?php include_once 'header.php'; ?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

            <?php ViewHelper::flushMessage(); ?>

            <div class="alert-message block-message success">
                <h4>Welcome to Tech Adda!  <strong><?php echo $_SESSION['user']['email']; ?></strong></h4>
                <p>This is the site where event attendees can leave feedback on a tech event and its sessions. 
                    <?php if (empty($_SESSION['user'])): ?>
                        Do you have an opinion? Then <a href="<?php ViewHelper::url('?page=login') ?>">log in</a> and share it!
                    <?php endif; ?>
                    </p>
                </div>

                <h4>Upcoming Events</h4>

                <div class="events">
                <?php if ($isShown != $totalEventsPerPage): ?>

                <?php foreach ($activeEvents as $event): ?>

                                <div class="row event">

                                    <div class="span2">
                        <?php if (!empty($event['logo'])): ?>
                                    <img src="<?php echo $event['logo'] ?>" />
                        <?php else: ?>
                                        <img src="http://placehold.it/90x90" />
                        <?php endif; ?>
                                    </div>

                                    <div class="span8">
                                        <h3><a href="<?php ViewHelper::url('?page=event&id=' . $event['event_id']) ?>"><?php echo $event['title'] ?></a></h3>
                                        <p class="align-justify"><?php echo $event['summary'] ?></p>
                                        <p>
                                            <a href="<?php ViewHelper::url('?page=event&id=' . $event['event_id'] . '#comments') ?>"><?php echo $event['total_comments'] ?> comments</a> &nbsp;
                                            <strong><?php $num_of_attendees = App::getRepository('event')->getNumberOfAttendeesByID($event['event_id']);
                                        echo $num_of_attendees['count(*)']; ?> attending</strong> &nbsp;
                            <?php
                                        $user_id_exists = App::getRepository('attendee')->getUserIDbyEventID($event['event_id']);
                                        $event_id_exists = App::getRepository('attendee')->getEventIDByUserID();
                                        if (!(UserStatusHelper::isLoggedIn()) || !($user_id_exists && $event_id_exists)):
                            ?>

                                        <div class="span8" id="update"></div>
                                        <form action="<?php ViewHelper::url('?page=home') ?>" class="form-stacked" method="post">
                                            <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>"/>
                                            <input type="submit" name="submit" class="btn small" value="I'm attending"/>
                                        </form>
                        <?php else: ?>
                                                <div class="span8"><strong><font color="green">You are attending</font></strong></div>

                        <?php endif; ?>
                                            </div>

                                        </div>

                <?php endforeach; ?>

                <?php endif; ?>
                                            </div>

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

                                        </div>

                                    </div>
                                    <p>
                                    <table border="1" cellspacing="2" width="10%">
                                        <tr>
            <?php for ($count = 0; $count < $numOfLinks; $count++): ?>

                                                        <td>
                                                            <form action="<?php ViewHelper::url('?page=home'); ?>" method="post">
                                                                <input type="hidden" name="page_num" value="<?php echo $count * 3; ?>"/>
                                                                <input type="submit" class="btn success" value="<?php echo $count + 1 ?>"/>
                                                            </form>
                                                        </td>

            <?php endfor; ?>

                                                    </tr>
                                                </table>
                                            </p>
                                            </div>


<?php include_once 'footer.php'; ?>