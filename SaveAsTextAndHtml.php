<?php
/*
Plugin Name: Save As Text and Html
Plugin URI: http://www.openasthra.com/opensource/save-as-text-and-html
Description: Saves post as text and html
Author: Rajulu Ponnada
Version: 1.0
Author URI: http://www.openasthra.com
*/

function oa_save_as_text($oa_buttontext = '', $oa_print_button = true ) {
// print a nice button

	if ( empty( $oa_buttontext ) )
		$oa_buttontext = '<img src="' . get_bloginfo('home') . '/wp-content/plugins/SaveAsTextAndHtml/txtb.gif" alt="Save as Text" />';
      else
		$oa_buttontext = '<img src="' . get_bloginfo('home') . '/wp-content/plugins/SaveAsTextAndHtml/txt.gif" alt="Save as Text" />' . $oa_buttontext;
	
	$oa_x = !strpos( $_SERVER['REQUEST_URI'], '?') ? '?' : '&amp;';
	$oa_txt_button = '<a href="' . $_SERVER['REQUEST_URI'] . $oa_x . 'output=txt">' . $oa_buttontext . '</a>';
	
	if ( $oa_print_button === true ) {
		echo $oa_txt_button;
	} else {
		return $oa_txt_button;
	}
}

function oa_save_as_html($oa_buttontext = '', $oa_print_button = true ) {
// print a nice button

	if ( empty( $oa_buttontext ) )
		$oa_buttontext = '<img src="' . get_bloginfo('home') . '/wp-content/plugins/SaveAsTextAndHtml/htmlb.jpg" alt="Save as Html" />';
      else
		$oa_buttontext = '<img src="' . get_bloginfo('home') . '/wp-content/plugins/SaveAsTextAndHtml/html.jpg" alt="Save as Html" />' . $oa_buttontext;
	
	$oa_x = !strpos( $_SERVER['REQUEST_URI'], '?') ? '?' : '&amp;';
	$oa_txt_button = '<a href="' . $_SERVER['REQUEST_URI'] . $oa_x . 'output=html">' . $oa_buttontext . '</a>';
	
	if ( $oa_print_button === true ) {
		echo $oa_txt_button;
	} else {
		return $oa_txt_button;
	}
}

function i_denude($variable) 
{
  return(eregi_replace( "<br>", "\n", $variable)); 
} 

function i_denudef($variable)
{ 
  return(eregi_replace("<[^>]*>", "", $variable));
} 

function oa_exec() {
  if ( $_GET['output'] == 'txt' ) {
    $req = $_SERVER['REQUEST_URI'];
    $my_id = url_to_postid($req);

    $xa_post = get_post($my_id); 
    $value = "Post Title: " . $xa_post->post_title . "\n";
    $value .= $xa_post->post_content;
    $value .= "\n\nThis page generation was powered by www.openasthra.com \n"; 
    $value .= date ("m.j.Y h:ia \E\S\T");  
    $value .= "\n"; 

    $PHPrint = ("$value"); 
    $PHPrint = i_denude("$PHPrint"); 
    $PHPrint = i_denudef("$PHPrint");
    $PHPrint = str_replace( "</font>", "", $PHPrint ); 
    $PHPrint = stripslashes("$PHPrint"); 

    $title = $xa_post->post_name;
    $length = strlen($PHPrint);

    header ("Content-Type: text/plain"); 
    header ("Content-Length: {$length}"); 
    header ("Content-Disposition: attachment;filename={$title}.txt");

    echo $PHPrint; 
  }
  else if ( $_GET['output'] == 'html' ) 
  {
    $req = $_SERVER['REQUEST_URI'];
    $my_id = url_to_postid($req);
    $xa_post = get_post($my_id); 
    $value = "<html><head></head><body><b>Post Title: " . $xa_post->post_title . "</b><br />";
    $value .= $xa_post->post_content;
    $value .= "<br /><br />This page generation was powered by www.openasthra.com </a><br />"; 
    $value .= date ("m.j.Y h:ia \E\S\T");  
    $value .= "<br /></body></html>"; 

    $PHPrint = ("$value"); 

    $title = $xa_post->post_name;
    $length = strlen($PHPrint);

    header ("Content-Type: text/html"); 
    header ("Content-Length: {$length}"); 
    header ("Content-Disposition: attachment;filename={$title}.html");

    echo $PHPrint; 
  }
}

add_action('template_redirect', 'oa_exec');

?>