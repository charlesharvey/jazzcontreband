<?php

add_action('init', 'create_post_type_reperage');
function create_post_type_reperage()
{
  register_taxonomy_for_object_type('category', 'reperage'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'reperage');
  register_post_type('reperage', // Register Custom Post Type
  array(
    'labels' => array(
      'name' => __('Repérages', 'webfactor'), // Rename these to suit
      'singular_name' => __('Repérage', 'webfactor'),
      'add_new' => __('Ajouter', 'webfactor'),
      'add_new_item' => __('Nouveau Repérage', 'webfactor'),
      'edit' => __('Modifier', 'webfactor'),
      'edit_item' => __('Modifier Repérage', 'webfactor'),
      'new_item' => __('Nouveau Repérage', 'webfactor'),
      'view' => __('Afficher Repérage', 'webfactor'),
      'view_item' => __('Afficher Repérage', 'webfactor'),
      'search_items' => __('Chercher Repérage', 'webfactor'),
      'not_found' => __('Aucun Repérage trouvé', 'webfactor'),
      'not_found_in_trash' => __('Aucun Repérage trouvé dans la Corbeille', 'webfactor')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'exclude_from_search' => true, // remove from search engine
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'author',
      'thumbnail'
    ), // Go to Dashboard Custom webfactor Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'post_tag',
      'category'
    ) // Add Category and Post Tags support
  ));
}


add_action('init', 'create_post_type_evenement_festival');
function create_post_type_evenement_festival()
{
  register_taxonomy_for_object_type('category', 'evenement_festival'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'evenement_festival');
  register_post_type('evenement_festival', // Register Custom Post Type
  array(
    'labels' => array(
      'name' => __('Evnt festival', 'webfactor'), // Rename these to suit
      'singular_name' => __('Evenement festival', 'webfactor'),
      'add_new' => __('Ajouter', 'webfactor'),
      'add_new_item' => __('Ajouter Evenement festival', 'webfactor'),
      'edit' => __('Modifier', 'webfactor'),
      'edit_item' => __('Modifier Evenement festival', 'webfactor'),
      'new_item' => __('Nouvel Evenement festival', 'webfactor'),
      'view' => __('Afficher Evenement festival', 'webfactor'),
      'view_item' => __('Afficher Evenement festival', 'webfactor'),
      'search_items' => __('Chercher Evenement festival', 'webfactor'),
      'not_found' => __('Aucun Evenement festival trouvé', 'webfactor'),
      'not_found_in_trash' => __('Aucun Evenement festival trouvé dans la Corbeille', 'webfactor')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    ), // Go to Dashboard Custom webfactor Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'post_tag',
      'category'
    ) // Add Category and Post Tags support
  ));
}


add_action('init', 'create_post_type_evenement_saison');
function create_post_type_evenement_saison()
{
  register_taxonomy_for_object_type('category', 'evenement_saison'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'evenement_saison');
  register_post_type('evenement_saison', // Register Custom Post Type
  array(
    'labels' => array(
      'name' => __('Evnt saison', 'webfactor'), // Rename these to suit
      'singular_name' => __('Evenement saison', 'webfactor'),
      'add_new' => __('Ajouter', 'webfactor'),
      'add_new_item' => __('Ajouter Evenement saison', 'webfactor'),
      'edit' => __('Modifier', 'webfactor'),
      'edit_item' => __('Modifier Evenement saison', 'webfactor'),
      'new_item' => __('Nouvel Evenement saison', 'webfactor'),
      'view' => __('Afficher Evenement saison', 'webfactor'),
      'view_item' => __('Afficher Evenement saison', 'webfactor'),
      'search_items' => __('Chercher Evenement saison', 'webfactor'),
      'not_found' => __('Aucun Evenement saison trouvé', 'webfactor'),
      'not_found_in_trash' => __('Aucun Evenement saison trouvé dans la Corbeille', 'webfactor')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    ), // Go to Dashboard Custom webfactor Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'post_tag',
      'category'
    ) // Add Category and Post Tags support
  ));
}


