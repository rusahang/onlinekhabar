<footer class="c-post__footer">
    <?php
        if(has_category()) {
            echo '<div class="c-post__cats>';
            /* translators: used between categories */
            $cats_list = get_the_category_list(esc_html__(', ', 'onlinekhabar'));
            /* translators: %s is categories list */
            printf(esc_html__('Posted in %s', 'onlinekhabar'), $cats_list);
            echo "</div>";
        }
        if(has_tag()) {
            echo '<div class="c-post__tags">';
            $tags_list = get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
            echo $tags_list;
            echo "</div>";
        }
    ?>
</footer>