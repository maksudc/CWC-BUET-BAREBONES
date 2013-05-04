<?php
if(empty($_SESSION['user']))
{
    header('Location: '.ViewHelper::url('?page=login'));
}
$categories = App::getRepository('Category')->getAllCategories();
include_once 'header.php';
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

            <?php ViewHelper::flushMessage(); ?>

            <div class="row single-event">

                <div class="span2" style="padding: 10px 0 10px 10px;">
                    <img src="http://placehold.it/90x90" /><br/><br/>
                </div>

                <div class="span7">
                    <h2><?php echo 'Welcome';?></h2>
                    <div class="meta">
                        <?php echo $_SESSION['user']['email']; ?> <br />
                        <? //php echo $event['location'] ?><br />
                        
                    </div>
                </div>

            </div>

            <p class="align-justify">
            <div class="clearfix">
                <form action="<?php ViewHelper::url('?page=profile') ?>" method="post">
                    <label for="xlInput3">Enter Name:</label>
                    <div class="input">
                        <input class="xlarge" id="user_name" name="user_name" type="text"/>
                        <br/><br/>
                        <input type="submit" class="btn primary" value="Insert" />
                    </div>
                </form>
            </div>
            </p>
            <p></p>


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