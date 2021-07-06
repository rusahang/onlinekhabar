<h4 class="related-post-button">Related Posts:</h4>
<div class="related-posts clearfix">
    <?php
$categories             =   get_the_category();
$rp_query               =   new WP_Query([
    'posts_per_page'    =>  2,
    'post__not_in'      =>  [ $post->ID ],
    'cat'               =>  !empty($categories) ?  $categories[0]->term_id : null
]);
if( $rp_query->have_posts() ){
    while( $rp_query->have_posts() ){
        $rp_query->the_post();
        ?>
    <div class="mpost clearfix">
        <?php
        if( has_post_thumbnail() ){
            ?>
        <div class="entry-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>
        </div>
        <?php
            }
            ?>
        <div class="entry-c">
            <div class="entry-title">
                <h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
            </div>
            <ul class="entry-meta clearfix">
                <li><i class="icon-calendar3"></i> <?php echo get_the_date(); ?></li>
                <li><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number( '0' ); ?></li>
            </ul>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
    <?php
            }
            wp_reset_postdata();
        }
        ?>
    </section>