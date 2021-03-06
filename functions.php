<?php
add_action('after_setup_theme', 'mowfni_corporate_setup');
function mowfni_corporate_setup()
{
    load_theme_textdomain('mowfni_corporate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'mowfni_corporate'),
        'secondary-menu' => esc_html__('Secondary Menu', 'mowfni_corporate')
    )
);
}
add_action('wp_enqueue_scripts', 'mowfni_corporate_load_scripts');
function mowfni_corporate_load_scripts()
{
    wp_enqueue_style('mowfni_corporate-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
}
add_action('wp_footer', 'mowfni_corporate_footer_scripts');
function mowfni_corporate_footer_scripts()
{
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
<?php
}
add_filter('document_title_separator', 'mowfni_corporate_document_title_separator');
function mowfni_corporate_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'mowfni_corporate_title');
function mowfni_corporate_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
add_filter('the_content_more_link', 'mowfni_corporate_read_more_link');
function mowfni_corporate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'mowfni_corporate_excerpt_read_more_link');
function mowfni_corporate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'mowfni_corporate_image_insert_override');
function mowfni_corporate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('widgets_init', 'mowfni_corporate_widgets_init');
function mowfni_corporate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'mowfni_corporate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('wp_head', 'mowfni_corporate_pingback_header');
function mowfni_corporate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'mowfni_corporate_enqueue_comment_reply_script');
function mowfni_corporate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function mowfni_corporate_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'mowfni_corporate_comment_count', 0);
function mowfni_corporate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
function mowfni_corporate_enqueue_scripts()
{
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), true);
    wp_enqueue_script('plugin-script', get_template_directory_uri() . '/js/plugins.js', array(), true);
}
add_action('wp_enqueue_scripts', 'mowfni_corporate_enqueue_scripts');
// Our custom post type function
function create_posttype() {
 
    register_post_type( 'volunteer_opp',
    // custom post type options
        array(
            'labels' => array(
                'name' => __( 'Volunteer Opportunities' ),
                'singular_name' => __( 'Volunteer Opportunity' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'volunteer-opportunities'),
            'show_in_rest' => true, 
        )
    );
    register_post_type( 'corporate_partner',
    // custom post type options
        array(
            'labels' => array(
                'name' => __( 'Corporate Partners' ),
                'singular_name' => __( 'Corporate Partner' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'corporate-partners'),
            'show_in_rest' => true, 
        )
    );
    register_post_type( 'corporate_events',
    // custom post type options
        array(
            'labels' => array(
                'name' => __( 'Corporate Events' ),
                'singular_name' => __( 'Corporate Event' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'corporate-events'),
            'show_in_rest' => true, 
        )
    );
}
add_action( 'init', 'create_posttype' );
function reg_tag() {
    register_taxonomy_for_object_type('post_tag', 'volunteer_opp');
    register_taxonomy_for_object_type('post_tag', 'corporate_partner');
    register_taxonomy_for_object_type('post_tag', 'corporate_events');

}
add_action('init', 'reg_tag');