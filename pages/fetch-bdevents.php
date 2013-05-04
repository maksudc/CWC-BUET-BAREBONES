<?php

//fetch bdevents data....
function get_bdevents() {
    $url = 'http://192.168.1.4/api/events/';
    $data = file_get_contents($url);
    $data = json_decode($data, true);
    return $data;
}

//determine whether a data has to be inserted or not..
function compare_with_existing_events($api_events, $db_events) {

    for ($i = 0; $i < count($api_events); $i++) {
        $api_events[$i]['not_exists'] = 1;
        $data_exists_by_title = App::getRepository('Event')->search_event_by_title($api_events[$i]['name']);
        if ($data_exists_by_title)
            $api_events[$i]['not_exists'] = 0;  //discard existed events..
//Check for similarity in start and end date

        $data_exists_by_start_date = App::getRepository('Event')->search_event_by_start_date($api_events[$i]['start_date']);
        $data_exists_by_end_date = App::getRepository('Event')->search_event_by_end_date($api_events[$i]['end_date']);

        if ((empty($data_exists_by_start_date) || empty($data_exists_by_end_date)) && $api_events[$i]['not_exists'] == 0)
            $api_events[$i]['not_exists'] = 1;

        //Check for similarity in start and end date
        //$data_exists_by_href = App::getRepository('Event')->search_event_by_href($api_events[$i]['href']);

        if ((empty($data_exists_by_href)) && $api_events[$i]['not_exists'] == 0)
            $api_events[$i]['not_exists'] = 1;

        //$api_events[$i]['not_exists'] = 1;  //make room for existed events..
    }

    for ($i = 0; $i < count($api_events); $i++) {
        if ($api_events[$i]['not_exists'] == 1) {
            $api_events[$i]['title'] = $api_events[$i]['name'];
            $api_events[$i]['summary'] = $api_events[$i]['description'];
            unset($api_events[$i]['name']);
            unset($api_events[$i]['description']);
            unset($api_events[$i]['not_exists']);
            $data[$i] = $api_events[$i];
        }
    }

    return $data;
}

include_once 'header.php';

$activeEvents = App::getRepository('Event')->getActiveEvents();
$categories = App::getRepository('Category')->getAllCategories();
$events_in_db = App::getRepository('Event')->getEvents();
$bd_events = get_bdevents();
$events_for_insert = compare_with_existing_events($bd_events, $events_in_db);
for ($i = 0; $i < count($events_for_insert); $i++) {

    $insert_data = App::getRepository('Event')->create($events_for_insert[$i]);
}
?>

<div class="content">

    <div class="row">

        <div id="main-content" class="span10">

            <h4>Events have been imported.</h4>

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