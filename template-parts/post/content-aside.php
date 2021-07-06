<article <?php post_class('c-post u-margin-bottom-20'); ?>>
    <div class="c-post__inner">
        <div class="c-post__content">
            <?php the_content(); ?>
        </div>
        <div class="c-post__meta">
            <?php onlinekhabar_post_meta(); ?>
        </div>

        <?php if(is_single( )) { ?>
        <?php get_template_part('template-parts/post/footer'); ?>
        <?php } ?>
    </div>
    <?php if(is_active_sidebar('primary-sidebar')) { ?>
    <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
        <?php get_sidebar(); ?>
    </div>
    <?php } ?>
</article>