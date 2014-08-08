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
        <div class="grid12 blog-post">
            <?php if ( is_single() ) : ?>
                <div class="space"></div>
                <div class="blog-post-details" style="text-align:center; font-weight:bold;">
                    <span class="icon-calendar"><?php _e( 'Posted On:' , 'ishyoboy' ); ?> <a href="<?php echo get_month_link(get_the_time('M'), get_the_time('Y')); ?>"><?php the_time('l, F j, Y'); ?></a> at <?php the_time('g:i A'); ?></span>
                    <span class="icon-pencil-1">Written By: <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                             coauthors_posts_links();
                        } else {
                             the_author_posts_link();
                        } ?></span>
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
    </div>
</section>
<!-- Content part section END -->
<!-- #content  END -->
<?php  get_footer(); ?>