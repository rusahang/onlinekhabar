<?php
/*
Template Name: Blank
*/
get_header(); ?>
<main role="main">
    <?php while(have_posts()) { the_post(); ?>
    <article <?php post_class(); ?>>
        <?php //the_content(); ?>
        <?php
        $content = get_the_content();
        echo $content;
        ?>
    </article>
    <?php } ?>
</main>
<?php get_footer(); ?>