<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">
            <?php if (have_comments()) : ?>
                <h3 class="h2">
                    <?php
                    $philosophy_cn = get_comments_number();
                    if ($philosophy_cn <= 1) {
                        echo esc_html($philosophy_cn) . " " . __("Comment", "philosophy");
                    } else {
                        echo esc_html($philosophy_cn) . " " . __("Comments", "philosophy");
                    }
                    ?>
                </h3>

                <!-- commentlist -->
                <ol class="commentlist">

                    <?php
                    $args = array(
                        'style'       => 'ol',
                        'callback'    => 'philosophy_comment_cb',
                        'avatar_size' => 96,
                        'short_ping'  => true,
                    );
                    wp_list_comments($args); ?>

                </ol> <!-- end commentlist -->

                <div class="comments-pagination">
                    <?php the_comments_pagination(array(
                        'screen_reader_text' => __("Pagination", "philosophy"),
                        'prev_text'          => __("Previous Comments", "philosophy"),
                        'next_text'          => __("Next Comments", "philosophy"),
                    )); ?>
                </div>
            <?php endif; ?>
            <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
                ?>
                <p class="no-comments"><?php esc_html_e('Comments are closed.', 'philosophy'); ?></p>
            <?php endif; ?>
            <!-- respond
            ================================================== -->
            <div class="respond">
                <h3 class="h2"><?php _e("Add Comment", "philosophy"); ?></h3>
                <?php
                $commenter = wp_get_current_commenter();
                $req       = get_option('require_name_email');
                $aria_req  = ($req ? " aria-required='true'" : '');
                $consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

                $fields = array(
                    'author' => '<div class="form-field">
                                        <input name="author" type="text" id="author" class="full-width" ' . $aria_req . ' placeholder="'. esc_attr('Your Name', 'philosophy') .'" value="' . esc_attr( $commenter['comment_author'] ) .
                        '">
                                </div>',
                    'email'   => '<div class="form-field">
                                        <input name="email" type="text" id="email" class="full-width" ' . $aria_req . ' placeholder="'. esc_attr('Your Email', 'philosophy') .'" value="">
                                </div>',
                    'url'   => '<div class="form-field">
                                        <input name="url" type="text" id="url" class="full-width" placeholder="'. esc_attr('Website', 'philosophy') .'" value="">
                                </div>',
                    'cookies' => '<div class="form-field"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
                        '<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.' , 'philosophy') . '</label></div>',

                );
                ?>

                <?php comment_form(array(
                        'fields' => $fields,
                        'label_submit' => __( 'Comment', 'philosophy'),
                        'title_reply'          => __( 'Leave a Reply', 'philosophy'),
                        'title_reply_to'       => __( 'Leave a Reply to %s' , 'philosophy'),
                        'class_submit'  => 'submit btn--primary btn--large full-width',
                        'comment_notes_before' => '',
                        'comment_field' => '<div class="message form-field">
                                    <textarea name="comment" id="comment" class="full-width" ' . $aria_req . ' placeholder="'. esc_attr('Your Message', 'philosophy') .'"></textarea>
                                </div>'
                )); ?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->






