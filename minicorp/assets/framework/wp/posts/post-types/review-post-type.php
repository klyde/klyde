<?php

  /*******************************************************************************************************************
   * Create and register review post type
   */
  if ( !function_exists( 'ishyoboy_review_post_type' ) ){
    function ishyoboy_review_post_type()
    {
      $labels                  = array(
        'name'                  => __( 'Reviews', 'ishyoboy '),
        'singular_name'         => __( 'Review', 'ishyoboy' ),
        'add_new'               => _x( 'Add Review', 'review-post', 'ishyoboy' ),
        'add_new_item'          => __( 'Add New Review', 'ishyoboy' ),
        'edit_item'             => __( 'Edit Review', 'ishyoboy' ),
        'new_item'              => __( 'New Review', 'ishyoboy' ),
        'view_item'             => __( 'View Review', 'ishyoboy' ),
        'search_items'          => __( 'Search Reviews', 'ishyoboy' ),
        'not_found'             => __( 'No Reviews Found', 'ishyoboy' ),
        'not_found_in_trash'    => __( 'No Reviews Found In Trash', 'ishyoboy' ),
        'parent_item_colon'     => __( 'Parent Review:', 'ishyoboy' ),
        'menu_name'             => __( 'Reviews', 'ishyoboy' ),
        'all_items'             => __( 'All Reviews', 'ishyoboy' )
      );
      $taxonomies              = array();
      $supports                = array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'trackbacks', 'comments', 'page-attributes');
      $post_type_args          = array(
        'labels'                => $labels,
        'description'           => __( 'Plugin and Theme reviews wtih in-depth analysis and thoughtful prose', 'ishyoboy'),
        'singular_label'        => __( 'Review' , 'ishyoboy' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'review',
        'map_meta_cap'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'delete_with_user'      => false,
        'has_archive'           => 'reviews',
        'hierarchical'          => true,
        'rewrite'               => array(
          'slug'                  => 'review',
          'with_front'            => true,
          'feed'                  => true,
          'pages'                 => true
        ),
        'supports'              => $supports,
        'capabilities'          => array(

            // meta caps (don't assign these to roles)
            'edit_post'           => 'edit_review',
            'read_post'           => 'read_review',
            'delete_post'         => 'delete_review',

            // primitive/meta caps
            'create_posts'        => 'create_reviews',

            // primitive caps used outside of map_meta_cap()
            'edit_posts'          => 'edit_reviews',
            'edit_others_posts'   => 'manage_reviews',
            'publish_posts'       => 'manage_reviews',
            'read_private_posts'  => 'read',

            // primitive caps used inside of map_meta_cap()
            'read'                   => 'read',
            'delete_posts'           => 'manage_reviews',
            'delete_private_posts'   => 'manage_reviews',
            'delete_published_posts' => 'manage_reviews',
            'delete_others_posts'    => 'manage_reviews',
            'edit_private_posts'     => 'edit_reviews',
            'edit_published_posts'   => 'edit_reviews'
        ),
        'menu_position'          => null,
        'menu_icon'              => 'dashicons-star-half',
        'taxonomies'             => $taxonomies
      );
  
      register_post_type( 'review-post', $post_type_args );
  
    }
  }



  /*******************************************************************************************************************
   * Set review post type's messages
   */

  if ( !function_exists( 'ishyoboy_review_messages' ) ){
    function ishyoboy_review_messages($messages)
    {
      global $post, $post_ID;

      $messages['review-post'] =
        array(
          0  => '',
          1  => sprintf(('Review Updated. <a href="%s">View Review</a>'), esc_url(get_permalink($post_ID))),
          2  => __('Custom Field Updated.', 'ishyoboy'),
          3  => __('Custom Field Deleted.', 'ishyoboy'),
          4  => __('Review Updated.', 'ishyoboy'),
          5  => isset($_GET['revision']) ? sprintf( __('Review Restored To Revision From %s', 'ishyoboy'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
          6  => sprintf(__('Review Published. <a href="%s">View Review</a>', 'ishyoboy'), esc_url(get_permalink($post_ID))),
          7  => __('Review Saved.', 'ishyoboy'),
          8  => sprintf(__('Review Submitted. <a target="_blank" href="%s">Preview Review</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
          9  => sprintf(__('Review Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Review</a>', 'ishyoboy'), date_i18n( __( 'M j, Y @ G:i', 'ishyoboy' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
          10 => sprintf(__('Review Draft Updated. <a target="_blank" href="%s">Preview Review</a>', 'ishyoboy'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
        );
      return $messages;
    }
  }


  /*******************************************************************************************************************
   * Create Category for Review post type
   */

  if ( !function_exists( 'ishyoboy_review_category' ) ){
    function ishyoboy_review_category()
    {

      $labels = array(
        'name'                          => __( 'Review Categories', 'ishyoboy' ),
        'singular_name'                 => __( 'Review Category', 'ishyoboy' ),
        'search_items'                  => __( 'Search Review Categories', 'ishyoboy' ),
        'popular_items'                 => __( 'Popular Review Categories', 'ishyoboy' ),
        'all_items'                     => __( 'All Review Categories', 'ishyoboy' ),
        'parent_item'                   => __( 'Parent Review Category', 'ishyoboy' ),
        'edit_item'                     => __( 'Edit Review Category', 'ishyoboy' ),
        'update_item'                   => __( 'Update Review Category', 'ishyoboy' ),
        'add_new_item'                  => __( 'Add New Review Category', 'ishyoboy' ),
        'new_item_name'                 => __( 'New Review Category', 'ishyoboy' ),
        'separate_items_with_commas'    => __( 'Separate Review Categories With Commas', 'ishyoboy' ),
        'add_or_remove_items'           => __( 'Add Or Remove Review Category', 'ishyoboy' ),
        'choose_from_most_used'         => __( 'Choose From Most Used Review Categories', 'ishyoboy' )
      );

      $args = array(
        //'labels'                      => $labels,
        'public'                        => true,
        'hierarchical'                  => true,
        'show_ui'                       => true,
        'show_in_nav_menus'             => true,
        'query_var'                     => true,
        "rewrite"                       => array(
          'slug'                          => 'review-category',
          'hierarchical'                  => true
        )
      );

      register_taxonomy( 'review-category', 'review-post', $args );

    }
  }

  /*******************************************************************************************************************
   * Backend columns
   */

  if ( !function_exists( 'ishyoboy_review_edit_columns' ) ){
    function ishyoboy_review_edit_columns( $columns ){
      $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __( 'Title', 'ishyoboy' ),
        "author" => __( 'Author', 'ishyoboy' ),
        "category" => __( 'Review Categories', 'ishyoboy' ),
        "thumbnail" => __( 'Image', 'ishyoboy' ),
        "date" => __( 'Date', 'ishyoboy' )
      );

      return $columns;
    }
  }
  add_filter( "manage_edit-review-post_columns", "ishyoboy_review_edit_columns" );


  if ( !function_exists( 'ishyoboy_review_custom_columns' ) ){
    function ishyoboy_review_custom_columns($column){
      global $post;

      switch ($column)
      {
        case "thumbnail":
          the_post_thumbnail('thumbnail');
          break;
        case "category":
          echo get_the_term_list($post->ID, 'review-category', '', ', ','');
          break;
      }
    }
  }
  add_action( 'manage_review-post_posts_custom_column' , 'ishyoboy_review_custom_columns', 10, 2 );



  /**
   * Add dropdown filter for sliders
   */
  if ( !function_exists( 'ishyoboy_restrict_review_by_category' ) ){
    function ishyoboy_restrict_review_by_category() {
      global $typenow, $wp_query;

      if ( isset($typenow) && 'review-post' == $typenow ) {

        $taxonomy = 'review-category';

        $term = isset( $wp_query->query[$taxonomy]) ? $wp_query->query[$taxonomy] : '';

        $review_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
          'show_option_all' =>  __("Show all", 'ishyoboy') . ' ' . $review_taxonomy->label,
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
  add_action( 'restrict_manage_posts', 'ishyoboy_restrict_review_by_category' );

  if ( !function_exists( 'taxonomy_filter_ishyoboy_review_request' ) ){
    function taxonomy_filter_ishyoboy_review_request( $query ) {
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

  add_filter( 'parse_query', 'taxonomy_filter_ishyoboy_review_request' );


  /*******************************************************************************************************************
   * Initialize review post type
   */
  add_action( 'init', 'ishyoboy_review_post_type' );
  add_action( 'init', 'ishyoboy_review_category', 0 );
  add_filter( 'post_updated_messages', 'ishyoboy_review_messages' );
