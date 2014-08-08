<?php

/*
 * Get header.php
 */
get_header();

// Get Framework settings, do not remove!
global $ish_options;

// Get Sidebar width options, do not remove!
global $sidebar_width;
?><section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
    <div class="row">
        <section class="grid12">
            <h1 class=" color4 acenter"><?php the_title() ?></h1>
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
                    the_post();
                    
                    $format = get_post_format();
                    if( false === $format ) { $format = 'standard'; }
                    get_template_part( 'content-post', $format );

                }

                ishyoboy_pagination('', 3);

            } else {  ?>
                <div id="post-0" <?php post_class(); ?>>
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