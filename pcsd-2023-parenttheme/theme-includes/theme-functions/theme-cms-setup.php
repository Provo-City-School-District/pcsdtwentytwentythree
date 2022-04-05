<?php
// Enable Featured Images
add_theme_support( 'post-thumbnails' );
// puts a note on each dashboard page to let content managers how to contact us.
function pcsd_change_admin_footer(){
	 echo '<span id="footer-note">For any questions don\'t hesitate to contact the District Web Team Rob Francom(robertf@provo.edu), and Josh Espinoza(joshe@provo.edu).</span>';
}
add_filter('admin_footer_text', 'pcsd_change_admin_footer');

//Tracks User Last Login
//Log the date when a user logs in
function user_last_login( $user_login, $user ) {
    update_user_meta( $user->ID, 'last_login', current_time('M j, Y h:i a') );
}
add_action( 'wp_login', 'user_last_login', 10, 2 );

//display the time the user logged in on the users screen in the dashboard
function new_modify_user_table( $column ) {
    $column['lastLogin'] = 'Last Login';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'lastLogin' :
            return get_the_author_meta( 'last_login', $user_id );
            break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

// Restrict File types allowed to upload ---------------------------------------------------------------
/*
sources used
  https://wordpress.stackexchange.com/questions/44777/upload-mimes-filter-has-no-effect
  https://bootstrapcreative.com/restrict-certain-file-mime-types-in-wordpress/
  https://wordpress.stackexchange.com/questions/359862/restrict-image-uploads-to-a-certain-file-type
Full list of mime types
  https://codex.wordpress.org/Uploading_Files
  https://www.sitepoint.com/mime-types-complete-list/
*/
add_filter( 'upload_mimes', 'theme_allowed_mime_types' );
function theme_allowed_mime_types( $mime_types ) {
    $mime_types = array(
        //document types
        'pdf' => 'application/pdf',
        'xls|xlsx' => 'application/excel',
        //image types
        'jpg|jpeg' => 'image/jpeg',
        'png' => 'image/png',
        //Video/Audio
        'mp3' => 'audio/mpeg3',
        'mp4|m4v' => 'video/mpeg'
    );
    return $mime_types;
}
?>
