<?php
function shkolla_digjitale_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('shkolladigjitale_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.0', 'all');
    wp_enqueue_style('shkolladigjitale_style', get_template_directory_uri() . '/style.css', array('shkolladigjitale_bootstrap_css'), $version, 'all');
}
add_action('wp_enqueue_scripts', 'Shkolla_digjitale_register_styles');

function shkolladigjitale_register_scripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('shkolladigjitale_bootstrap_js', get_template_directory_uri() . 'assets/js/bootstrap.min.js');
    wp_enqueue_script('shkolladigjitale_scripts', get_template_directory_uri() . '/assets/js/script.js', array('shkolladigjitale_bootstrap_js'), '5.0.0', true);
}
add_action('wp_enqueue_scripts', 'shkolladigjitale_register_scripts');

function shkolla_digjitale_register_style()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('shkolladigjitale_style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
    //wp_enqueue_script($haddle $src $dept $vesion $in_footer);
}

//aktivizimi i style.css
add_action('wp_enqueue_style', 'shkolla_digjitale_register_style');

// Custom Callback

function your_theme_slug_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <div class="comment-wrap">
            <div class="comment-img">
                <?php echo get_avatar($comment, $args['avatar_size'], null, null, array('class' => array('img-responsive', 'img-circle'))); ?>
            </div>
            <div class="comment-body">
                <h4 class="comment-author"><?php echo get_comment_author_link(); ?></h4>
                <span class="comment-date"><?php printf(__('%1$s at %2$s', 'your-text-domain'), get_comment_date(),  get_comment_time()) ?></span>
                <?php if ($comment->comment_approved == '0') { ?><em><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                        <?php _e('Comment awaiting approval', 'your-text-domain'); ?></em><br /><?php } ?>
                <?php comment_text(); ?>
                <span class="comment-reply">
                    <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'your-text-domain'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?></span>
            </div>
        </div>
    <?php }

// Enqueue comment-reply

add_action('wp_enqueue_scripts', 'your_theme_slug_public_scripts');

function your_theme_slug_public_scripts()
{
    if (!is_admin()) {
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Enqueue fontawesome

add_action('wp_enqueue_scripts', 'your_theme_slug_public_styles');

function your_theme_slug_public_styles()
{
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
}


function shkolladigjital_widget()
{
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
        'name' => 'SidebarArea',
        'id' => 'sidebar-1',
        'description' => '...'
    ));
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '<ul class="Social-list list-inline py-3 mx_auto" ',
        'after_widget' => '</ul>',
        'name' => 'sidebarFooter',
        'id' => 'sidebar-2',
        'description' => 'Sidebar for Footer'
    ));
    register_sidebar(array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
        'name' => 'SidebarArea',
        'id' => 'ads',
        'description' => '...'
    ));
}
add_action('widgets_init', 'shkolladigjital_widget');



function custom_post_type_programing()
{

    $labels = array(
        'name'                => _x('Programing Post', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('Programing Post', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('Programing Post', 'twentytwenty'),
        'parent_item_colon'   => __('Parent Programing Post', 'twentytwenty'),
        'all_items'           => __('All Programing Post', 'twentytwenty'),
        'view_item'           => __('View Programing Post', 'twentytwenty'),
        'add_new_item'        => __('Add New Programing Post', 'twentytwenty'),
        'add_new'             => __('Add New', 'twentytwenty'),
        'edit_item'           => __('Edit Programing Post', 'twentytwenty'),
        'update_item'         => __('Update Programing Post', 'twentytwenty'),
        'search_items'        => __('Search Programing Post', 'twentytwenty'),
        'not_found'           => __('Not Found', 'twentytwenty'),
        'not_found_in_trash'  => __('Not found in Trash', 'twentytwenty'),
    );
    $args = array(
        'label'               => __('programing', 'twentytwenty'),
        'description'         => __('Programing Post news and reviews', 'twentytwenty'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true, 

    );
    register_post_type('programing', $args);
}
add_action('init', 'custom_post_type_programing', 0);


function custom_post_type_Technology()
{
    $labels = array(
        'name'                => _x('Technology Post', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('Technology Post ', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('Technology Post ', 'twentytwenty'),
        'parent_item_colon'   => __('Parent Technology Post ', 'twentytwenty'),
        'all_items'           => __('All Technology Post ', 'twentytwenty'),
        'view_item'           => __('View Technology Post ', 'twentytwenty'),
        'add_new_item'        => __('Add New Technology Post ', 'twentytwenty'),
        'add_new'             => __('Add New', 'twentytwenty'),
        'edit_item'           => __('Edit Technology Post ', 'twentytwenty'),
        'update_item'         => __('Update Technology Post ', 'twentytwenty'),
        'search_items'        => __('Search Technology Post ', 'twentytwenty'),
        'not_found'           => __('Not Found', 'twentytwenty'),
        'not_found_in_trash'  => __('Not found in Trash', 'twentytwenty'),
    );
    $args = array(
        'label'               => __('technology', 'twentytwenty'),
        'description'         => __('Movie news and reviews', 'twentytwenty'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );
    register_post_type('technology', $args);
}
add_action('init', 'custom_post_type_Technology', 0);


?>