<?php if (have_posts()) { ?>
<?php while (have_posts()) { ?>
<?php the_post(); ?>
<!-- Ads ============================================= -->
<div class="content-advert">
    <?php
    if( function_exists( 'quads_ad' ) ){
        echo quads_ad([ 'location' => 'onlinekhabar_content_top' ]);
    } ?>
</div>
<!-- #Ads end -->

<?php get_template_part('template-parts/post/content', get_post_format()); ?>
<?php
if (get_theme_mod('onlinekhabar_display_author_info', true)) {
    get_template_part('template-parts/single/author');
} ?>
<!-- Ads ============================================= -->
<div class="content-advert">
    <?php
    if( function_exists( 'quads_ad' ) ){
        echo quads_ad([ 'location' => 'onlinekhabar_content_footer' ]);
    } ?>
</div>
<!-- #Ads end -->
<?php get_template_part('template-parts/single/navigation'); ?>
<?php
if(comments_open() || get_comments_number()) {
    comments_template();
}
?>
<?php } ?>
<div>
    <?php if(is_single()) { ?>
    <?php get_template_part('template-parts/post/related-post'); ?>
    <?php } ?>
</div>
<?php } else { ?>
<?php get_template_part('template-parts/post/content', 'none'); ?>
<?php } ?>