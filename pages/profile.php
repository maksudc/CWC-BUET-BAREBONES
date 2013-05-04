<?php
if (empty($_SESSION['user'])) {
    header('Location: ' . ViewHelper::url('?page=login',true));
}
//print_r($_FILES);
if (!empty($_POST)) {
    extract($_POST);
    //$user_name = mysql_real_escape_string($user_name);
    if (isset($user_name)) {
        $user_name = trim($user_name);
        if ($user_name != '') {
            $name_inserted = App::getRepository('User')->updateName($user_name, $_SESSION['user']['email']);
            $_SESSION['flash']['type'] = 'success';
            $_SESSION['flash']['message'] = 'Successfully updated!.';

            header('Location: ' . ViewHelper::url('?page=profile', true));
            exit;
        }
        /*elseif (isset($event_id)) {
            $data['event_id'] = $event_id;
            $insert_id = App::getRepository('attendee')->insertAttendee($data);

            $_SESSION['flash']['type'] = 'success';
            $_SESSION['flash']['message'] = 'Attendence Confirmed !!.';

            header('Location: '.ViewHelper::url('?page=home'));
            exit;
        }*/
        else {
            //$_SESSION['flash']['type'] = 'success';
            $_SESSION['flash']['message'] = 'You did not give any input!.';

            header('Location: ' . ViewHelper::url('?page=profile', true));
            exit;
        }
    }
}
if (!empty($_FILES)) {

    //print_r($_POST);
    $target = './uploads/user_photos/';
    $target.=basename($_FILES['user_photo']['name']);
    if ($_FILES['user_photo']['name'] == '') {
        // $_SESSION['flash']['type'] = 'success';
        $_SESSION['flash']['message'] = 'No Image Selected!.';
    }
    //echo $target;
    //$pic = $_FILES['user_photo']['name'];
    else {
        if ($_FILES['user_photo']['size'] > 204800) {
            $file_size = $_FILES['user_photo']['size'] / 1024;
            $_SESSION['flash']['message'] = 'File Must be within ' . $file_size . ' KB';
            header('Location: ' . ViewHelper::url('?page=profile', true));
            exit;
        } else {
            $validMimes = array(
                'image/png' => '.png',
                'image/x-png' => '.png',
                'image/gif' => '.gif',
                'image/jpeg' => '.jpg',
                'image/pjpeg' => '.jpg'
            );
            if (!array_key_exists($_FILES['user_photo']['type'], $validMimes)) {
                $_SESSION['flash']['message'] = 'Invalid File!.';
                header('Location: ' . ViewHelper::url('?page=profile', true));
                exit;
            } else {
                $filename = substr($_FILES['user_photo']['name'], 0, strrpos($_FILES['user_photo']['name'], '.'));
                $filename .= $validMimes[$_FILES['user_photo']['type']];
                //echo $filename;
                $_FILES['user_photo']['name'] = $filename;
                if (file_exists($target)) {
                    $_SESSION['flash']['message'] = 'File Already Exists!.';
                    header('Location: ' . ViewHelper::url('?page=profile', true));
                    exit;
                    //echo $_FILES['user_photo']['name'] . "already exists.";
                    //exit;
                } else {
                    move_uploaded_file($_FILES['user_photo']['tmp_name'], $target);
                    //echo 'Stored in ' . $target;
                }
            }
        }
        $id_exists = App::getRepository('User')->getIDFromUserPhoto();
        if (!$id_exists) {
            $photo_inserted = App::getRepository('User')->insertPhoto($target);
            $_SESSION['flash']['type'] = 'success';
            $_SESSION['flash']['message'] = 'Successfully inserted!.';
        } else {
            $previous_photo = App::getRepository('User')->getPhoto();
            unlink($previous_photo['user_photo']);
            $photo_updated = App::getRepository('User')->updatePhoto($target);
            $_SESSION['flash']['type'] = 'success';
            $_SESSION['flash']['message'] = 'Successfully updated!.';
        }
    }


    header('Location: ' . ViewHelper::url('?page=profile', true));
    exit;
}
$categories = App::getRepository('Category')->getAllCategories();
$name = App::getRepository('User')->getUserNameByEmail($_SESSION['user']['email']);
$user_image = App::getRepository('User')->getPhoto();

include_once 'header.php';
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

<?php ViewHelper::flushMessage(); ?>

            <div class="row single-event">

                <div class="span2" style="padding: 10px 0 10px 10px;">
<?php if (!$user_image['user_photo']): ?>
                        <img src="http://placehold.it/90x90" /><br/><br/>
                    <?php else: ?>
                        <img src="<?php echo $user_image['user_photo']; ?>" width="90" height="90"/><br/><br/>
                    <?php endif; ?>
                    <a href="<?php ViewHelper::url('?page=photo-upload') ?>"><button class="btn primary">Change Picture</button></a>
                </div>

                <div class="span7">
                    <h2><?php echo 'Welcome';
                    echo $name_inserted; ?></h2>
                    <div class="meta">
                        <?php echo $_SESSION['user']['email']; ?> <br />
                        <? //php echo $event['location']      ?><br />

                    </div>
                </div>

            </div>

            <p class="align-justify"><strong>&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;</strong>
<?php if (!isset($name['name'])): ?>
    <?php echo "You havn't provided your name yet." ?>&nbsp;&nbsp;
                    <a href="<?php ViewHelper::url('?page=name-insert') ?>"><button class="btn primary">Insert Name</button></a>
                <?php else: ?>
                    <?php echo $name['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php ViewHelper::url('?page=name-insert') ?>"><button class="btn primary">Change Name</button></a>
                <?php endif; ?>
                    <br/><br/><br/>  
                    <p>&nbsp;&nbsp;<a href="<?php ViewHelper::url('?page=user_events') ?>"><button class="btn success">My Events</button></a></p>


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