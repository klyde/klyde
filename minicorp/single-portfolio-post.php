<?php

get_header();

?>

<?php ishyoboy_get_lead(ish_get_the_ID()); ?>

<!-- Content part section -->
<section class="part-content">
    <div class="row">

        <div class="<?php echo ishyoboy_get_content_class(); ?>">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php comments_template('', true); ?>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>


    </div>
</section>
<!-- Content part section END -->

<?php  get_footer();