<?php

$id_404 = ( isset( $ish_options['use_page_for_404'] ) && ( '1' == $ish_options['use_page_for_404'] ) && isset( $ish_options['page_for_404'] ) ) ? $ish_options['page_for_404'] : '';

get_header();

if ( '' != $id_404 && '-1' != $id_404 ){
    // 404 Page set in the backend

    
    ?>
<section id="part-lead" class="part-lead lead-boxed" style="background-color:#ac984d;border-top: 5px solid #554335;margin-top: 1px;padding-top: 25px;">
    <div class="row">
        <section class="grid12">
            <h1 class=" color4 acenter"><?php echo get_the_title(); ?></h1>
        </section>
    </div>
</section>
<!-- Lead part section END -->
<!-- Content part section -->
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
            <div class="<?php echo ishyoboy_get_content_class($id_404); ?>">
                <?php
                $my_post = get_post($id_404);
                // Breadcrumbs display
                ishyoboy_show_breadcrumbs();
                ?>
                <?php echo apply_filters('the_content', $my_post->post_content); ?>

            </div>

            <?php
            // SIDEBAR
            get_sidebar('404');
            ?>

        </div>
    </section>
    <!-- Content part section END -->

<?php } else{
    // USE DEFAULT 404 TEMPLATE

    ishyoboy_custom_lead('<h1 class="color1">Oh dear!</h1><h2>No matter how hard we try, we\'re unable to find the page you\'re looking for.</h2>'); ?>

    <!-- Content part section -->
    <section class="part-content">
        <div class="row">
            <div class="grid12 no-sidebar">
                <?php
                // Breadcrumbs display
                ishyoboy_show_breadcrumbs();
                ?>
                <div class="space"></div>
                <p>We've searched more than <strong>404</strong> pages and none of them seems to be the one you we're looking for.</p>
                <p>Why don't you have a look around and try to find it?</p>
                <div class="space"></div>

            </div>

        </div>
    </section>
    <!-- Content part section END -->

<?php } ?>
<!-- #content  END -->
<?php  get_footer(); ?>