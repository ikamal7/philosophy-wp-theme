<?php get_header(); ?>

<!-- s-content
================================================== -->
<section class="s-content">

    <div class="row">

        <div class="text-center">
            <h1 class="large-font-size"><?php _e("404", "philosophy"); ?></h1>
            <h1 class="large-font-size"><?php _e("NOT FOUND", "philosophy"); ?></h1>
            <a class="btn btn-dark" href="<?php echo esc_url(home_url("/")); ?>"><i class="fa fa-arrow-left"></i><?php _e("GO back Home", "philosophy"); ?></a>

        </div>


    </div>

</section> <!-- s-content -->

<?php get_footer(); ?>