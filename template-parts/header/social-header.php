<!-- Social Bar ============================================= -->
<div id="top-bar" class="dark">
    <div class="o-container">
        <div class="col_half nobottommargin">
            <div class="top-nav">
                <?php
                if( has_nav_menu( 'header' ) ){
                    wp_nav_menu([
                        'theme_location'        =>  'header',
                        'container'             =>  false,
                        'fallback_cb'           =>  false,
                        'depth'                 =>  1
                    ]);
                }
                ?>
            </div>
        </div>
        <!-- #End Social Bar ============================================= -->

        <!-- Top Social ============================================= -->
        <div class="col_half fright col_last nobottommargin">
            <div id="top-social">
                <ul>
                    <?php
                    if( get_theme_mod( 'onlinekhabar_facebook_handle' ) ){ ?>
                    <li>
                        <a href="https://facebook.com/<?php echo get_theme_mod( 'onlinekhabar_facebook_handle' ); ?>"
                            class="si-facebook"><span class="ts-icon"><i class="fab fa-facebook-square"></i></span><span
                                class="ts-text">Facebook</span>
                        </a>
                    </li>
                    <?php }
                        if( get_theme_mod( 'onlinekhabar_twitter_handle' ) ){ ?>
                    <li>
                        <a href="https://twitter.com/<?php echo get_theme_mod( 'onlinekhabar_twitter_handle' ); ?>"
                            class="si-twitter"><span class="ts-icon"><i class="fab fa-twitter-square"></i></span>
                            <span class="ts-text">Twitter</span>
                        </a>
                    </li>
                    <?php }
                    
                    if( get_theme_mod( 'onlinekhabar_instagram_handle' ) ){ ?>
                    <li>
                        <a href="https://instagram.com/<?php echo get_theme_mod( 'onlinekhabar_instagram_handle' ); ?>"
                            class="si-instagram"><span class="ts-icon"><i
                                    class="fab fa-instagram-square"></i></i></span>
                            <span class="ts-text">Instagram</span>
                        </a>
                    </li>
                    <?php }
                        
                        if( get_theme_mod( 'onlinekhabar_email' ) ){ ?>
                    <li>
                        <a href="mailto:<?php echo get_theme_mod( 'onlinekhabar_email' ); ?>" class="si-email3"><span
                                class="ts-icon"><i class="far fa-envelope"></i></span>
                            <span class="ts-text"><?php echo get_theme_mod( 'onlinekhabar_email' ); ?></span>
                        </a>
                    </li>
                    <?php }
                    
                    if( get_theme_mod( 'onlinekhabar_phone_number' ) ){ ?>
                    <li>
                        <a href="tel:+<?php echo get_theme_mod( 'onlinekhabar_phone_number' ); ?>" class="si-call"><span
                                class="ts-icon"><i class="fas fa-phone-square"></i></span>
                            <span class="ts-text">+<?php echo get_theme_mod( 'onlinekhabar_phone_number' ); ?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>