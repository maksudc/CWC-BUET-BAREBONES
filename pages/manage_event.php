<?php

if(!UserStatusHelper::isLoggedIn())
{
    $_SESSION['flash']['type'] = 'warning';
    $_SESSION['flash']['message'] = 'You must Log In to see this page';
    header('Location: '.ViewHelper::url('?pages=login',true));
}

$event = App::getRepository('Event')->getEventById($_GET['id']);

include_once 'header.php';
include_once 'templates/row_start.php';
include_once 'templates/main_content_start.php';
include_once 'templates/user_event_manage_menu.php';
include_once 'templates/single_event.php';
include_once 'templates/comment_block_start.php';
?>
<link href="<?php  echo  ViewHelper::url('assets/css/SpryTabbedPanels.css')?>" rel="stylesheet" />
<script src="<?php echo ViewHelper::url('assets/js/SpryTabbedPanels.js')?>" type="text/javascript"></script>

            <div id="TabbedPanels1" class="TabbedPanels">
                  <ul class="TabbedPanelsTabGroup">
                    <li class="TabbedPanelsTab" tabindex="0">
                        Talks <?php echo '('.count($talks).')';?>
                    </li>
                    <li class="TabbedPanelsTab" tabindex="0">
                        Comments<?php echo '('.$total_comments.')';?>
                    </li>
                    <li class="TabbedPanelsTab" tabindex="0">
                        Slides<?php echo '('.count($talks).')';?>
                    </li>
                  </ul>
                  <div class="TabbedPanelsContentGroup">
                    <div class="TabbedPanelsContent">
                       <?php foreach ($talks as $talk): ?>
                            <li>
                                <a href="<?php  ViewHelper::url('?page=talk&id=' . $talk['talk_id']) ?>">
                                    <?php echo $talk['title'] ?>
                                </a>
                            </li>
                      <?php endforeach; ?>
                    </div>
                    <div class="TabbedPanelsContent">
                        <div class="comments">
                             <?php
                                foreach($comments as $comment)
                                {
                            ?>
                            <div class="comment">
                                <?php  echo $comment['create_date'];?>
                                           <br/> by
                                           <!-- Here Link to user profile can be added-->
                                            <?php
                                                  if($_SESSION['user'])
                                                  {
                                                      echo $_SESSION['user']['name'].$_SESSION['user']['email'].'  (Feedback)';
                                                  }
                                                  else
                                                  {
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
                                <a href="<?php echo $talk['slide_link'];?>">
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


<?php 
include_once 'templates/main_content_end.php';
include_once 'templates/sidebar.php';
include_once 'templates/row_end.php';
include_once 'footer.php';
?>
