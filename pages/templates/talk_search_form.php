<div class="post-comment">
    <div class="btn warning">
        Find Out Talks
    </div>
    <form class="form-stacked medium" action="<?php ViewHelper::url('?page=talk_search_result');?>" method="post">
        <div class="clearfix">
            <label for="xlInput3">Title :</label>
                <div class="input">
                     <input class="xxlarge" id="title" name="title" size="30" type="text" required>
                </div>
        </div>

        <div class="clearfix">
           <label for="xlInput3">Speaker:</label>
              <div class="input">
                  <input class="xxlarge" id="speaker" name="speaker"/>
              </div>
         </div>

        <div class="clearfix">
           <label for="xlInput3">Slide Link:</label>
              <div class="input">
                   <input class="xxlarge" id="slide_link" name="slide_link"/>
              </div>
         </div>
                <div class="clearfix">
                        <label for="xlInput3">Category:</label>
                        <div class="input">
                            <select  name="event_id">
                                <?php $events = App::getRepository('Event')->getActiveEvents() ;foreach ($events as $event): ?>
                                <option  value="<?php echo $event['event_id']?>"><?php echo $event['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                <!-- <div class="clearfix">
                        <label for="xlInput3">Between</label>
                        <div class="inline-inputs">
                            <input class="small" id="datepicker" name="start_date" type="date"> to
                            <input class="small" id="datepicker1" name="end_date" type="date">
                            <span class="help-block">Please enter date in this format: mm/dd/yyyy.</span>
                        </div> -->

                 <input type="submit" class="btn primary" value="Submit" />
                 <a href="<?php ViewHelper::url('?page=home');;//ViewHelper::url('?page=user_events')?>" class="btn primary">
                        Cancel
                    </a>
       </form>
</div>