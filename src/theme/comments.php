<?php
// Get only the approved comments
//$args = array(
//	'status' => 'approve',
//);

// The comment Query
//$comments_query = new WP_Comment_Query();
//$comments       = $comments_query->query( $args );

// Comment Loop
//if ( $comments ) {
//	foreach ( $comments as $comment ) {
//		echo '<p>' . $comment->comment_content . '</p>';
//	}
//} else {
//	echo 'No comments found.';
//}
//wp_list_comments();
//comment_form();

?>

<div class="comments">
    <div class="comments__list">
        <div class="container">
            <div class="bourse-title bourse-title--blue">
                <h6><?php _e( 'نظرات <span>کاربران</span>', 'persian_bourse' ); ?></h6>
<?php $approved_comments = get_comment_count()['approved']; ?>
<a class="bourse-read-more" href="#"><?php echo $approved_comments . ' ' . __( 'نظر', 'persian_bourse' ); ?></a>
</div>
<ul>
    <?php
    $args = [
        'callback' => 'persian_comments'
    ];
    wp_list_comments( $args );
    ?>
</ul>
</div><!-- .container -->
</div><!-- .comments_list -->
<div class="container">
    <form class="comments__form" action="<?php echo site_url() . '/wp-comments-post.php' ?>" method="post">
        <div class="row p30">
            <div class="col-md-8 col-sm-24 col-24">
                <div class="field-wrapper">
                    <input class="comments-full-name" type="text" name="name"
                           placeholder="نام و نام خانوادگی" required>
                    <i class="persian persian-user"></i>
                </div><!-- .field-wrapper -->
            </div><!-- .col-md-8 -->
            <div class="col-md-8 col-sm-24 col-24">
                <div class="field-wrapper">
                    <input class="comments-phone" type="text" name="user_phone_number"
                           placeholder="تلفن همراه">
                    <i class="persian persian-mobile"></i>
                </div><!-- .field-wrapper -->
            </div><!-- .col-md-8 -->
            <div class="col-md-8 col-sm-24 col-24">
                <div class="field-wrapper">
                    <input class="comments-email" type="email" name="email"
                           placeholder="ایمیل" required>
                    <i class="persian persian-email"></i>
                </div><!-- .field-wrapper -->
            </div><!-- .col-md-8 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-24">
                <div class="field-wrapper">
                        <textarea class="comments-text" name="comment" rows="6"
                                  placeholder="متن دیدگاه" required></textarea>
                </div><!-- .field-wrapper -->
            </div><!-- .col-24 -->
        </div><!-- .row -->
        <button class="comments-submit" type="submit" name="submit">ارسال دیدگاه</button>
        <?php
            comment_id_fields();
            do_action('comment_form', $post->ID );
        ?>
    </form><!-- .comments__form -->
</div><!-- .container -->
</div><!-- .comments -->
<?php //comment_form(); ?>
