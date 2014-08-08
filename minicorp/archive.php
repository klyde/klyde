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
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Category: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tag()){
    $current_term = get_queried_object();
    $lead = '<div class="tag-lead post-tag-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Tag: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'post_format' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Post Format: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'series' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Series: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'portfolio-category' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Portfolio Category: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'video-category' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Video Category: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'podcast-category' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Podcast Category: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif (is_tax( 'review-category' )){
    $current_term = get_queried_object();
    $lead = '<div class="format-lead post-format-lead">';
    $lead .= '<h1 class="color1" style ="color:white;">' . __( 'Review Category: ', 'ishyoboy' ) . $current_term->name . '</h1>';
    $lead .= '<span class="lead-description" style="text-align:center !important;display: block;font-size:14px;">' . ('' != do_shortcode($current_term->description)) ? do_shortcode($current_term->description) : '' . '</span>';
    $lead .= '</div>';
    ishyoboy_custom_lead($lead);
}
elseif ( is_post_type_archive( 'review-post' ) ) {
    ?>
    <section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
        <div class="row">
            <section class="grid12">
                <h1 class=" color4 acenter">Reviews</h1>
                <span class="lead-description" style="text-align:center !important;display: block;font-size:14px;"> <?php $post_type = get_post_type_object( 'review-post' );
                    echo $post_type->description ; ?> 
                </span>
            </section>
        </div>
    </section>
    
<?php }
elseif ( is_post_type_archive( 'video-post' ) ) {
    ?>
    <section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
        <div class="row">
            <section class="grid12">
                <h1 class=" color4 acenter">Videos</h1>
                <span class="lead-description" style="text-align:center !important;display: block;font-size:14px;"> <?php $post_type = get_post_type_object( 'video-post' );
                    echo $post_type->description ; ?> 
                </span>
            </section>
        </div>
    </section>
    
<?php }
elseif ( is_post_type_archive( 'podcast-post' ) ) {
    ?>
    <section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
        <div class="row">
            <section class="grid12">
                <h1 class=" color4 acenter">Podcasts</h1>
                <span class="lead-description" style="text-align:center !important;display: block;font-size:14px;"> <?php $post_type = get_post_type_object( 'podcast-post' );
                    echo $post_type->description ; ?> 
                </span>
            </section>
        </div>
    </section>
    
<?php }
elseif ( is_post_type_archive( 'portfolio-post' ) ) {
    ?>
    <section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
        <div class="row">
            <section class="grid12">
                <h1 class=" color4 acenter">Portfolios</h1>
                <span class="lead-description" style="text-align:center !important;display: block;font-size:14px;"> <?php $post_type = get_post_type_object( 'portfolio-post' );
                    echo $post_type->description ; ?> 
                </span>
            </section>
        </div>
    </section>
    
<?php }
elseif (is_archive()){
    $lead = '<div class="archive-lead post-archive-lead"><h1 class="color1" style ="color:white;">';
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
  ?><section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
    <div class="row">
        <section class="grid12">
            <h1 class=" color4 acenter"><?php the_title() ?></h1>
        </section>
    </div>
</section>
<?php }?>
<div class="part-fullsection bg-color2 bg-pattern">
    <div class="row">
        <div class="grid12">
            <div class="row">
                <div class="grid9">
                    <h2 class=" color1 aleft">
                        Don’t You Want It
                        <em>ALL</em>
                        ?
                    </h2>
                    <h5 class=" color4 aleft">I offer you quite a few routes you can easily take to keep up with all the newest features and tools that come to market for WordPress. Use these new inroads to keep your website on the fore-front of WP technology. Click the button to explore your options.</h5>
                </div>
                <div class="grid3">
                    <p> </p>
                    <p>
                        <a class="ish-button-big color1 button-fullwidth center" target="_blank" href="http://klyde.net/subscribe">
                            <em>
                                <strong>Join Now</strong>
                            </em>
                            <span style="color: rgba(62, 62, 62, 0.74902);">
                                <span class="ish-icon" style="">
                                    <span class="icon-user-4"></span>
                                </span>
                            </span>
                            <span style="color: rgba(62, 62, 62, 0.74902);">
                                <span class="ish-icon" style="">
                                    <span class="icon-right-thin"></span>
                                </span>
                            </span>
                            <span class="ish-icon" style="">
                                <span class="icon-users-2"></span>
                            </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content part section -->
    <section class="part-content">
        <div class="row">
            <div class=" grid12 no-sidebar">
                <?php
                // Breadcrumbs display
                ishyoboy_show_breadcrumbs();
                ?>
                <?php
                echo wpfixit_cat_art();
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
                                <span class="icon-pencil-1" style="font-weight:bold;">Written By: <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                                         coauthors_posts_links();
                                    } else {
                                         the_author_posts_link();
                                    } ?></span>
                                    <?php if( count(wp_get_post_terms( $post->ID, 'review-category')) > 0 ) : ?>
                                    <?php $terms = wp_get_post_terms($post->ID,'review-category');
                                     $result = "";
                                        $count=count($terms);
                                        if ( $count > 0 ){
                                            echo '<span class="icon-folder" style="font-weight:bold;display:inline-block;">Filed Under: ';
                                        foreach($terms as $term) {
                                          // save output in temporary variable...
                                          $result .= '<a href="'.get_term_link($term->slug, 'review-category').'">'. $term->name . "</a>";
                                          $result .= ', ';
                                        }
                                    echo substr($result, 0, -2);
                                    echo '</span>';
                                }?>
                                <?php endif; ?>
                                <?php if( count(wp_get_post_terms( $post->ID, 'video-category')) > 0 ) : ?>
                                    <?php $terms = wp_get_post_terms($post->ID,'video-category');
                                     $result = "";
                                        $count=count($terms);
                                        if ( $count > 0 ){
                                            echo '<span class="icon-folder" style="font-weight:bold;display:inline-block;">Filed Under: ';
                                        foreach($terms as $term) {
                                          // save output in temporary variable...
                                          $result .= '<a href="'.get_term_link($term->slug, 'video-category').'">'. $term->name . "</a>";
                                          $result .= ', ';
                                        }
                                    echo substr($result, 0, -2);
                                    echo '</span>';
                                }?>
                                <?php endif; ?>
                                <?php if( count(wp_get_post_terms( $post->ID, 'podcast-category')) > 0 ) : ?>
                                    <?php $terms = wp_get_post_terms($post->ID,'podcast-category');
                                     $result = "";
                                        $count=count($terms);
                                        if ( $count > 0 ){
                                            echo '<span class="icon-folder" style="font-weight:bold;display:inline-block;">Filed Under: ';
                                        foreach($terms as $term) {
                                          // save output in temporary variable...
                                          $result .= '<a href="'.get_term_link($term->slug, 'podcast-category').'">'. $term->name . "</a>";
                                          $result .= ', ';
                                        }
                                    echo substr($result, 0, -2);
                                    echo '</span>';
                                }?>
                                <?php endif; ?>
                                <?php if( count(wp_get_post_terms( $post->ID, 'portfolio-category')) > 0 ) : ?>
                                    <?php $terms = wp_get_post_terms($post->ID,'portfolio-category');
                                     $result = "";
                                        $count=count($terms);
                                        if ( $count > 0 ){
                                            echo '<span class="icon-folder" style="font-weight:bold;display:inline-block;">Filed Under: ';
                                        foreach($terms as $term) {
                                          // save output in temporary variable...
                                          $result .= '<a href="'.get_term_link($term->slug, 'portfolio-category').'">'. $term->name . "</a>";
                                          $result .= ', ';
                                        }
                                    echo substr($result, 0, -2);
                                    echo '</span>';
                                }?>
                                <?php endif; ?>
                                <?php if ( has_category() ) : ?>
                                    <span class="icon-folder" style="font-weight:bold;">Filed Under: <?php the_category(', '); ?></span>
                                <?php endif; ?>
                                <?php if ( has_tag() ) : ?>
                                    <span class="icon-tags" style="font-weight:bold;"><?php the_tags('And Tagged With: ',' , ',''); ?></span>
                                <?php endif; ?>
                                <span class="icon-chat-1" style="font-weight:bold;"><?php _e( 'And Has: ' , 'ishyoboy' ); ?> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 comments', 'ishyoboy'), __('1 comment', 'ishyoboy'), __('% comments', 'ishyoboy') ); ?></a></span>
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