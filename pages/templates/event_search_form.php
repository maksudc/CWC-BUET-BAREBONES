<div class="post-comment">
    <div class="btn warning">
        Find Out Exciting Events
    </div>
    <form class="form-stacked medium" action="<?php ViewHelper::url('?page=event_search_result');?>" method="post">
        <div class="clearfix">
            <label for="xlInput3">Title :</label>
                <div class="input">
                     <input class="xxlarge" id="title" name="title" size="30" type="text">
                </div>
        </div>

        <div class="clearfix">
           <label for="xlInput3">Location:</label>
              <div class="input">
                  <input class="xxlarge" id="location" name="location"/>
              </div>
         </div>

        <div class="clearfix">
           <label for="xlInput3">URL:</label>
              <div class="input">
                   <input class="xxlarge" id="href" name="location"/>
              </div>
         </div>
                <div class="clearfix">
                        <label for="xlInput3">Category:</label>
                        <div class="input">
                            <select  name="category_id" required>
                                <?php $categories = App::getRepository('Category')->getAllCategories() ;foreach ($categories as $category): ?>
                                <option  value="<?php echo $category['category_id'] ?>"><?php echo $category['title'] ?></option>
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