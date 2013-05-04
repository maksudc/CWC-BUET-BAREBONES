<h3>Comments</h3>

            <div class="comments">
                <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <div class="meta"><strong><?php echo empty($comment['name']) ? $comment['email'] : $comment['name'] ?></strong> on <em><?php echo ViewHelper::formatDate($comment['create_date']) ?></em> said:</div>
                    <?php echo nl2br($comment['body']) ?>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="post-comment">

                <h4>Write a comment:</h4>
                <form action="<?php ViewHelper::url('?page=comment') ?>" class="form-stacked" method="post">

                    <textarea class="xxlarge" id="comment" name="body" rows="7" cols="50"></textarea>
                    <span class="help-block">Please be polite in your comment as this is a social site.</span> <br />

                    <input type="hidden" value="<?php echo $talk['talk_id'] ?>" name="talk_id" />
                    <input type="submit" class="btn primary" value="Submit" />

                </form>

</div>