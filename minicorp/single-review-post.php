<?php
get_header();
?>
<section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
    <div class="row">
        <section class="grid12">
            <h1 class=" color4 acenter"><?php echo get_the_title() ?></h1>
        </section>
    </div>
</section>
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
        <div class="<?php echo ishyoboy_get_content_class(); ?>">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
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
                                            $standard_link = get_post_format_link( standard );

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
                            <?php echo '</div>'; ?>
                            <?php else : ?>
                                <div class="space"></div>
           
                                <div class="blog-post-details" style="text-align:center; font-weight:bold;">
                                    <span class="icon-calendar"><?php _e( 'Posted On:' , 'ishyoboy' ); ?> <a href="<?php echo get_month_link(get_the_time('M'), get_the_time('Y')); ?>"><?php the_time('l, F j, Y'); ?></a> at <?php the_time('g:i A'); ?></span>                                                                                                                                                                                                                                  
                                    <span class="icon-pencil-1">Written By: <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                                             coauthors_posts_links();
                                        } else {
                                             the_author_posts_link();
                                        } ?></span>
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
                                <?php comments_template('', true); ?>
                        <?php endif; ?>
                    </div>
                <?php } 
            } else {  ?>
                <div id="post-0" <?php post_class(); ?> >
                    <h2 class="entry-title"><?php _e('Error 404 - Page Not Found', 'ishyoboy') ?></h2>
                    <div class="entry-content">
                        <p><?php _e("Sorry, the content you are looking for could not be found.", 'ishyoboy') ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Content part section END -->
<?php
get_footer();
?>