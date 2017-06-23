<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_reperage_form',    'get_email_from_reperage_form'   );
add_action( 'admin_post_reperage_form',  'get_email_from_reperage_form' );

add_action( 'admin_post_nopriv_delete_reperage_form',    'delete_reperage_from_form'   );
add_action( 'admin_post_delete_reperage_form',  'delete_reperage_from_form' );


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
        'adresse' => 'Adresse'
        // 'postcode' => 'Code postal',
        // 'city' => 'Ville',
        // 'country' => 'Pays'

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



  // CONFIRM  TO DELETE REPERAGE
  if (isset($_GET['delete_reperage'])) {
    $rp_frm .= ' <form  id="delete_course_form" action="' .  esc_url( admin_url('admin-post.php') ) . '" method="post">';
    $rp_frm .= '<p>Êtes-vous sûr de vouloir supprimer ce repérage?</p>';
    $rp_frm .= '<input type="hidden" name="reperage_id" value="'. $reperage_id  .'">';
    $rp_frm .= '<input type="hidden" name="action" value="delete_reperage_form">';
    $rp_frm .= '<input type="submit" id="submit_delete_course_form" value="Suprimer">';
    $rp_frm .= '</form>';
  };

  // MESSAGE TO SAY DELETE WAS SUCCESFUL
  if (isset($_GET['supprime'])) {
    $rp_frm .= '<div class="container"> <div class="col-sm-12 black" style="padding: 25px 35px 25px;     text-align: center;     margin-bottom: 30px;">';
    $rp_frm .= ' <h2>Le repérage a bien été supprimé</h2>';
    $rp_frm .= '</div></div>';
  };


  if ($reperage) {
    $rp_frm .= '<div class="container"> <div class="col-sm-12 black" style="padding: 25px 35px 25px;     text-align: center;     margin-bottom: 30px;">';
    $rp_frm .= ' <h2>Modifier le repérage: <strong>' .  $reperage->post_title   .'</strong></h2>';
    $rp_frm .= '</div></div>';
  }





  $rp_frm .= ' <form enctype="multipart/form-data" id="course_form" action="' .  esc_url( admin_url('admin-post.php') ) . '" method="post">';

$rp_frm .= '<div class="container ">';
  $rp_frm .= '<div class="reperage_box stripes">';
  $rp_frm .= '<div class="row white">';
  $rp_frm .= '<h3 style="padding-left:15px;"><i class="fa fa-info" aria-hidden="true"></i> Informations Générales</h3>';

    $rp_frm .= '<div class="col-sm-8">';
      $rp_frm .=  make_reperage_field('formation_artiste', 'Formation - Artiste',  $reperage_id, 'input');
      $rp_frm .=  make_reperage_field('commentaires', 'Description',  $reperage_id, 'textarea');
    $rp_frm .= '</div>';

    $rp_frm .= '<div class="col-sm-4">';
      $rp_frm .=  make_reperage_field('style', 'Style de musique',  $reperage_id, 'input');
      $rp_frm .=  make_reperage_field('origine', 'Origine',  $reperage_id, 'input');
      $rp_frm .=  make_reperage_field('numbre', 'Nombre de musiciens',  $reperage_id, 'input');
    $rp_frm .= '</div>';

  $rp_frm .= '</div>';
  $rp_frm .= '</div>';

  $rp_frm .= '<div class="reperage_box stripes">';
  $rp_frm .= '<div class="row white">';
  $rp_frm .= '<h3 style="padding-left:15px;"><i class="fa fa-link" aria-hidden="true"></i> Sites web</h3>';

    $rp_frm .= '<div class="col-sm-4">';
      $rp_frm .=  make_reperage_field('lien_1', 'Lien (site web, youtube ou autre)',  $reperage_id, 'input');
    $rp_frm .= '</div>';
    $rp_frm .= '<div class="col-sm-4">';
      $rp_frm .=  make_reperage_field('lien_2', 'Lien 2',  $reperage_id, 'input');
      $rp_frm .= '</div>';
    $rp_frm .= '<div class="col-sm-4">';
      $rp_frm .=  make_reperage_field('lien_3', 'Lien 3',  $reperage_id, 'input');
    $rp_frm .= '</div>';

  $rp_frm .= '</div>';
  $rp_frm .= '</div>';

  $rp_frm .= '<div class="reperage_box stripes">';
  $rp_frm .= '<div class="row white">';
  $rp_frm .= '<h3 style="padding-left:15px;"><i class="fa fa-user" aria-hidden="true"></i> Contact</h3>';

    $rp_frm .= '<div class="col-sm-12">';
      $rp_frm .=  make_reperage_field('contact', 'Personne de contact',  $reperage_id, 'input');
    $rp_frm .= '</div>';

    $rp_frm .= '<div class="col-sm-6">';
      $rp_frm .=  make_reperage_field('tel_1', 'Téléphone 1',  $reperage_id, 'input');
    $rp_frm .= '</div>';
    $rp_frm .= '<div class="col-sm-6">';
      $rp_frm .=  make_reperage_field('tel_2', 'Téléphone 2',  $reperage_id, 'input');
    $rp_frm .= '</div>';


    $rp_frm .= '<div class="col-sm-6">';
      $rp_frm .=  make_reperage_field('email', 'Email',  $reperage_id, 'input');
    $rp_frm .= '</div>';
    $rp_frm .= '<div class="col-sm-6">';
      $rp_frm .=  make_reperage_field('adresse', 'Adresse',  $reperage_id, 'input');
    $rp_frm .= '</div>';

  $rp_frm .= '</div>';