add_action('init', 'create_post_type_membre');
function create_post_type_membre()
{
  register_taxonomy_for_object_type('category', 'membre'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'membre');
  register_post_type('membre', // Register Custom Post Type
  array(
    'labels' => array(
      'name' => __('Membre', 'webfactor'), // Rename these to suit
      'singular_name' => __('Membre', 'webfactor'),
      'add_new' => __('Ajouter', 'webfactor'),
      'add_new_item' => __('Ajouter Membre', 'webfactor'),
      'edit' => __('Modifier', 'webfactor'),
      'edit_item' => __('Modifier Membre', 'webfactor'),
      'new_item' => __('Nouveau Membre', 'webfactor'),
      'view' => __('Afficher Membre', 'webfactor'),
      'view_item' => __('Afficher Membre', 'webfactor'),
      'search_items' => __('Chercher Membre', 'webfactor'),
      'not_found' => __('Aucun Membre trouvé', 'webfactor'),
      'not_found_in_trash' => __('Aucun Membre trouvé dans la Corbeille', 'webfactor')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'exclude_from_search' => true, // remove from search engine
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    ), // Go to Dashboard Custom webfactor Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'post_tag',
      'category'
    ) // Add Category and Post Tags support
  ));
}



add_action('init', 'create_post_type_logo');
function create_post_type_logo()
{
  register_taxonomy_for_object_type('category', 'logo'); // Register Taxonomies for Category
  register_taxonomy_for_object_type('post_tag', 'logo');
  register_post_type('logo', // Register Custom Post Type
  array(
    'labels' => array(
      'name' => __('Logos', 'webfactor'), // Rename these to suit
      'singular_name' => __('Logo Partenaire', 'webfactor'),
      'add_new' => __('Ajouter', 'webfactor'),
      'add_new_item' => __('Ajouter Logo Partenaire', 'webfactor'),
      'edit' => __('Modifier', 'webfactor'),
      'edit_item' => __('Modifier Logo Partenaire', 'webfactor'),
      'new_item' => __('Ajouter Logo Partenaire', 'webfactor'),
      'view' => __('Afficher Logo Partenaire', 'webfactor'),
      'view_item' => __('Afficher Logo Partenaire', 'webfactor'),
      'search_items' => __('Chercher Logo Partenaire', 'webfactor'),
      'not_found' => __('Aucun Logo Partenaire trouvé', 'webfactor'),
      'not_found_in_trash' => __('Aucun Logo Partenaire trouvé dans la Corbeille', 'webfactor')
    ),
    'public' => true,
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'exclude_from_search' => true, // remove from search engine
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    ), // Go to Dashboard Custom webfactor Blank post for supports
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
      'post_tag',
      'category'
    ) // Add Category and Post Tags support
  ));
}





// LOGIN FORM SHORTCODE
add_shortcode('jazz_login' ,'jazz_shortcode_login');
function jazz_shortcode_login($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
  $members_space_page = get_page_by_path('espace-membres');
  $args = array(
    'redirect' => $members_space_page->guid,
    'echo' => false,
    'remember' => false
  );

  $ret = '';

  if (isset( $_GET['login_failed'] )) {
    $ret .= '<p style="background:red;color:white;padding:20px;margin:0 0 20px;">Log in failed. Please try again.</p>';
  } elseif  (  isset( $_GET['access_denied'] )  ) {
    $ret .= '<p style="background: #fcea1d; color: black; padding: 20px; margin: 80px 0 20px; border: solid 1px;">Veuillez vous connecter pour accéder à cette page.</p>';
  };


  $ret .=   wp_login_form( $args );

  return $ret;
}













// dont go to wp-admin when you enter wrong username/password
// redirects you back to where you came from
add_action( 'wp_login_failed', 'jazz_login_failure' );
function jazz_login_failure( $username ) {
  $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
  // if there's a valid referrer, and it's not the default log-in screen
  if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
    wp_redirect( $referrer . '?&login_failed' );  // let's append some information (login=failed) to the URL for the theme to use
    exit;
  }
}







