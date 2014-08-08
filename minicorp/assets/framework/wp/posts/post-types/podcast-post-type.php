<?php

  /*******************************************************************************************************************
   * Create and register podcast post type
   */
  if ( !function_exists( 'ishyoboy_podcast_post_type' ) ){
    function ishyoboy_podcast_post_type()
    {
      $labels = array(
        'name'                  => __( 'Podcasts', 'ishyoboy '),
        'singular_name'         => __( 'Podcast', 'ishyoboy' ),
        'add_new'               => _x( 'Add Podcast', 'podcasts-post', 'ishyoboy' ),
        'add_new_item'          => __( 'Add New Podcast', 'ishyoboy' ),
        'edit_item'             => __( 'Edit Podcast', 'ishyoboy' ),
        'new_item'              => __( 'New Podcast Item', 'ishyoboy' ),
        'view_item'             => __( 'View Podcast', 'ishyoboy' ),
        'search_items'          => __( 'Search Podcasts', 'ishyoboy' ),
        'not_found'             => __( 'No Podcasts Found', 'ishyoboy' ),
        'not_found_in_trash'    => __( 'No Podcasts Found In Trash', 'ishyoboy' ),
        'parent_item_colon'     => __( 'Podcast', 'ishyoboy' ),
        'menu_name'             => __( 'Podcasts', 'ishyoboy' ),
         'all_items'            => __( 'All Podcasts', 'ishyoboy' )
              );
              $taxonomies              = array();
              $supports                = array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'trackbacks' 'comments', 'page-attributes');
              $post_type_args          = array(
                'labels'                => $labels,
                'description'           => __( 'Listen and or watch Klyde`s plugin and theme reviews by subscribing to the podcast feed', 'ishyoboy'),
                'singular_label'        => __( 'Podcast' , 'ishyoboy' ),
                'public'                => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => false,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'query_var'             => true,
                'capability_type'       => 'podcast',
                'map_meta_cap'          => true,
                'show_in_nav_menus'     => true,
                'show_in_admin_bar'     => true,
                'can_export'            => true,
                'delete_with_user'      => false,
                'has_archive'           => 'podcasts',
                'hierarchical'          => true,
                'rewrite'               => array(
                  'slug'                  => 'podcast',
                  'with_front'            => true,
                  'feed'                  => true,
                  'pages'                 => true
                ),
                'supports'              => $supports,
                'capabilities'          => array(

                    // meta caps (don't assign these to roles)
                    'edit_post'           => 'edit_podcast',
                    'read_post'           => 'read_podcast',
                    'delete_post'         => 'delete_podcast',

                    // primitive/meta caps
                    'create_posts'        => 'create_podcasts',

                    // primitive caps used outside of map_meta_cap()
                    'edit_posts'          => 'edit_podcasts',
                    'edit_others_posts'   => 'manage_podcasts',
                    'publish_posts'       => 'manage_podcasts',
                    'read_private_posts'  => 'read',

                    // primitive caps used inside of map_meta_cap()
                    'read'                   => 'read',
                    'delete_posts'           => 'manage_podcasts',
                    'delete_private_posts'   => 'manage_podcasts',
                    'delete_published_posts' => 'manage_podcasts',
                    'delete_others_posts'    => 'manage_podcasts',
                    'edit_private_posts'     => 'edit_podcasts',
                    'edit_published_posts'   => 'edit_podcasts'
                ),
                'menu_position'          => null,
                'menu_icon'              => 'dashicons-microphone',
                'taxonomies'             => $taxonomies
              );
          
              register_post_type( 'podcast-post', $post_type_args );
          
    }
  }




  /*******************************************************************************************************************
   * Set podcast post type's messages
   */

  if ( !function_exists( 'ishyoboy_podcast_messages' ) ){
    function ishyoboy_podcast_messages($messages)
    {
      global $post, $post_ID;

      $messages['podcast-post'] =
        array(
          0 => '',
          1 => sprintf(('Podcast Updated. <a href="%s">View Podcast</a>'), esc_url(get_permalink($post_ID))),
          2 => __('Custom Field Updated.', 'ishyoboy'),
          3 => __('Custom Field Deleted.', 'ishyoboy'),
          4 => __('Podcast Updated.', 'ishyoboy'),
          5 => isset($_GET['revision']) ? sprintf( __('Podcasts Restored To Revision From %s', 'ishyoboy'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
          6 => sprintf(__('Podcast Published. <a href="%s">View Podcast</a>', 'ishyoboy'), esc_url(get_permalink($post_ID))),
          7 => __('Podcast Saved.', 'ishyoboy'),
          8 => sprintf(__('Podcast Submitted. <a target="_blank" href="%s">Preview Podcast</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
          9 => sprintf(__('Podcast Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Podcast</a>', 'ishyoboy'), date_i18n( __( 'M j, Y @ G:i', 'ishyoboy' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
          10 => sprintf(__('Podcast Draft Updated. <a target="_blank" href="%s">Preview Podcast</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
        );
      return $messages;
    }
  }


  /*******************************************************************************************************************
   * Create Category for podcast post type
   */

  if ( !function_exists( 'ishyoboy_podcast_category' ) ){
    function ishyoboy_podcast_category()
    {

      $labels = array(
        'name'                          => __( 'Podcast Categories', 'ishyoboy' ),
        'singular_name'                 => __( 'Podcast Category', 'ishyoboy' ),
        'search_items'                  => __( 'Search Podcast Categories', 'ishyoboy' ),
        'popular_items'                 => __( 'Popular Podcast Categories', 'ishyoboy' ),
        'all_items'                     => __( 'All Podcast Categories', 'ishyoboy' ),
        'parent_item'                   => __( 'Parent Podcast Category', 'ishyoboy' ),
        'edit_item'                     => __( 'Edit Podcast Category', 'ishyoboy' ),
        'update_item'                   => __( 'Update Podcast Category', 'ishyoboy' ),
        'add_new_item'                  => __( 'Add New Podcast Category', 'ishyoboy' ),
        'new_item_name'                 => __( 'New Podcast Category', 'ishyoboy' ),
        'separate_items_with_commas'    => __( 'Separate Podcast Categories with commas', 'ishyoboy' ),
        'add_or_remove_items'           => __( 'Add or Remove Podcast Category', 'ishyoboy' ),
        'choose_from_most_used'         => __( 'Choose from most used Podcast Categories', 'ishyoboy' )
      );

      $args = array(
        //'labels'            => $labels,
        'public'                   => true,
        'hierarchical'             => true,
        'show_ui'                  => true,
        'show_in_nav_menus'        => true,
        'query_var'                => true,
        "rewrite"                  => array(
          'slug'                     => 'podcast-category',
          'hierarchical'             => true
        )
      );

      register_taxonomy( 'podcast-category', 'podcast-post', $args );

    }
  }

  /*******************************************************************************************************************
   * Backend columns
   */

  if ( !function_exists( 'ishyoboy_podcast_edit_columns' ) ){
    function ishyoboy_podcast_edit_columns( $columns ){
      $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __( 'Title', 'ishyoboy' ),
        "author" => __( 'Author', 'ishyoboy' ),
        "category" => __( 'PodcastCategories', 'ishyoboy' ),
        "thumbnail" => __( 'Image', 'ishyoboy' ),
        "date" => __( 'Date', 'ishyoboy' )
      );

      return $columns;
    }
  }
  add_filter( "manage_edit-podcast-post_columns", "ishyoboy_podcast_edit_columns" );


  if ( !function_exists( 'ishyoboy_podcast_custom_columns' ) ){
    function ishyoboy_podcast_custom_columns($column){
      global $post;

      switch ($column)
      {
        case "thumbnail":
          the_post_thumbnail('thumbnail');
          break;
        case "category":
          echo get_the_term_list($post->ID, 'podcast-category', '', ', ','');
          break;
      }
    }
  }
  add_action( 'manage_podcast-post_posts_custom_column' , 'ishyoboy_podcast_custom_columns', 10, 2 );



  /**
   * Add dropdown filter for sliders
   */
  if ( !function_exists( 'ishyoboy_restrict_podcast_by_category' ) ){
    function ishyoboy_restrict_podcast_by_category() {
      global $typenow, $wp_query;

      if ( isset($typenow) && 'podcast-post' == $typenow ) {

        $taxonomy = 'podcast-category';

        $term = isset( $wp_query->query[$taxonomy]) ? $wp_query->query[$taxonomy] : '';

        $podcast_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
          'show_option_all' =>  __("Show all", 'ishyoboy') . ' ' . $podcast_taxonomy->label,
          'taxonomy'    =>  $taxonomy,
          'name'      =>  $taxonomy,
          'orderby'    =>  'name',
          'selected'    =>  $term,
          'hierarchical'  =>  true,
          'depth'      =>  0,
          'show_count'    =>  true, // Show # listings in parens
          'hide_empty'    =>  true, // Don't show businesses w/o listings
        ));
      }
    }
  }
  add_action( 'restrict_manage_posts', 'ishyoboy_restrict_podcast_by_category' );

  if ( !function_exists( 'taxonomy_filter_ishyoboy_podcast_request' ) ){
    function taxonomy_filter_ishyoboy_podcast_request( $query ) {
      global $pagenow, $typenow;

      if ( isset($pagenow) && 'edit.php' == $pagenow ) {

        $filters = get_object_taxonomies( $typenow );
        if ( isset($filters) && '' != $filters){
          foreach ( $filters as $tax_slug ) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) && '' != $var ) {
              $term = get_term_by( 'id', $var, $tax_slug );
              if ( isset($term) && '' !=  $term ) {
                $var = $term->slug;
              }
            }
          }
        }
      }
    }
  }

  add_filter( 'parse_query', 'taxonomy_filter_ishyoboy_podcast_request' );


  /*******************************************************************************************************************
   * Initialize podcast post type
   */
  add_action( 'init', 'ishyoboy_podcast_post_type' );
  add_action( 'init', 'ishyoboy_podcast_category', 0 );
  add_filter( 'post_updated_messages', 'ishyoboy_podcast_messages' );
