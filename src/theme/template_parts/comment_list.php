<li class="comment">
    <div class="comment__content">
        <div class="comment-info">
            <p class="comment-author"><?php echo get_comment_author(); ?></p><!-- .comment-author -->
            <p class="comment-date"><?php echo get_comment_date(); ?></p><!-- .comment-date -->
        </div><!-- .comment-info -->
        <p class="comment-text"><?php echo esc_html( get_comment_text( $comment->comment_ID ) ) ?></p><!-- .comment-text -->
<!--        <a href="--><?php //echo get_comment_reply_link(); ?><!--" class="comment-reply">-->
<!--            --><?php //persian_var_dump( get_comment_reply_link(  ) ); ?>
<!--            <i class="persian-response"></i>--><?php //_e( 'پاسخ دهید', 'persian_bourse' ); ?>
<!--        </a><!-- .comment-reply -->-->
        <?php  //persian_var_dump( get_comment_reply_link(  ) ); ?>
    </div><!-- .comment__content -->

