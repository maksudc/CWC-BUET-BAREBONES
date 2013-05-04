<?php
if (!empty($_POST)) {
    $adminId = App::getRepository('Admin')->verifyLogin($_POST);
    if ($adminId != false) {
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_id'] = $adminId;
        header('Location: ' . ViewHelper::url('?page=adminAction', true));
    }
}
include_once 'header.php';
$activeEvents = App::getRepository('Event')->getActiveEvents();
$categories = App::getRepository('Category')->getAllCategories();
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

            <form action="<?php ViewHelper::url('?page=admin') ?>" class="form-stacked" method="post">
                <div class="clearfix">
                    <label for="xlInput3">Email Id:</label>
                    <div class="input">
                        <input class="xlarge" id="location" name="email" size="20" type="email" required autofocus="on">
                    </div>
                </div>
                <div class="clearfix">
                    <label for="xlInput3">Password:</label>
                    <div class="input">
                        <input class="xlarge" id="location" name="password" size="20" type="password" required>
                    </div>
                </div>
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