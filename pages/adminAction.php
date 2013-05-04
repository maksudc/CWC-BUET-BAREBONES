<?php
include_once 'header.php';

if ($_SESSION['admin_login'] != true) {
    header('Location: ' . ViewHelper::url('?page=admin', true));
}

$activeEvents = App::getRepository('Event')->getActiveEvents();
$categories = App::getRepository('Category')->getAllCategories();

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">
            <?php ViewHelper::flushMessage(); ?>
            <p>Welcome to Admin Authorized page.</p>
            <h3>Managing Categories</h3>
            <h5>Add New Category: </h5>
            <form action="<?php ViewHelper::url('?page=addCategory') ?>" method="post">
                <div class="clearfix">
                    <label for="xlInput3">Category Name:</label>
                    <div class="input">
                        <input class="xlarge" id="location" name="title" size="20" type="text" required autofocus="on">
                    </div>
                </div>
                <input type="submit" class="btn primary" value="Submit" />
            </form>
            <h5>Delete New Category: </h5>
            <form action="<?php ViewHelper::url('?page=deleteCategory') ?>" method="post">
                <div class="clearfix">
                    <label for="xlInput3"> Select Category:</label>
                    <div class="input">
                        <select name="title" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['title'] ?>"><?php echo $category['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                <input type="submit" class="btn primary" value="Submit" />
            </form>

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