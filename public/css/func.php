<?php
if(version_compare($GLOBALS['wp_version'],'4.1-alpha','<'))
{
	require get_template_directory() . '/inc/back-compat.php';
}
if(!function_exists('theme_setup_function')) :

function theme_setup_function(){
	
	// Register Theme textdomain
	
	load_theme_textdomain('owntheme');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 825, 510, true );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
		"top" => __( "Top Menu(Main Navigation)", "owntheme" ),
		"footer" => __( "Footer Menu", "owntheme" ),
		"quick" => __( "Quick Link", "owntheme" ),
		"services" => __( "Service Menu", "owntheme" )
       
	) );
}
endif;
add_action('after_setup_theme','theme_setup_function');
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Common Sidebar', 'owntheme' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Add widgets here to appear in your page sidebar.', 'owntheme' ),
		'before_widget' => '<div class="blog-events">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '<hr></h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widgets', 'owntheme' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your Header.', 'owntheme' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'owntheme' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your Footer.', 'owntheme' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

function add_style_and_script(){
	
	wp_enqueue_style('theme-style',get_stylesheet_uri());	
  
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','add_style_and_script');
require_once get_template_directory().'/widget/theme-widgets.php';
require_once get_template_directory().'/widget/theme-option.php';



//  OTP send ON mail

function function_Otp_send(){
	$email = $_POST['email'];
	if($email){
		    $otp = rand(1111, 9999);
		    $to = $email;
			$subject = 'The CyberFrat';
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Email Verification</title>
			<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
			<style type="text/css">8
				h2{color: #000; font-size: 34px;font-weight: 400;margin-bottom: 10px;}
				strong{color: #000; font-size: 18px;font-weight: 300;margin-bottom: 15px;}
				p{color: #555555;font-size: 15px;font-weight: 300;margin-bottom: 20px;line-height: 25px;}
			</style>
			</head>
			
			<body>
				<div style="max-width:850px; margin:0 auto;">
					<div style ="display:block; position:relative; padding:25px; background-color: #f8f8f8">
						  <div style="display: block; position: relative;padding: 32px;background-color: #fff;border-radius: 10px;box-shadow: 0px 0px 10px #e2e2e2;">
						  <h1 style="text-align: center;color:#f01778"><a href="'.home_url().'"><img src="https://secureservercdn.net/160.153.138.219/259.f92.myftpupload.com/wp-content/uploads/2021/04/Cyber-Frat-Logo-1-1.png"/></a></h1>
								<div style="background-color: #f6f6f6;display:block; padding: 20px; margin: 30px 0px;border-radius: 10px; ">
									<p style="font-size: 18px;;"><strong>Dear '.$email.'</strong></p>
									
									<p style="font-size: 18px;"><b>Here Is the OTP:  </b>'.$otp.'</p>
							
								</div>
								</div>
							 
							 
						  </div>
			
					</div>
				</div>
			</body>
			</html>
			';
			
			$headers = array('Content-Type: text/html; charset=UTF-8');
			wp_mail( $to, $subject, $body, $headers );
			$cookie_name = "otp";
			$cookie_value = $otp;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			$cookie_name2 = "email";
			$cookie_value2 = $email;

			setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/"); // 86400 = 1 day
			echo 'ok';
	}
    else{
		echo 'error';
	}
	die();
}
add_action( 'wp_ajax_nopriv_Otp_send', 'function_Otp_send' );
add_action( 'wp_ajax_Otp_send', 'function_Otp_send' );





function function_check_Otp_send(){
	$checkOTP = $_POST['codeBox1'].$_POST['codeBox2'].$_POST['codeBox3'].$_POST['codeBox4'];
	
	$email = $_COOKIE['email'];
	$otp = $_COOKIE['otp'];
	if($checkOTP ==  $otp){
		    $to = $email;
			$subject = 'The CyberFrat';
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Email Verification</title>
			<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
			<style type="text/css">8
				h2{color: #000; font-size: 34px;font-weight: 400;margin-bottom: 10px;}
				strong{color: #000; font-size: 18px;font-weight: 300;margin-bottom: 15px;}
				p{color: #555555;font-size: 15px;font-weight: 300;margin-bottom: 20px;line-height: 25px;}
			</style>
			</head>
			
			<body>
				<div style="max-width:850px; margin:0 auto;">
					<div style ="display:block; position:relative; padding:25px; background-color: #f8f8f8">
						  <div style="display: block; position: relative;padding: 32px;background-color: #fff;border-radius: 10px;box-shadow: 0px 0px 10px #e2e2e2;">
						  <h1 style="text-align: center;color:#000"><a href="'.home_url().'"><img src="https://secureservercdn.net/160.153.138.219/259.f92.myftpupload.com/wp-content/uploads/2021/04/Cyber-Frat-Logo-1-1.png"/></a></h1>
								<div style="background-color: #f6f6f6;display:block; padding: 20px; margin: 30px 0px;border-radius: 10px; ">
									<p style="font-size: 18px;color:"><strong>WELCOME TO CYBERFRAT</strong></p>
									<p style="font-size: 18px;">By subscribing to CyberFrat weekly newsletter, you have taken a step ahead towards gaining more knowledge in cybersecurity, risk management, and emerging technologies domain.<br><br>

                                    You are now entitled to the following benefits:
                                    
                                    1. Interact with CXOs via virtual and F2F meets.
                                    2. You will be added to Google groups from where you will be receiving the 
                                    emails about upcoming events and webinar invites.
                                    3. Learn from the SMEs over engaging webinars on emerging technologies, cybersecurity trends, and risk management.<br><br>
                                    
                                    Don not forget to save 8927002700 in your contact list to receive program details and a reminder on WhatsApp.<br><br>
                                    
                                    To know about the upcoming events, visit <a href="https://cyberfrat.com/events/">www.cyberfrat.com/event/</a></p>
							
								</div>
								</div>
							 
							 
						  </div>
			
					</div>
				</div>
			</body>
			</html>
			';
			
			$headers = array('Content-Type: text/html; charset=UTF-8');
			wp_mail( $to, $subject, $body, $headers );
			$cookie_name = "subscribed";
			$cookie_value = $email;
			

			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			echo 'ok';
	}
    else{
		echo 'error';
	}
	die();
}
add_action( 'wp_ajax_nopriv_check_Otp_send', 'function_check_Otp_send' );
add_action( 'wp_ajax_check_Otp_send', 'function_check_Otp_send' );



// Modify comments header text in comments
add_filter( 'genesis_title_comments', 'child_title_comments');
function child_title_comments() {
    return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
}
 
// Unset URL from comment form
function crunchify_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); 
 
// Add placeholder for Name and Email
function modify_comment_form_fields($fields){
    $fields['author'] = '<p class="comment-form-author">' . '<input id="author" placeholder="Your Name (No Keywords)" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email">' . '<input id="email" placeholder="your-real-email@example.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>';
    $fields['url'] = '<p class="comment-form-url">' .
             '<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';
    
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');


function search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
	  if ($query->is_search) {
		$query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
		$query->set('posts_per_page',2);
	  }
	}
  }

   //  Custom post type pagination function 
	
   function cpt_pagination($pages = '', $range = 4)
   {
	   $showitems = ($range * 2)+1;
	   global $paged;
	   if(empty($paged)) $paged = 1;
	   if($pages == '')
	   {
		   global $wp_query;
		   $pages = $wp_query->max_num_pages;
		   if(!$pages)
		   {
			   $pages = 1;
		   }
	   }
	   if(1 != $pages)
	   {
		   echo "<nav aria-label='Page navigation example'>  <ul class='pagination'> <span>Page ".$paged." of ".$pages."</span>";
		   if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		   if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		   for ($i=1; $i <= $pages; $i++)
		   {
			   if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			   {
				   echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
			   }
		   }
		   if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\"><i class='fa fa-angle-left'></i></a></li>";
		   if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='fa fa-angle-right'></i></a></li>";
		   echo "</ul></nav>\n";
	   }
 }
function tn_excerpt_more( $more ) {

return sprintf( '...');
}
add_filter('excerpt_more', 'tn_excerpt_more' );