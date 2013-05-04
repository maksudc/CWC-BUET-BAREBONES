<?php

include_once 'header.php';

$category = App::getRepository('Category')->getCategoryById($_GET['id']);
$activeEvents = App::getRepository('Event')->getActiveEventsByCategory($category['category_id']);
$categories = App::getRepository('Category')->getAllCategories();

?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

            <h4>Events on <?php echo $category['title'] ?></h4>

            <div class="events">

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
                          <strong>
                            <?php

                                $num_of_attendees = App::getRepository('event')->getNumberOfAttendeesByID($event['event_id']);
                                echo $num_of_attendees['count(*)'];
                            ?>
                            attending
                         </strong> &nbsp;
                          <?php
                                $user_id_exists=App::getRepository('attendee')->getUserIDbyEventID($event['event_id']);
                                $event_id_exists=App::getRepository('attendee')->getEventIDByUserID();
                                if (!(UserStatusHelper::isLoggedIn()) || !($user_id_exists && $event_id_exists)):
                           ?>
                           <form action="<?php ViewHelper::url('?page=home') ?>" class="form-stacked" method="post">
                                    <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>"/>
                                    <input type="submit" name="submit" class="btn small" value="I'm attending"/>
                           </form>
                           <?php else:?>
                                    <div class="span8"><strong><font color="green">You are attending</font></strong></div>
                            <?php endif; ?>
                        </div>

                </div>

                <?php endforeach; ?>

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

</div>

<?php include_once 'footer.php'; ?>