<?php

if(!UserStatusHelper::isLoggedIn())
{
    header('Location: '.ViewHelper::url('?pages=login',true));
}

if(!empty($_POST))
{
    App::getRepository('Event')->updateEvent($_POST);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message']= 'Event Successfully Updated';
    /*
     * File Must Be imported and saved in a directory
     */

    header('Location: '.ViewHelper::url('?page=manage_event&id='.$_GET['id'],true));
    exit;
}

$categories = App::getRepository('Category')->getAllCategories();

$event = App::getRepository('Event')->getEventById($_GET['id']);

?>
<?php

include_once 'templates/header.php';

?>


<!--Show The Update Form For Event -->

<div class="content">

        <div class="row">

            <div id="main-content" class="span10">
                <a class="btn success large"  href="<?php ViewHelper::url('?page=manage_event&id='.$event['event_id']);?>">
                    Back To Main Event
                </a>

                <p class="allign-justify">
                    Please Provide the update information. Once You update your previous records will be lost
                </p>

                <div class="post-comment">

                    <form action="<?php  ViewHelper::url('?page=update_event&id='.$_GET['id'])?>"  method="post"  class="form-stacked" >

                        <div class="clearfix">
                            <label for="xlInput3">Event Title:</label>
                            <div class="input">
                                <input class="xxlarge" id="title" name="title" value="<?php echo $event['title'];?>" size="30" type="text"  required>
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="xlInput3">Event Description:</label>
                            <div class="input">
                                <textarea class="xxlarge" id="summary" name="summary" value="<?php echo $event['summary'];?>" rows="7" cols="50" required><?php echo $event['summary'];?></textarea>
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="xlInput3">Category:</label>
                            <div class="input">
                                <select name="category_id" required>
                                    <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['category_id'] ?>"><?php echo $category['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="xlInput3">Venue:</label>
                            <div class="input">
                                <input class="xlarge" id="location" name="location"  value="<?php echo $event['location'];?>" size="30" type="text" required>
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="xlInput3">URL:</label>
                            <div class="input">
                                <input class="xlarge" id="href" name="href" value="<?php echo $event['href'];?>" size="30" type="url">
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="xlInput3">Date:</label>
                            <div class="inline-inputs">
                                <input class="small" id="datepicker" name="start_date" value="<?php echo $event['start_date'];?>" type="date"> to
                                <input class="small" id="datepicker1" name="end_date" value="<?php echo $event['end_date'];?>"type="date">
                                <span class="help-block">Please enter date in this format: mm/dd/yyyy.</span>
                            </div>
                        </div>

                        <p class="allign-justify btn medium">Preview</p>
                        <span name="preview" class="span2">
                            <?php if(!empty($event['logo'])):?>
                                <img src="<?php echo $event['logo'];?>" width="90" height="90" class="btn" name="preview_logo"/>
                            <?php else:?>
                                <img src="<?php ViewHelper::url('assets/images/default.gif')?>" width="90" height="90" name="preview_logo"/>
                            <?php endif;?>
                        </span>

                        <div class="clearfix">
                            <label for="xlInput3">Logo:</label>
                            <div class="input">
                                <input class="xlarge" id="logo" value="<?php if(!empty($event['logo']))echo $event['logo'];else echo ViewHelper::url('assets/images/default.gif')?>" name="logo" size="30" type="file">
                                <span class="help-block">The logo should be of dimension 90x90.</span>
                            </div>
                        </div>

                        <input type="hidden" name="event_id" value="<?php echo $event['event_id']?>"/>

                        <input type="submit" class="btn primary" value="Submit" />
                        <a href="<?php ViewHelper::url('?page=manage_event&id='.$_GET['id'])?>" class="btn primary">
                            Cancel
                        </a>
                    </form>
                    
                </div>
                
                
            </div>
            <?php include_once 'templates/sidebar.php';?>
            
        </div>
</div>
<!-- End of Update Form -->


<?php

include_once 'footer.php';

?>
