<div class="widget">
    <? ?>
    <h4>Who's attending</h4>
    <?php
    $attendee_list = App::getRepository('Attendee')->getUserByEventID($_GET['id']);
    $total_attendees = count($attendee_list);

    //print_r($attendee_list);
    //echo ceil($total_attendees/3);
    ?>
    <p>
    <table border="0" align="center">
        <?php for ($i = 0; $i < ceil($total_attendees / 3); $i++):
            //echo $i; ?>
            <tr>
                <td><?php
        if (isset($attendee_list[$i * 3]['user_id'])) {
            $attendees_photo = App::getRepository('User')->getPhotoByID($attendee_list[$i * 3]['user_id']);
            $name = App::getRepository('User')->getNameByID($attendee_list[$i * 3]['user_id']);
            //print_r($expression);
            $link = $attendees_photo['user_photo'];
            echo "<img src='$link' width='30' height='30'/><br/>";
            if (isset($name['name'])) {
                echo $name['name'];
            }
            else
                echo 'No Name';
        }
            ?></td>
                <td><?php
                if (isset($attendee_list[$i * 3+1]['user_id'])) {
                    $attendees_photo = App::getRepository('User')->getPhotoByID($attendee_list[$i * 3+1]['user_id']);
                    $name = App::getRepository('User')->getNameByID($attendee_list[$i * 3+1]['user_id']);
                    //print_r($expression);
                    $link = $attendees_photo['user_photo'];
                    echo "<img src='$link' width='30' height='30'/><br/>";
                    if (isset($name['name'])) {
                        echo $name['name'];
                    }
                    else
                        echo 'No Name';
                }
            ?></td>
                <td><?php
                if (isset($attendee_list[$i * 3+2]['user_id'])) {
                    $attendees_photo = App::getRepository('User')->getPhotoByID($attendee_list[$i * 3+2]['user_id']);
                    $name = App::getRepository('User')->getNameByID($attendee_list[$i * 3+2]['user_id']);
                    //print_r($expression);
                    $link = $attendees_photo['user_photo'];
                    echo "<img src='$link' width='30' height='30'/><br/>";
                    if (isset($name['name'])) {
                        echo $name['name'];
                    }
                    else
                        echo 'No Name';
                }
            ?></td>
            </tr>
        <?php endfor; ?>
    </table>
</p>
</div>