<div class="grid12 blog-post">
    <?php if ( !is_single() ) : ?>
        <?php echo '<div class="search-results-container">'; ?>
        <div class="search-result clearfix">
            <div class="lined-section-only" style="white-space: nowrap;"><span style=""></span></div>

                <?php

                    if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                        //$img_details = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full');
                        //$src = $img_details[0]
                        //echo '<img src="' . $src . '" class="avatar avatar-70 photo" height="90" width="90">';
                        echo '<a href="' . get_permalink() . '">';
                        the_post_thumbnail('thumbnail', Array('class' => 'search-result-image'));
                        echo '</a>';
                        }

                        $title = get_the_title();

                        $title = (  !empty( $title ) ) ? $title : 'No title';

                ?>
                    <div class="search-details" style="margin-top: 48px !important;">
                        <h3 class="color1" style="display:block;line-height:30%;letter-spacing:.5px;font-weight:bold;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
        <?php echo '</div>'; ?>
    <?php else : ?>
        <div class="space"></div>



        <div class="blog-post-details" style="text-align:center; font-weight:bold;">
            <span class="icon-calendar"><?php _e( 'Posted On:' , 'ishyoboy' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
            <span class="icon-pencil-1">Written By: <?php echo get_the_author_link(); ?></span>
            
            <?php if ( has_category() ) : ?>
                <span class="icon-folder">Filed Under: <?php the_category(', '); ?></span>
            <?php endif; ?>
            <?php if ( has_tag() ) : ?>
                <span class="icon-tags"><?php the_tags('Tagged With: ',' , ',''); ?></span>
            <?php endif; ?>
            <span class="icon-chat-1"><?php _e( 'And Has: ' , 'ishyoboy' ); ?> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __('0 comments', 'ishyoboy'), __('1 comment', 'ishyoboy'), __('% comments', 'ishyoboy') ); ?></a></span>
        </div>



    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>
        <div class="main-post-image">
            <?php
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
            echo '<a href="' . $large_image_url[0] . '" alt="">';
            the_post_thumbnail('theme-large');
            echo '</a>';
            ?>
            <?php the_post_thumbnail_caption(); ?>
        </div>
    <?php endif; ?>
        <?php the_content(); ?>
        <?php ishyoboy_show_addthis(); ?>
        <h4 id="respond" class="lined-section-only" style="white-space: nowrap;line-height:300%;">Navigate &nbsp; &nbsp; &nbsp; &nbsp;<span style=""></span></h4>
        <div style="display:block;text-align:center;"><?php ishyoboy_blogpost_prev_next(); ?></div>
        <?php comments_template('', true); ?>
    <?php endif; ?>

</div>







