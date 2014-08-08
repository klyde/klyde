<?php

  /*******************************************************************************************************************
   * Create and register video post type
   */
  if ( !function_exists( 'ishyoboy_video_post_type' ) ){
    function ishyoboy_video_post_type()
    {
      $labels = array(
        'name'                  => __( 'Videos', 'ishyoboy '),
        'singular_name'         => __( 'Video', 'ishyoboy' ),
        'add_new'               => _x( 'Add Video', 'video-post', 'ishyoboy' ),
        'add_new_item'          => __( 'Add New Video', 'ishyoboy' ),
        'edit_item'             => __( 'Edit Video', 'ishyoboy' ),
        'new_item'              => __( 'New Video', 'ishyoboy' ),
        'view_item'             => __( 'View Video', 'ishyoboy' ),
        'search_items'          => __( 'Search Videos', 'ishyoboy' ),
        'not_found'             => __( 'No Videos Found', 'ishyoboy' ),
        'not_found_in_trash'    => __( 'No Videos Found In Trash', 'ishyoboy' ),
        'parent_item_colon'     => __( 'Parent Video:', 'ishyoboy' ),
        'menu_name'             => __( 'Videos', 'ishyoboy' ),
        'all_items'             => __( 'All Videos', 'ishyoboy' )
      );
      $taxonomies              = array();
      $supports                = array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'trackbacks' 'comments', 'page-attributes');
      $post_type_args          = array(
        'labels'                => $labels,
        'description'           => __( 'Plugin and Theme Videos wtih in-depth analysis and thoughtful prose', 'ishyoboy'),
        'singular_label'        => __( 'Video' , 'ishyoboy' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'video',
        'map_meta_cap'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'delete_with_user'      => false,
        'has_archive'           => 'videos',
        'hierarchical'          => true,
        'rewrite'               => array(
          'slug'                  => 'video',
          'with_front'            => true,
          'feed'                  => true,
          'pages'                 => true
        ),
        'supports'              => $supports,
        'capabilities'          => array(

            // meta caps (don't assign these to roles)
            'edit_post'           => 'edit_video',
            'read_post'           => 'read_video',
            'delete_post'         => 'delete_video',

            // primitive/meta caps
            'create_posts'        => 'create_videos',

            // primitive caps used outside of map_meta_cap()
            'edit_posts'          => 'edit_videos',
            'edit_others_posts'   => 'manage_videos',
            'publish_posts'       => 'manage_videos',
            'read_private_posts'  => 'read',

            // primitive caps used inside of map_meta_cap()
            'read'                   => 'read',
            'delete_posts'           => 'manage_videos',
            'delete_private_posts'   => 'manage_videos',
            'delete_published_posts' => 'manage_videos',
            'delete_others_posts'    => 'manage_videos',
            'edit_private_posts'     => 'edit_videos',
            'edit_published_posts'   => 'edit_videos'
        ),
        'menu_position'          => null,
        'menu_icon'              => 'dashicons-video-alt',
        'taxonomies'             => $taxonomies
      );
  
      register_post_type( 'video-post', $post_type_args );
  
    }
  }


  /*******************************************************************************************************************
   * Set video post type's messages
   */

  if ( !function_exists( 'ishyoboy_video_messages' ) ){
    function ishyoboy_video_messages($messages)
    {
      global $post, $post_ID;

      $messages['video-post'] =
        array(
          0 => '',
          1 => sprintf(('Video Updated. <a href="%s">View Video</a>'), esc_url(get_permalink($post_ID))),
          2 => __('Custom Field Updated.', 'ishyoboy'),
          3 => __('Custom Field Deleted.', 'ishyoboy'),
          4 => __('Video Updated.', 'ishyoboy'),
          5 => isset($_GET['revision']) ? sprintf( __('Video Restored To Revision From %s', 'ishyoboy'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
          6 => sprintf(__('Video Published. <a href="%s">View Video</a>', 'ishyoboy'), esc_url(get_permalink($post_ID))),
          7 => __('Video Saved.', 'ishyoboy'),
          8 => sprintf(__('Video Submitted. <a target="_blank" href="%s">Preview Video</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
          9 => sprintf(__('Video Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Video</a>', 'ishyoboy'), date_i18n( __( 'M j, Y @ G:i', 'ishyoboy' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
          10 => sprintf(__('Video Draft Updated. <a target="_blank" href="%s">Preview Video</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
        );
      return $messages;
    }
  }


  /*******************************************************************************************************************
   * Create Category for video post type
   */

  if ( !function_exists( 'ishyoboy_video_category' ) ){
    function ishyoboy_video_category()
    {

      $labels = array(
        'name'                        => __( 'Video Categories', 'ishyoboy' ),
        'singular_name'               => __( 'Video Category', 'ishyoboy' ),
        'search_items'                => __( 'Search Video Categories', 'ishyoboy' ),
        'popular_items'               => __( 'Popular Video Categories', 'ishyoboy' ),
        'all_items'                   => __( 'All Video Categories', 'ishyoboy' ),
        'parent_item'                 => __( 'Parent Video Category', 'ishyoboy' ),
        'edit_item'                   => __( 'Edit Video Category', 'ishyoboy' ),
        'update_item'                 => __( 'Update Video Category', 'ishyoboy' ),
        'add_new_item'                => __( 'Add New Video Category', 'ishyoboy' ),
        'new_item_name'               => __( 'New Video Category', 'ishyoboy' ),
        'separate_items_with_commas'  => __( 'Separate Video Categories With Commas', 'ishyoboy' ),
        'add_or_remove_items'         => __( 'Add Or Remove Video Category', 'ishyoboy' ),
        'choose_from_most_used'       => __( 'Choose From Most Used Video Categories', 'ishyoboy' )
      );

      $args = array(
        //'labels'            => $labels,
        'public'                    => true,
        'hierarchical'              => true,
        'show_ui'                   => true,
        'show_in_nav_menus'         => true,
        'query_var'                 => true,
        "rewrite"                   => array(
          'slug'                      => 'video-category',
          'hierarchical'              => true
        )
      );

      register_taxonomy( 'video-category', 'video-post', $args );

    }
  }

  /*******************************************************************************************************************
   * Backend columns
   */

  if ( !function_exists( 'ishyoboy_video_edit_columns' ) ){
    function ishyoboy_video_edit_columns( $columns ){
      $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __( 'Title', 'ishyoboy' ),
        "author" => __( 'Author', 'ishyoboy' ),
        "category" => __( 'Video Categories', 'ishyoboy' ),
        "thumbnail" => __( 'Image', 'ishyoboy' ),
        "date" => __( 'Date', 'ishyoboy' )
      );

      return $columns;
    }
  }
  add_filter( "manage_edit-video-post_columns", "ishyoboy_video_edit_columns" );


  if ( !function_exists( 'ishyoboy_video_custom_columns' ) ){
    function ishyoboy_video_custom_columns($column){
      global $post;

      switch ($column)
      {
        case "thumbnail":
          the_post_thumbnail('thumbnail');
          break;
        case "category":
          echo get_the_term_list($post->ID, 'video-category', '', ', ','');
          break;
      }
    }
  }
  add_action( 'manage_video-post_posts_custom_column' , 'ishyoboy_video_custom_columns', 10, 2 );



  /**
   * Add dropdown filter for sliders
   */
  if ( !function_exists( 'ishyoboy_restrict_video_by_category' ) ){
    function ishyoboy_restrict_video_by_category() {
      global $typenow, $wp_query;

      if ( isset($typenow) && 'video-post' == $typenow ) {

        $taxonomy = 'video-category';

        $term = isset( $wp_query->query[$taxonomy]) ? $wp_query->query[$taxonomy] : '';

        $video_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
          'show_option_all' =>  __("Show all", 'ishyoboy') . ' ' . $video_taxonomy->label,
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
  add_action( 'restrict_manage_posts', 'ishyoboy_restrict_video_by_category' );

  if ( !function_exists( 'taxonomy_filter_ishyoboy_video_request' ) ){
    function taxonomy_filter_ishyoboy_video_request( $query ) {
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

  add_filter( 'parse_query', 'taxonomy_filter_ishyoboy_video_request' );


  /*******************************************************************************************************************
   * Initialize video post type
   */
  add_action( 'init', 'ishyoboy_video_post_type' );
  add_action( 'init', 'ishyoboy_video_category', 0 );
  add_filter( 'post_updated_messages', 'ishyoboy_video_messages' );
