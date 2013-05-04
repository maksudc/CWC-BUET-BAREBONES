<br/>
<br/>
<br/>
<div class="row single-event">

        <span class="span2">

            <?php if($event['logo']):?>
                <img src="<?php echo $event['logo'];?>"/>
            <?php else:?>
                <img src="<?php ViewHelper::url('assets/images/default.gif');?>"/>
            <?php endif;?>
        </span>
        <span class="span7">

            <a href="<?php ViewHelper::url('?page=manage_talk&id='.$talk['talk_id']);?>">
                <?php echo $talk['title'];?>
            </a>
            <p class="align-justify"><?php echo nl2br($talk['summary']) ?></p>
                
        </span>
            <p class="allign-justify">
               <strong> Speaker: </strong>  <?php echo $talk['speaker'];?>
               <br/>
            </p>
            <strong> Slide:  </strong><a href="<?php echo $talk['slide_link']?>"><?php echo $talk['slide_link']?></a>
            &nbsp;
            &nbsp;
            &nbsp;
               <a href="<?php ViewHelper::url('?page=manage_talk&id='.$talk['talk_id']);?>">
                         <?php echo $talk['total_comments'];?> Comments
               </a>
               
            
    </div>