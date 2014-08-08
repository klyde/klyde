<?php

$id_404 = ( isset( $ish_options['use_page_for_404'] ) && ( '1' == $ish_options['use_page_for_404'] ) && isset( $ish_options['page_for_404'] ) ) ? $ish_options['page_for_404'] : '';

get_header();

//<!-- Lead part section -->
$lead = '<div class="search-lead">';
$lead .= '<h1 class="color1 page-title">' . sprintf( __( 'Search Results for: %s', 'ishyoboy' ) ,  '<span>' . get_search_query() . '</span>' ) . '</h1>';
$lead .= '</div>';
ishyoboy_custom_lead($lead);
//<!-- Lead part section -->

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

                    ?>
                        <div class="space"></div>
                    <?php

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

    <!-- #content  END -->
<?php  get_footer(); ?>