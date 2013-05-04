<?php

if(empty($_SESSION['user']['email']))
{
    header('Location: '.ViewHelper::url('?page=login',true));
}

if (!empty($_POST)) {

    $data['title'] = $_POST['title'];
    $data['summary'] = $_POST['summary'];
    $data['location'] = $_POST['location'];
    $data['href'] = $_POST['href'];
    $data['start_date'] = $_POST['start_date'];
    $data['end_date'] = $_POST['end_date'];

    /*********** Uploading Photo**************/
    

    if(empty($_POST['category_ids']))
    {
        $data['category_id'] = null;
    }

    else
    {
        $data['category_id'] =  $_POST['category_ids'][0];
    }

    $eventId = App::getRepository('Event')->create($data);

    foreach($_POST['category_ids'] as $id)
    {
          App::getRepository('EventCategory')->add($eventId,$id);
    }
    
    
    $_SESSION['flash']['type']    = 'success';
    $_SESSION['flash']['message'] = 'Successfully added event!.';

    header('Location: '.ViewHelper::url('?page=manage_event&id=' . $eventId, true));
    exit;
}
include_once 'header.php';
$categories = App::getRepository('Category')->getAllCategories();



?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">
            <a href="<?php ViewHelper::url('?page=user_events')?>" class="btn warning large">
                       <h2>Submit A New Event!</h2>
            </a>            

            <p class="align-justify">Submit your event here to be included on Tech Adda. The site is aimed at events with sessions, where organisers are looking to use this as a tool to gather feedback.</p>

            <div class="post-comment">

                <form action="<?php ViewHelper::url('?page=add-event') ?>" class="form-stacked" method="post">

                    <div class="clearfix">
                        <label for="xlInput3">Event Title:</label>
                        <div class="input">
                            <input class="xxlarge" id="title" name="title" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Event Description:</label>
                        <div class="input">
                            <textarea class="xxlarge" id="summary" name="summary" rows="7" cols="50" required></textarea>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Category:</label>
                        <div class="input">
                            <select MULTIPLE name="category_ids[]" required>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Venue:</label>
                        <div class="input">
                            <input class="xlarge" id="location" name="location" size="30" type="text" required>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">URL:</label>
                        <div class="input">
                            <input class="xlarge" id="href" name="href" size="30" type="url">
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Date:</label>
                        <div class="inline-inputs">
                            <input class="small" id="datepicker" name="start_date" type="date"> to
                            <input class="small" id="datepicker1" name="end_date" type="date">
                            <span class="help-block">Please enter date in this format: mm/dd/yyyy.</span>
                        </div>
                    </div>

                    <div class="clearfix">
                        <label for="xlInput3">Logo:</label>
                        <div class="input">
                            <input class="xlarge" id="logo" name="logo" size="50" type="file">
                            <span class="help-block">The logo should be of dimension 90x90.</span>
                        </div>
                    </div>

                    <input type="submit" class="btn primary" value="Submit" />
                    <a href="<?php ViewHelper::url('?page=user_events')?>" class="btn primary">
                        Cancel
                    </a>
                </form>

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