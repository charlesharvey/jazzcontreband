<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_reperage_form',    'get_email_from_reperage_form'   );
add_action( 'admin_post_reperage_form',  'get_email_from_reperage_form' );



//  ADD reperage FORM AS A SHORTCODE
add_shortcode( 'reperage_form',  'reperage_form_shortcode' );
function reperage_form_shortcode($atts , $content = null) {





  if (isset($_GET['reperage_id'])) {
    // EDITING AN EXISTING REPERAGE
    $reperage_id = $_GET['reperage_id'] ;
    $reperage = get_post( $reperage_id );



    $name_of_artist = $reperage->post_title;
    $email_of_artist = get_post_meta( $reperage_id, 'artist_email', true);
    $description = $reperage->post_content;
    $artist_file = '';
  } else {
    // CREATING A NEW REPERAGE
    $reperage = false;
    $reperage_id = '';
    $name_of_artist = '';
    $email_of_artist = '';
    $description = '';
    $artist_file = '';
  };



  $rp_frm = '';


  if ($reperage) {
    $rp_frm .= ' <p>Editing <a href="'. $reperage->guid  .'">' .   $reperage->post_title   .'</a></p>';
  }




  $rp_frm .= ' <form enctype="multipart/form-data" id="course_form" action="' .  esc_url( admin_url('admin-post.php') ) . '" method="post">';

  $rp_frm .= '<ul>';


  $rp_frm .= '<li><input type="text" name="name_of_artist"  placeholder="name of artist" value="'. $name_of_artist .'" /></li>';
  $rp_frm .= '<li><textarea  name="description"  placeholder="description">'. $description .'</textarea></li>';
  $rp_frm .= '<li><input type="text" name="email_of_artist"  placeholder="email of artist" value="'. $email_of_artist .'" /></li>';
  $rp_frm .= '<li><input type="file" name="artist_file"  placeholder="file" value="'. $artist_file .'" /></li>';

  $rp_frm .= '<input type="hidden" name="reperage_id" value="'. $reperage_id  .'">';
  $rp_frm .= '<input type="hidden" name="action" value="reperage_form">';
  $rp_frm .= '<input type="submit" id="submit_course_form" value="Envoyer">';
  $rp_frm .= '</ul>';
  $rp_frm .= '</form>';


  // HIDDEN ACTION INPUT IS REQUIRED TO POST THE DATA TO THE CORRECT PLACE

  return  $rp_frm;


}




function get_email_from_reperage_form () {

  // IF DATA HAS BEEN POSTED
  if ( isset($_POST['action'])  && $_POST['action'] == 'reperage_form'   ) {


    $reperage_id = $_POST['reperage_id'];
    $name_of_artist = $_POST['name_of_artist'];
    $description = $_POST['description'];
    $email_of_artist = $_POST['email_of_artist'];
    $artist_file = $_FILES['artist_file'];

    $current_user_id = get_current_user_id();

    // does the reperage already exist
    $reperage_exists = ($reperage_id && $reperage_id != '' && intval($reperage_id) > 0 );


    // if editing an old reperage but the user is not the owner of the post_tag
    // prevent them from doing so
    if (  $reperage_exists   ) {
      $reperage = get_post( $reperage_id );
      if (intval($reperage->post_author) != $current_user_id  ) {
        wp_redirect(site_url('/reperage-admin?notallowed'), $status = 302);
        exit;
      }
    }


    // if we  have the right data and user logged in
    if ( !empty($name_of_artist)   && !empty($description)   && !empty($email_of_artist) && $current_user_id > 0  ) {
      $post = array(
        'post_title'     => $name_of_artist,
        'post_status'    => 'publish',
        'post_type'      => 'reperage',
        'post_content'   => $description,
        'post_author' =>  $current_user_id

      );


      // update the existing post if present, not add a new one
      if ( $reperage_exists ) {
        $post['ID'] = $reperage_id;
      }

      // EDIT OR ADD NEW POST
      $new_reperage = wp_insert_post( $post );

      // IF SUCCESS
      if ($new_reperage > 0) {
        // add email to ACF
        update_field( 'artist_email', $email_of_artist,  $new_reperage  );


        // if filesize of upload is greater than 0 bytes, ie it exists
        // add or replace the file already there
        if ($artist_file['size'] > 0 ) {
          $file_id = jazz_add_file_upload( $artist_file, $new_reperage );
          update_field( 'file_upload', $file_id,  $new_reperage  );
        }


        wp_redirect(  get_permalink( $new_reperage )  );

      // something went wrong with adding the reperage post
      } else {
        wp_redirect(site_url('/reperage-admin?problem'), $status = 302);
      }

     // if we dont have all the data or user not logged in
    } else {
        wp_redirect(site_url('/reperage-admin?problem'), $status = 302);
    }

  // if the form didnt post the action field
  } else {
    wp_redirect(site_url('/reperage-admin?problem'), $status = 302);
  }


}

function jazz_add_file_upload($artist_file, $parent){
  $upload = wp_upload_bits($artist_file['name'], null, file_get_contents( $artist_file['tmp_name'] ) );
  $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
  $wp_upload_dir = wp_upload_dir();


  $attachment = array(
    'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
    'post_mime_type' => $wp_filetype['type'],
    'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
    'post_content' => '',
    'post_status' => 'inherit'
  );

  $attach_id = wp_insert_attachment( $attachment, $upload['file'], $parent );
  return $attach_id;

}



function jazz_change_upload_directory( $dirs ) {
  $dirs['subdir'] = '/reperages';
  $dirs['path'] = $dirs['basedir'] . '/reperages';
  $dirs['url'] = $dirs['baseurl'] . '/reperages';

  return $dirs;
}

//

//
//
//   add_filter( 'upload_dir', 'jazz_change_upload_directory' );
//
//   $upload_overrides = array( 'test_form' => false );
//
//   $movefile = wp_handle_upload( $artist_file, $upload_overrides );
//
//   if ( $movefile && ! isset( $movefile['error'] ) ) {
//     echo "File is valid, and was successfully uploaded.\n";
//     var_dump( $movefile );
//   } else {
//     echo $movefile['error'];
//   }
//
//   remove_filter( 'upload_dir', 'jazz_change_upload_directory' );

//



?>
