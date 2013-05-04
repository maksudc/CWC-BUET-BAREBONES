<?php

if(!UserStatusHelper::isLoggedIn())
{

    $_SESSION['flash']['type'] = 'warning';
    $_SESSION['flash']['message'] = 'You must Log In to see this page';
    header('Location: '.ViewHelper::url('?page=login',true));
}
$categories = App::getRepository('Category')->getAllCategories();

$events = App::getRepository('Event')->getEventsByUserId();
$total_events =  count($events);

include_once 'header.php';
include_once 'templates/user_event_home_menu.php';
?>

    <div class="content">
        <div class="row">
            <div id="main-content" class="span10">
               <div class="alert-message block-message success">
                   <?php echo ViewHelper::flushMessage();?>
                    <h4>Welcome to Dashboard <strong><?php echo $_SESSION['user']['name'];echo '('.$_SESSION['user']['email'].')';?></strong></h4>
                    <p>Here you can manage your Events</p>
                </div>

                <div class="events">
                    <?php foreach($events as $event): ?>
                    <div class="row event">
                        <span class="span2">
                            <?php if (!empty($event['logo']) || $event['logo']!=''):?>
                            <img src="<?php  echo $event['logo'];?>"/>
                            <?php else: ?>
                            <img src="<?php  echo ViewHelper::url('assets/images/default.gif');?>"/>
                            <?php endif;?>
                        </span>
                        <span class="span8">
                            <h3>
                                <a href="<?php ViewHelper::url('?page=manage_event&id='.$event['event_id']);?>">
                                     <?php echo $event['title'];?>
                                </a>
                            </h3>
                            <p class="allign-justify">
                                <?php echo $event['summary'];?>
                            </p>
                            <p>
                                <a href="<?php ViewHelper::url('?page=manage_event&id='.$event['event_id']);?>">
                                     <?php echo $event['total_comments'];?> Comments
                                </a>
                                <strong>
                                    <?php echo $event['total_attending']?> Attending
                                </strong>
                            </p>
                            <?php ?>

                        </span>

                    </div>
                    <?php endforeach;?>
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
  <?php include_once 'footer.php';?>
