<?php

require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));
require_once(get_theme_file_path("/widgets/social-icons-widget.php"));

if (!isset($content_width)) $content_width = 900;
function philosophy_setup_theme()
{
    load_theme_textdomain("philosophy", get_theme_file_path("/languages"));
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support('automatic-feed-links');
    add_theme_support("html5", array('search-form', 'comment-list'));
    add_theme_support("post-formats", array('image', 'gallery', 'audio', 'video', 'quote', 'link'));
    add_editor_style("assets/css/editor-style.css");

    add_image_size('philosophy-home-square', 400, 400, true);

    register_nav_menu("top_menu", __("Top Menu", "philosophy"));
}

add_action("after_setup_theme", "philosophy_setup_theme");

function philosophy_assets()
{
    wp_enqueue_style("fontawesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.css"), "1.0");
    wp_enqueue_style("fonts-css", get_theme_file_uri("/assets/css/font.css"), "1.0");
    wp_enqueue_style("base-css", get_theme_file_uri("/assets/css/base.css"), "1.0");
    wp_enqueue_style("vendor-css", get_theme_file_uri("/assets/css/vendor.css"), "1.0");
    wp_enqueue_style("main-css", get_theme_file_uri("/assets/css/main.css"), "1.0");
    wp_enqueue_style("philosophy-css", get_stylesheet_uri(), NULL);

    wp_enqueue_script("modernizr", get_theme_file_uri("/assets/js/modernizr.js"), NULL, "1.0", false);
    wp_enqueue_script("pace-js", get_theme_file_uri("/assets/js/pace.min.js"), NULL, "1.0", false);
    wp_enqueue_script("plugins-js", get_theme_file_uri("/assets/js/plugins.js"), array("jquery"), "1.0", true);

    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), "1.0", true);
}

add_action("wp_enqueue_scripts", "philosophy_assets");


function philosophy_pagination()
{
    global $wp_query;
    $links = paginate_links(array(
        'current'  => max(1, get_query_var('paged')),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => 3,
    ));

    $links = str_replace('page-numbers', 'pgn__num', $links);
    $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
    $links = str_replace('prev pgn__num', 'pgn__prev', $links);
    $links = str_replace('next pgn__num', 'pgn__next', $links);
    echo wp_kses_post($links);


}

function philosophy_widgets()
{
    register_sidebar(
        array(
            'name'          => __('About Us Page', 'philosophy'),
            'id'            => 'about-us',
            'description'   => __('About us page widgets', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="col-block %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="quarter-top-margin">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Contact page maps', 'philosophy'),
            'id'            => 'contact-maps',
            'description'   => __('Contact page maps section', 'philosophy'),
            'before_widget' => '<div id="map-wrap %1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Contact Page info box', 'philosophy'),
            'id'            => 'contact-info',
            'description'   => __('Contact Page info box widgets', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="col-block %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="quarter-top-margin">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Before Footer section', 'philosophy'),
            'id'            => 'before-footer',
            'description'   => __('Before Footer section', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer Left Widget', 'philosophy'),
            'id'            => 'footer-left',
            'description'   => __('Footer Left Widget', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="col-two md-four mob-full s-footer__sitelinks %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer Right Widget', 'philosophy'),
            'id'            => 'footer-right',
            'description'   => __('Footer right Widget', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer bottom Widget', 'philosophy'),
            'id'            => 'footer-bottom',
            'description'   => __('Footer bottom Widget', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Header section widget', 'philosophy'),
            'id'            => 'header-info',
            'description'   => __('Header section widget', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Footer Tag section widget', 'philosophy'),
            'id'            => 'tags-widgets',
            'description'   => __('This Widget Show on Footer Tag section', 'philosophy'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        )
    );
}

add_action('widgets_init', 'philosophy_widgets');
function philosophy_search_highlight($text)
{
    if (is_search()) {
        $pattern = '/(' . join('|', explode(' ', get_search_query())) . ')/i';
        $text    = preg_replace($pattern, '<span class="highlight__text">\0</span>', $text);
    }

    return $text;
}

add_filter("the_title", "philosophy_search_highlight");
add_filter("the_excerpt", "philosophy_search_highlight");
add_filter("the_content", "philosophy_search_highlight");

remove_action("term_description", "wpautop");
function philosophy_search_form($form)
{
    $homedir     = home_url("/");
    $label       = __("Search for:", "philosophy");
    $btn_label   = __("Search", "philosophy");
    $placeholder = __("Type Keywords", "philosophy");
    $newform     = <<<FORM
        <form role = "search" method = "get" class="header__search-form" action = "{$homedir}" >
                    <label >
                        <span class="hide-content" >{$label}</span >
                        <input type = "search" class="search-field" placeholder = "{$placeholder}" value = "" name = "s"
                               title = "{$label}" autocomplete = "off" >
                    </label>
                    <input type = "submit" class="search-submit" value = "{$btn_label}" >
                </form>
FORM;
    return $newform;
}

add_filter("get_search_form", "philosophy_search_form");

function philosophy_comment_cb($comment, $args, $depth)
{

    if ('div' == $args['style']) {
        $tag       = 'div';
        $add_below = 'div-comment';
    } else {
        $tag       = 'li';
        $add_below = 'comment';
    }
    ?>
    <<?php echo esc_html($tag) ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">


    <div class="comment__avatar">
        <?php if (0 != $args['avatar_size']) {
            echo get_avatar($comment, $args['avatar_size']);
        } ?>
    </div>

    <div class="comment__content">

        <div class="comment__info">
            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'philosophy'), get_comment_author_link()); ?>

            <div class="comment__meta">
                <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                    <?php printf(__('%1$s at %2$s', 'philosophy'), get_comment_date(), get_comment_time()); ?>
                </a>
                <?php edit_comment_link(__('Edit', 'philosophy'), '  ', '');
                ?>

                <?php
                $comments_reply_args = array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                );
                comment_reply_link(array_merge($args, $comments_reply_args)); ?>
            </div>
        </div>

        <div class="comment__text">
            <?php comment_text(); ?>
        </div>

    </div>

    <?php if ('li' == $args['style']) : ?>
    </<?php echo esc_html($tag); ?>>
<?php endif; ?>


    <?php
}

define('ACF_EARLY_ACCESS', '5');













