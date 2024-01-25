<?php 



if ( function_exists('register_sidebar') ) {



	register_sidebar(array('name'=>'Sidebar'));



};

register_sidebar(array(
    'name' => 'Footer - copyright',
    'id' => 'footer-copyright',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<span style="display: none;">',
    'after_title' => '</span>',
));

register_sidebar(array(
    'name' => 'Main - menu',
    'id' => 'main-menu',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<span style="display: none;">',
    'after_title' => '</span>',
));
//
//register_sidebar(array(
//    'name' => 'Footer - adresa',
//    'id' => 'footer-address',
//    'before_widget' => '',
//    'after_widget' => '',
//    'before_title' => '<span style="display: none;">',
//    'after_title' => '</span>',
//));

register_sidebar(array(
    'name' => 'Footer - sociální sítě',
    'id' => 'footer-social',
    'before_widget' => '<div class="social">',
    'after_widget' => '</div>',
    'before_title' => '<span style="display: none;">',
    'after_title' => '</span>',
));


//register_sidebar(array(
//    'name' => 'Hlavička - GA atd.',
//    'id' => 'special-head',
//    'before_widget' => '',
//    'after_widget' => '',
//    'before_title' => '',
//    'after_title' => '',
//));







add_theme_support('post-thumbnails'); 



add_action( 'cmb2_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {                
        
        $hpHeadline = new_cmb2_box( array(
		'id'           => 'hpheadline',
		'title'        => __( 'Homepage - hlavička', 'cmb2' ),
		'object_types' => array( 'page', ),
                'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' )
	) );
        
        $hpHeadline->add_field(array(
            'name' => 'Titulek',
            'id' => 'hpheadlinetitle',
            'type' => 'text',            
        ));        
        
        $hpHeadline->add_field(array(
            'name' => 'Text',
            'id' => 'hpheadlinetext',
            'type' => 'textarea',            
        ));
        
        $hpMain = new_cmb2_box( array(
		'id'           => 'hpmain',
		'title'        => __( 'Homepage - hlavní info', 'cmb2' ),
		'object_types' => array( 'page', ),
                'show_on'      => array( 'key' => 'page-template', 'value' => 'template-homepage.php' )
	) );
        
        $hpMain->add_field(array(
            'name' => 'Text vlevo',
            'id' => 'hpmainleft',
            'type' => 'textarea',            
        ));
        
        $hpMain->add_field(array(
            'name' => 'Text vpravo',
            'id' => 'hpmainright',
            'type' => 'textarea',            
        ));
        
        $hpMain->add_field(array(
            'name' => 'Text linku',
            'id' => 'hpmainlinktext',
            'type' => 'text',            
        ));
        
        $hpMain->add_field(array(
            'name' => 'Link',
            'id' => 'hpmainlink',
            'type' => 'text',            
        ));
        
        $contact = new_cmb2_box( array(
		'id'           => 'contact',
		'title'        => __( 'Kontaktní údaje', 'cmb2' ),
		'object_types' => array( 'page', ),
                'show_on'      => array( 'key' => 'page-template', 'value' => 'template-contact.php' )
	));
        
        $contact->add_field(array(
            'name' => 'Telefon',
            'id' => 'phone',
            'type' => 'text',            
        ));
        
        $contact->add_field(array(
            'name' => 'Fax',
            'id' => 'fax',
            'type' => 'text',            
        ));
        
        $contact->add_field(array(
            'name' => 'Email',
            'id' => 'email',
            'type' => 'text',            
        ));
        
        $contact->add_field(array(
            'name' => 'Adresa',
            'id' => 'address',
            'type' => 'textarea',            
        ));
        
        $about = new_cmb2_box( array(
            'id'           => 'about',
            'title'        => __( 'Společnost', 'cmb2' ),
            'object_types' => array( 'page', ),
            'show_on'      => array( 'key' => 'page-template', 'value' => 'template-about.php' )
	) );
           
        $about->add_field(array(
            'name' => 'Společnost - titulek',
            'id' => 'abouttitle',
            'type' => 'text',            
        ));
        
        $about->add_field(array(
            'name' => 'Společnost - text',
            'id' => 'abouttext',
            'type' => 'textarea',            
        ));
        
        $team = new_cmb2_box( array(
            'id'           => 'team',
            'title'        => __( 'Tým', 'cmb2' ),
            'object_types' => array( 'page', ),
            'show_on'      => array( 'key' => 'page-template', 'value' => 'template-about.php' )
	) );
        
        $team->add_field(array(
            'name' => 'Položky',
            'id' => 'teamitems',
            'type' => 'group',
            'options' => array(
                'sortable' => true
            ),
            'fields' =>
                array (
                    array(
                        'name' => __('Jméno', 'menu'),
                        'id' => 'teamitemname',
                        'type' => 'text'
                    ),
                    array(
                        'name' => __('Pozice', 'menu'),
                        'id' => 'teamitempos',
                        'type' => 'text'
                    ),
                    array(
                        'name' => __('Fotka', 'menu'),
                        'id' => 'teamitemimage',
                        'type' => 'file'
                    ),
                    array(
                        'name' => __('Text', 'menu'),
                        'id' => 'teamitemtext',
                        'type' => 'textarea'
                    ),
                )
        ));
        
        
}

function getMyTime() {
    
    
    
    global $wpdb;
    $mytime = $wpdb->get_results( "SELECT option_value FROM hk_options WHERE option_name = 'post_datetime'" );
    $mytimeArray = get_object_vars($mytime[0]);
    $mytimeTarget = $mytimeArray["option_value"];
    return $mytimeTarget;
}

function setMyTime() {
    global $wpdb;
    $wpdb->update( 
	'hk_options', 
	array( 
		'option_value' => strtotime("now"),	// string
	), 
	array( 'option_name' => "post_datetime" )
    );
}

function custom_excerpt_length( $length ) {
return 32;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


if ( ! is_admin() ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}

function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
  
}
add_action( 'admin_menu', 'remove_menus' );