// ADD OPTIONS PAGE
add_action('admin_menu', 'add_options_page_for_security');
function add_options_page_for_security(){
  add_options_page('Members Settings', 'Members Settings', 'manage_options' ,'members', 'options_page_for_security' );
}
function options_page_for_security(){ ?>
  <div class="wrap">
    <h1>Membres Settings</h1>
    <form method="post" action="options.php">
      <?php
      settings_fields("section");
      do_settings_sections("theme-options");
      submit_button();
      ?>
    </form>
  </div>
  <?php }; // end of function


  function display_theme_panel_fields()
  {
    add_settings_section("section", null, null, "theme-options");
    add_settings_field("secured_pages", "SecuredPages", "display_secured_pages", "theme-options", "section");
    register_setting("section", "secured_pages");
  }

  add_action("admin_init", "display_theme_panel_fields");

  // callback for custom options.php page
  function display_secured_pages(){


    $pages = get_posts(array('post_type'=> 'page' ));
    $selected_pages = get_option('secured_pages');
    echo '<select style="height:300px" multiple name="secured_pages[]" id="secured_pages">';
    foreach ($pages as $page):
      $selected = (  in_array( $page->ID, $selected_pages  )  ) ? 'selected' : '';
      echo '<option '.  $selected .' value="'. $page->ID.'">'. $page->post_title  .'</option>';
    endforeach;
    echo '</select>';
    echo '<p class="description">' . __( 'Click with cmd to select multiple pages.', 'webfactor')  .  '</p>';

  }










  // pages where you need to be logged in to see
  function jazz_secure_page(){
    return get_option('secured_pages'); // use options page to let user choose secure pages
    //return ['members-space', 'downloads', 'reperage-admin'];
  }



  // PREVENT ACCESS TO MEMBERS PAGE
  add_action('template_redirect', 'redirect_if_not_member');
  function redirect_if_not_member() {

    global $post;
    if (isset($post)){

      $page_id = $post->ID;

      $secure_pages = jazz_secure_page();


      if (  ! is_user_logged_in()   &&  (
        in_array($page_id, $secure_pages ) ||
        is_post_type_archive('reperage') ||
        is_singular( 'reperage' )


        ) ) {
          // feel free to customize the following line to suit your needs
          wp_redirect(site_url('login/?access_denied'), $status = 302);
          exit;
        }

      }
    }



    add_action('template_redirect', 'redirect_if_not_owner_of_reperage');
    function redirect_if_not_owner_of_reperage(){
      if( is_page( array( 'reperage-admin' ) ) ) {
        if ( isset($_GET['reperage_id']) ) {
          $reperage = get_post( $_GET['reperage_id']  );
          if ( $reperage === null ||   intval($reperage->post_author) != get_current_user_id() ) {
            wp_redirect(site_url('/reperage-admin?notallowed'), $status = 302);
          }
        }
      }
    }




    function current_user_made_reperage(){
      global $post;
      return (is_user_logged_in()   &&
      $post &&
      $post->post_author == get_current_user_id() );

    }


    function edit_reperage_link($id){

      echo '<a class="edit_link" href="'. site_url('reperage-admin') . '?reperage_id='.  $id .'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
    }



    // MEMBRES MAP SHORTCODE
    add_shortcode('jazz_membres_map' ,'jazz_shortcode_members_map');
    function jazz_shortcode_members_map($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
    {

      if (is_singular('membre')) { // only show the one member, if on their own page
        global $post;

        $membres = get_posts( array('post_type' => 'membre', 'include' => $post->ID, 'posts_per_page'=> 1  ) );
        $classes = 'small_map';
      } elseif (is_singular('evenement_festival') OR is_singular('evenement_saison')) {
        global $post;
        $event_id =  $post->ID;
         $membre_id =  get_field('members', $event_id);
         //$membre_id -> ID;
         $membres = get_posts( array('post_type' => 'membre', 'include' => $membre_id->ID, 'posts_per_page'=> 1  ) );
         $classes = 'small_map';
      } else { // else show all the members
        $membres = get_posts( array('post_type' => 'membre', 'posts_per_page'=> -1  ) );
        $classes = 'big_map';
      }

      $locations = [];



      foreach ($membres as $membre ) :
        $latlng = get_field('latlng', $membre->ID );
        $latlngx = explode( ',', $latlng   );
        $obj = new stdClass();
        $obj->title = $membre->post_title;
        $obj->id = $membre->ID;
        $obj->url = $membre->guid;
        $obj->blah = $latlng;

        if(is_array($latlngx) && sizeof($latlngx)==2){
          $obj->lat = $latlngx[0];
          $obj->lng = $latlngx[1];

        }


        array_push(  $locations,  $obj);
      endforeach;

      echo '<script> var $member_locations = ' . json_encode($locations) .' </script>
      <div class=" ' .  $classes .'" id="member_map_container"></div>';
    }



    function show_members($members){
      $str = '<ul class="members">';
      foreach ($members as $member) {

        // $str .= '<li>'. $member->post_title .'</li>';

      }

      $str .= '</ul>';
      return $str;

    }





    ?>
