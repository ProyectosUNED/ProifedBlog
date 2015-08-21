<?php
global $post;

if ( post_password_required() )
    return;

if ( comments_open() ) : ?>

        <?php
        $commenttype = apply_filters('jeg_comment_type', vp_option('joption.comment_type', 'wordpress'));
        if($commenttype === 'wordpress') {
            if ( get_option('comment_registration') && !is_user_logged_in() )
            {
                echo '<section id="comments" class="comment-wrapper section">';
                echo "<span class='comment-login'>" . sprintf(__("Please <a href='%s'>login</a> to join discussion","jeg_textdomain"), wp_login_url(home_url(), false)) . "</span>";
                echo '</section>';
            } else {
                if ( have_comments() ) { ?>
                    <section id="comments" class="comment-wrapper section">
                        <h3 class="comment-heading">
                            <?php printf ( _n ( 'Discussion about this %1$s', '%2$s Discussion to this %1$s', get_comments_number(), 'jeg_textdomain' ) , $post->post_type, number_format_i18n(get_comments_number()) ); ?>
                        </h3>

                        <ol class="commentlist">
                            <?php
                            wp_list_comments(array(
                                'avatar_size' => '55',
                                'walker' => new Jeg_Walker_Comment
                            ));
                            ?>
                        </ol>

                        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                            <div class="comment-navigation navigation" >
                                <div class='alignleft' style="margin-bottom: 20px;">
                                    <?php next_comments_link('<span>&laquo;</span> Previous') ?>
                                </div>
                                <div class='alignright' style="margin-bottom: 20px;">
                                    <?php previous_comments_link('Next<span>&raquo;</span>') ?>
                                </div>
                            </div>
                        <?php endif;  ?>
                    </section>

                <?php
                }

                echo "<section class='comment-respond section' id='response'>";
                $req      = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $html5    = 'html5';
                $fields = array(
                    'author' => '<div class="row"><div class="col-md-4"><p class="comment-field">' .
                        '<input placeholder="' . __( 'Name', 'jeg_textdomain' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p></div>',
                    'email'  => '<div class="col-md-4"><p class="comment-field">' .
                        '<input placeholder="' . __( 'Email', 'jeg_textdomain' ) . '" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' /></p></div>',
                    'url'    => '<div class="col-md-4"><p class="comment-field">' .
                        '<input placeholder="' . __( 'Website', 'jeg_textdomain' ) . '" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div></div>',
                );
                $comment_field = '<div class="row"><div class="col-md-12"><textarea id="comment" placeholder="'. _x( 'Comentario', 'noun', 'jeg_textdomain' ) .'" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></div></div>';
                comment_form(array(
                    'fields' =>  $fields,
                    'comment_field' => $comment_field
                ));
                echo "</section>";
            }
        } else if($commenttype === 'facebook') {
            echo '<section id="comments" class="comment-wrapper section">';
            echo "<h3 class='comment-heading'>";
            printf(__('Discussion about this %s','jeg_textdomain'), $post->post_type);
            echo "</h3>";
            echo '<div class="fb-comments" data-href="' . get_the_permalink() . '" data-num-posts="10" data-width="100%"></div>';
            echo '</section>';
        } else if($commenttype === 'disqus') {
            echo '<section id="comments" class="comment-wrapper section">';
            echo "<h3 class='comment-heading'>";
            printf(__('Discussion about this %s','jeg_textdomain'), $post->post_type);
            echo "</h3>";
        ?>
            <div id="disqus_thread"></div>
        <?php
            echo '</section>';
        }
        ?>
<?php endif; ?>