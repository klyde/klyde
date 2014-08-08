<?php

/*
 * Get header.php
 */
get_header();

?>

<?php

if (is_category()){
    $current_term = get_queried_object();
    $lead = '<div class="category-lead post-category-lead">';
    $lead .= '<h1 class="color1">' . $current_term->name . '</h1>';
    $lead .= ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tag()){
    $current_term = get_queried_object();
    $lead = '<div class="tag-lead post-tag-lead">';
    $lead .= '<h1 class="color1">' . $current_term->name . '</h1>';
    $lead .= ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_archive()){
    $lead = '<div class="archive-lead post-archive-lead"><h1 class="color1">';
    if ( is_day() ) :
        $lead .= sprintf( __( 'Daily Archives: %s', 'ishyoboy' ), '<span>' . get_the_date() . '</span>' );
    elseif ( is_month() ) :
        $lead .= sprintf( __( 'Monthly Archives: %s', 'ishyoboy' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ishyoboy' ) ) . '</span>' );
    elseif ( is_year() ) :
        $lead .= sprintf( __( 'Yearly Archives: %s', 'ishyoboy' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ishyoboy' ) ) . '</span>' );
    else :
        $lead .= __( 'Archives', 'ishyoboy' );
    endif;
    $lead .= '</h1>';
    ishyoboy_custom_lead($lead);
}
else{
    ishyoboy_get_lead(get_the_ID());
}
?>

<!-- Content part section -->
    <section class="part-content">
        <div class="row">
            <div class=" grid12 no-sidebar">
                <?php
                // Breadcrumbs display
                ishyoboy_show_breadcrumbs();
                ?>

                <?php if (have_posts()) :

                    echo '<div class="search-results-container">';

                    while (have_posts()) : the_post(); ?>

                        <div class="search-result clearfix">
                            <div class="lined-section-only" style="white-space: nowrap;"><span style=""></span></div>

                            <?php

                            if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                                //$img_details = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full');
                                //$src = $img_details[0]
                                //echo '<img src="' . $src . '" class="avatar avatar-70 photo" height="70" width="70">';
                                echo '<a href="' . get_permalink() . '">';
                                the_post_thumbnail('thumbnail', Array('class' => 'search-result-image'));
                                echo '</a>';
                            }

                            $title = get_the_title();

                            $title = (  !empty( $title ) ) ? $title : 'No title';

                            ?>
                            <div class="search-details" style="margin-top: 48px !important;">
                                <h3 class="color1" style="display:block;line-height:20%;letter-spacing:1px;font-weight:bold;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="icon-calendar" style="font-weight:bold;">Posted On: <?php echo get_the_date(); ?></span>
                                <span class="icon-pencil-1" style="font-weight:bold;">Written By: <?php echo get_the_author_link(); ?></span>
                                <?php if ( has_category() ) : ?>
                                    <span class="icon-folder" style="font-weight:bold;">Filed Under: <?php the_category(', '); ?></span>
                                <?php endif; ?>
                                <?php if ( has_tag() ) : ?>
                                    <span class="icon-tags" style="font-weight:bold;"><?php the_tags('And Tagged With: ',' , ',''); ?></span>
                                <?php endif; ?>
                                <?php echo ishyoboy_custom_excerpt(get_the_content(), 40, get_search_query()); ?>
                            </div>
                        </div>
                        <div class="divider"></div>

                    <?php endwhile;
                    echo '</div>';


                    global $wp_query;
                    if(empty($paged) || 0 == $paged) $paged = 1;

                    $pg = ishyoboy_get_pagination('', 3, $wp_query->max_num_pages, $paged);
                    if ('' != $pg){
                        echo $pg, '<div class="space"></div>';
                    } else{
                        echo '<div class="space"></div>';
                    }

                    ?>


                <?php else : ?>

                    <div id="post-0" <?php post_class(); ?>>

                        <div class="space"></div>

                        <h2 class="entry-title"><?php _e('No results found.', 'ishyoboy') ?></h2>

                        <div class="entry-content">
                            <p><?php _e("Sorry, the content you are looking for could not be found.", 'ishyoboy') ?></p>
                        </div>

                        <div class="space"></div>

                    </div>

                <?php endif; ?>

            </div>

            <?php
            // SIDEBAR
            //get_sidebar();
            ?>

        </div>
    </section>
    <!-- Content part section END -->

<?php

/*
 * Get footer.php
 */
get_footer();

?>