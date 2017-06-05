<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_reperage_form',    'get_email_from_reperage_form'   );
add_action( 'admin_post_reperage_form',  'get_email_from_reperage_form' );


function reperage_fields(){
  return [

        'formation_artiste' => 'Formation - Artiste',
        'commentaires' => 'Description',
     //   'reperage_date' => 'Date',
        'lien_1' => 'Lien 1 (site web, youtube etc.)',
        'lien_2' => 'Lien 2',
        'lien_3' => 'Lien 3',
        'style' => 'Style de musique',
        'origine' => 'origine',
        'numbre' => 'Nombre de musiciens',
        'contact' => 'Contact',
        'tel_1' => 'Téléphone 1',
        'tel_2' => 'Téléphone 2',
        'email' => 'Email',
        'adresse' => 'Adresse',
        'postcode' => 'Code postal',
        'city' => 'Ville',
        'country' => 'Pays'

     ];
}


//  ADD reperage FORM AS A SHORTCODE
add_shortcode( 'reperage_form',  'reperage_form_shortcode' );
function reperage_form_shortcode($atts , $content = null) {


    $fields = reperage_fields();

  if (isset($_GET['reperage_id'])) {
    // EDITING AN EXISTING REPERAGE
    $reperage_id = $_GET['reperage_id'] ;
    $reperage = get_post( $reperage_id );

  } else {
    // CREATING A NEW REPERAGE
    $reperage = false;
    $reperage_id = '';
  }


  $rp_frm = '';


  if ($reperage) {
    $rp_frm .= ' <p>Editing <strong>' .  $reperage->post_title   .'</strong></p>';
  }





  $rp_frm .= ' <form enctype="multipart/form-data" id="course_form" action="' .  esc_url( admin_url('admin-post.php') ) . '" method="post">';

  $rp_frm .= '<ul>';



  foreach ($fields as $field => $translation) :
    if ($field == 'commentaires') {
      $rp_frm .=  make_reperage_field($field, $translation,  $reperage_id, 'textarea');
    } else {
      $rp_frm .=  make_reperage_field($field, $translation,  $reperage_id);
    }

  endforeach;




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
    $formation_artiste = $_POST['formation_artiste'];


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
    if ( !empty($formation_artiste)  && $current_user_id > 0  ) {
      $post = array(
        'post_title'   => $formation_artiste,
        'post_status'  => 'publish',
        'post_type'    => 'reperage',
        'post_content' => '',
        'post_author'  =>  $current_user_id

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
        //update_field( 'artist_email', $email_of_artist,  $new_reperage  );


        $fields = reperage_fields();
        foreach ($fields as $field => $translation) :
            $$field = $_POST[$field];
            if ($$field  != '') :
             update_field( $field, $$field,  $new_reperage  );
            endif;
        endforeach;




        // if filesize of upload is greater than 0 bytes, ie it exists
        // add or replace the file already there
            // if ($artist_file['size'] > 0 ) {
            //   $file_id = jazz_add_file_upload( $artist_file, $new_reperage );
            //   update_field( 'file_upload', $file_id,  $new_reperage  );
            // }

        wp_redirect(site_url('/reperage-admin?reperage_id=' .  $new_reperage . '&success' ), $status = 302);
        //wp_redirect(  get_permalink( $new_reperage )  );

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

function make_reperage_field($attribute, $translation,  $reperage_id, $type='input') {



  if ($reperage_id) {
      $value = get_post_meta($reperage_id, $attribute, true);
  } else {
    $value = '';
  }

  if ($type == 'textarea') {


   return '<li>
  <label for="inp_'. $attribute .'">'.  $translation   .'</label>
    <textarea  id="inp_'. $attribute .'"  name="'. $attribute.'" placeholder="'. $translation.'" > '. $value .'</textarea>
  </li>';

  } else {

   return '<li>
  <label for="inp_'. $attribute .'">'.  $translation   .'</label>
    <input type="text"  id="inp_'. $attribute .'"  name="'. $attribute.'" placeholder="'. $translation.'" value="'. $value .'" />
  </li>';
  }



}



?>