$rp_frm .= '</div>';

  // foreach ($fields as $field => $translation) :
  //   if ($field == 'commentaires') {
  //     $rp_frm .=  make_reperage_field($field, $translation,  $reperage_id, 'textarea');
  //   } else {
  //     $rp_frm .=  make_reperage_field($field, $translation,  $reperage_id);
  //   }

  // endforeach;




  $rp_frm .= '<input type="hidden" name="reperage_id" value="'. $reperage_id  .'">';
  $rp_frm .= '<input type="hidden" name="action" value="reperage_form">';




  $rp_frm .= '<div class="row"><div class="col-sm-9"><input type="submit" id="submit_course_form" value="Envoyer"></div>';

    if ($reperage) :
      $rp_frm .= '<div class="col-sm-3"><a href="?reperage_id='. $reperage_id .'&delete_reperage=true" class="delete_reperage">Delete</a></div>';
  endif;

    $rp_frm .= '</div></form>';


  // HIDDEN ACTION INPUT IS REQUIRED TO POST THE DATA TO THE CORRECT PLACE

  return  $rp_frm;


}



function delete_reperage_from_form(){
  // IF DATA HAS BEEN POSTED
  if ( isset($_POST['action'])  && $_POST['action'] == 'delete_reperage_form'   ) {

    $reperage_id = $_POST['reperage_id'];
    $current_user_id = get_current_user_id();

    // does the reperage already exist and is the current user the owner
    $reperage_exists = ($reperage_id && $reperage_id != '' && intval($reperage_id) > 0 );
    if (  $reperage_exists   ) {
      $reperage = get_post( $reperage_id );
      if (intval($reperage->post_author) != $current_user_id  ) {
        wp_redirect(site_url('/reperage-admin?notallowed'), $status = 302);
        exit;
      } else {

        // delete the reperage;
        wp_trash_post( $reperage_id ); //KEEP IN TRASH
        wp_redirect(site_url('/reperage-admin?supprime'), $status = 302);

      }
    } else {
        wp_redirect(site_url('/reperage-admin?notallowed'), $status = 302);
        exit;
    }





  }; //endof if data posted

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


   return '
  <label for="inp_'. $attribute .'">'.  $translation   .'</label>
    <textarea  id="inp_'. $attribute .'"  name="'. $attribute.'"> '. $value .'</textarea>
  ';

  } else {

   return '
  <label for="inp_'. $attribute .'">'.  $translation   .'</label>
    <input type="text"  id="inp_'. $attribute .'"  name="'. $attribute.'"  value="'. $value .'" />
  ';
  }



}



?>
