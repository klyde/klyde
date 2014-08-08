<?php

  /*******************************************************************************************************************
   * Create and register tutorial post type
   */
  if ( !function_exists( 'ishyoboy_tutorial_post_type' ) ){
    function ishyoboy_tutorial_post_type()
    {
      $labels                  = array(
        'name'                  => __( 'Tutorials', 'ishyoboy '),
        'singular_name'         => __( 'Tutorial', 'ishyoboy' ),
        'add_new'               => _x( 'Add Tutorial', 'tutorial-post', 'ishyoboy' ),
        'add_new_item'          => __( 'Add New Tutorial', 'ishyoboy' ),
        'edit_item'             => __( 'Edit Tutorial', 'ishyoboy' ),
        'new_item'              => __( 'New Tutorial', 'ishyoboy' ),
        'view_item'             => __( 'View Tutorial', 'ishyoboy' ),
        'search_items'          => __( 'Search Tutorials', 'ishyoboy' ),
        'not_found'             => __( 'No Tutorials Found', 'ishyoboy' ),
        'not_found_in_trash'    => __( 'No Tutorials Found In Trash', 'ishyoboy' ),
        'parent_item_colon'     => __( 'Parent Tutorial:', 'ishyoboy' ),
        'menu_name'             => __( 'Tutorials', 'ishyoboy' ),
        'all_items'             => __( 'All Tutorials', 'ishyoboy' )
      );
      $taxonomies              = array();
      $supports                = array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'trackbacks', 'comments', 'page-attributes');
      $post_type_args          = array(
        'labels'                => $labels,
        'description'           => __( 'Plugin and Theme tutorials wtih in-depth analysis and thoughtful prose', 'ishyoboy'),
        'singular_label'        => __( 'Tutorial' , 'ishyoboy' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'tutorial',
        'map_meta_cap'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'delete_with_user'      => false,
        'has_archive'           => 'tutorials',
        'hierarchical'          => true,
        'rewrite'               => array(
          'slug'                  => 'tutorial',
          'with_front'            => true,
          'feed'                  => true,
          'pages'                 => true
        ),
        'supports'              => $supports,
        'capabilities'          => array(

            // meta caps (don't assign these to roles)
            'edit_post'           => 'edit_tutorial',
            'read_post'           => 'read_tutorial',
            'delete_post'         => 'delete_tutorial',

            // primitive/meta caps
            'create_posts'        => 'create_tutorials',

            // primitive caps used outside of map_meta_cap()
            'edit_posts'          => 'edit_tutorials',
            'edit_others_posts'   => 'manage_tutorials',
            'publish_posts'       => 'manage_tutorials',
            'read_private_posts'  => 'read',

            // primitive caps used inside of map_meta_cap()
            'read'                   => 'read',
            'delete_posts'           => 'manage_tutorials',
            'delete_private_posts'   => 'manage_tutorials',
            'delete_published_posts' => 'manage_tutorials',
            'delete_others_posts'    => 'manage_tutorials',
            'edit_private_posts'     => 'edit_tutorials',
            'edit_published_posts'   => 'edit_tutorials'
        ),
        'menu_position'          => null,
        'menu_icon'              => 'dashicons-hammer',
        'taxonomies'             => $taxonomies
      );
  
      register_post_type( 'tutorial-post', $post_type_args );
  
    }
  }



  /*******************************************************************************************************************
   * Set tutorial post type's messages
   */

  if ( !function_exists( 'ishyoboy_tutorial_messages' ) ){
    function ishyoboy_tutorial_messages($messages)
    {
      global $post, $post_ID;

      $messages['tutorial-post'] =
        array(
          0  => '',
          1  => sprintf(('Tutorial Updated. <a href="%s">View Tutorial</a>'), esc_url(get_permalink($post_ID))),
          2  => __('Custom Field Updated.', 'ishyoboy'),
          3  => __('Custom Field Deleted.', 'ishyoboy'),
          4  => __('Tutorial Updated.', 'ishyoboy'),
          5  => isset($_GET['revision']) ? sprintf( __('Tutorial Restored To Revision From %s', 'ishyoboy'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
          6  => sprintf(__('Tutorial Published. <a href="%s">View Tutorial</a>', 'ishyoboy'), esc_url(get_permalink($post_ID))),
          7  => __('Tutorial Saved.', 'ishyoboy'),
          8  => sprintf(__('Tutorial Submitted. <a target="_blank" href="%s">Preview Tutorial</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
          9  => sprintf(__('Tutorial Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tutorial</a>', 'ishyoboy'), date_i18n( __( 'M j, Y @ G:i', 'ishyoboy' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
          10 => sprintf(__('Tutorial Draft Updated. <a target="_blank" href="%s">Preview Tutorial</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
        );
      return $messages;
    }
  }


  /*******************************************************************************************************************
   * Create Category for Tutorial post type
   */

  if ( !function_exists( 'ishyoboy_tutorial_category' ) ){
    function ishyoboy_tutorial_category()
    {

      $labels = array(
        'name'                          => __( 'Tutorial Categories', 'ishyoboy' ),
        'singular_name'                 => __( 'Tutorial Category', 'ishyoboy' ),
        'search_items'                  => __( 'Search Tutorial Categories', 'ishyoboy' ),
        'popular_items'                 => __( 'Popular Tutorial Categories', 'ishyoboy' ),
        'all_items'                     => __( 'All Tutorial Categories', 'ishyoboy' ),
        'parent_item'                   => __( 'Parent Tutorial Category', 'ishyoboy' ),
        'edit_item'                     => __( 'Edit Tutorial Category', 'ishyoboy' ),
        'update_item'                   => __( 'Update Tutorial Category', 'ishyoboy' ),
        'add_new_item'                  => __( 'Add New Tutorial Category', 'ishyoboy' ),
        'new_item_name'                 => __( 'New Tutorial Category', 'ishyoboy' ),
        'separate_items_with_commas'    => __( 'Separate Tutorial Categories With Commas', 'ishyoboy' ),
        'add_or_remove_items'           => __( 'Add Or Remove Tutorial Category', 'ishyoboy' ),
        'choose_from_most_used'         => __( 'Choose From Most Used Tutorial Categories', 'ishyoboy' )
      );

      $args = array(
        //'labels'                      => $labels,
        'public'                        => true,
        'hierarchical'                  => true,
        'show_ui'                       => true,
        'show_in_nav_menus'             => true,
        'query_var'                     => true,
        "rewrite"                       => array(
          'slug'                          => 'tutorial-category',
          'hierarchical'                  => true
        )
      );

      register_taxonomy( 'tutorial-category', 'tutorial-post', $args );

    }
  }

  /*******************************************************************************************************************
   * Backend columns
   */

  if ( !function_exists( 'ishyoboy_tutorial_edit_columns' ) ){
    function ishyoboy_tutorial_edit_columns( $columns ){
      $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __( 'Title', 'ishyoboy' ),
        "author" => __( 'Author', 'ishyoboy' ),
        "category" => __( 'Tutorial Categories', 'ishyoboy' ),
        "thumbnail" => __( 'Image', 'ishyoboy' ),
        "date" => __( 'Date', 'ishyoboy' )
      );

      return $columns;
    }
  }
  add_filter( "manage_edit-tutorial-post_columns", "ishyoboy_tutorial_edit_columns" );


  if ( !function_exists( 'ishyoboy_tutorial_custom_columns' ) ){
    function ishyoboy_tutorial_custom_columns($column){
      global $post;

      switch ($column)
      {
        case "thumbnail":
          the_post_thumbnail('thumbnail');
          break;
        case "category":
          echo get_the_term_list($post->ID, 'tutorial-category', '', ', ','');
          break;
      }
    }
  }
  add_action( 'manage_tutorial-post_posts_custom_column' , 'ishyoboy_tutorial_custom_columns', 10, 2 );



  /**
   * Add dropdown filter for sliders
   */
  if ( !function_exists( 'ishyoboy_restrict_tutorial_by_category' ) ){
    function ishyoboy_restrict_tutorial_by_category() {
      global $typenow, $wp_query;

      if ( isset($typenow) && 'tutorial-post' == $typenow ) {

        $taxonomy = 'tutorial-category';

        $term = isset( $wp_query->query[$taxonomy]) ? $wp_query->query[$taxonomy] : '';

        $tutorial_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
          'show_option_all' =>  __("Show all", 'ishyoboy') . ' ' . $tutorial_taxonomy->label,
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
  add_action( 'restrict_manage_posts', 'ishyoboy_restrict_tutorial_by_category' );

  if ( !function_exists( 'taxonomy_filter_ishyoboy_tutorial_request' ) ){
    function taxonomy_filter_ishyoboy_tutorial_request( $query ) {
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

  add_filter( 'parse_query', 'taxonomy_filter_ishyoboy_tutorial_request' );


  /*******************************************************************************************************************
   * Initialize tutorial post type
   */
  add_action( 'init', 'ishyoboy_tutorial_post_type' );
  add_action( 'init', 'ishyoboy_tutorial_category', 0 );
  add_filter( 'post_updated_messages', 'ishyoboy_tutorial_messages' );
