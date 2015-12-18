<?php
/**
 * @package Astoned
 * Theme Functions
 */


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 384;

add_action( 'after_setup_theme', 'astoned_theme_setup' );

if ( ! function_exists( 'astoned_theme_setup' ) ):
function astoned_theme_setup() {
    $default_background_color='#ffffff';

    load_theme_textdomain( 'astoned', get_template_directory() . '/languages' );

	
	add_editor_style();

 // Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'astoned' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
        
        // Add support for custom backgrounds.
	add_theme_support( 'custom-background', array(
		
		'default-color' => $default_background_color,
	) );

	
        add_theme_support( 'post-thumbnails' );
       
        

}
endif; 



function astoned_scripts(){
    
    wp_enqueue_style( 'astoned', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'astoned_scripts' );

function astoned_init_sidebar() {

	

	register_sidebar( array(
		 'name' => __( 'Top', 'astoned' ),
		'description'   => __( 'Sidebar Description', 'text_astoned' ),
                'id' => 'sidebar-1',
		'before_widget' => '<div class="side1">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
}
add_action( 'widgets_init', 'astoned_init_sidebar' );

function astoned_post_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'astoned' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'astoned' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
        <li <?php comment_class() ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'astoned' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'astoned' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'astoned' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'astoned' ); ?></em>
					<br />
				<?php endif; ?>
                                        
                                        <div class="comment-text"><?php comment_text(); ?></div>
                                        
                                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'astoned' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			</footer>

			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

add_action( 'wp_enqueue_scripts', 'astoned_myscript_enqueue' );

//Initialize Jquery
function astoned_myscript_enqueue() {
  
   
  if ( is_singular() ) {
       wp_enqueue_script( "comment-reply" ); 
  }
  
  }
  
  

//Setup the pagination
 function astoned_paging_nav() {

	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode(get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$page_links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'astoned' ),
		'next_text' => __( 'Next &rarr;', 'astoned' ),
	) );

	if ( $page_links ) :

	?>


<nav class="paging-nav" role="navigation">
		
		<div class="pagination-links">
			<?php echo $page_links; ?>
		</div>
	</nav>
	
	<?php
	endif;
}

require( get_template_directory() . '/inc/header-customize.php' );


function astoned_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'astoned' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'astoned_wp_title', 10, 2 );

function astoned_date_time(){
    $update_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $update_time_string,
		
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', '_s' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
	echo $posted_on;
}

 