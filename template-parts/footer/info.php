<?php
$footer_background = onlinekhabar_sanitize_footer_background(get_theme_mod( 'onlinekhabar_footer_background', 'dark' ));
$copyright_info = get_theme_mod('onlinekhabar_copyright_info', '');
?>
<?php if($copyright_info) { ?>
<div class="c-site-info c-site-info--<?php echo $footer_background; ?>">
    <div class="o-container">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 c-site-info__text">
                <?php
                $allowed = array('a' => array(
                    'href' => array(),
                    'title' => array()
                ));
                echo wp_kses($copyright_info, $allowed); ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>