<?php
    if( get_theme_mod( 'onlinekhabar_header_show_cart' ) ){
    ?>
<!-- Top Cart ============================================= -->
<div id="top-cart">
    <a href="#" id="top-cart-trigger">
        <i class="fas fa-shopping-cart"></i>
        <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>
    <div class="top-cart-content">
        <div class="top-cart-title">
            <h4>Shopping Cart</h4>
        </div>
        <div class="top-cart-items">
            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
            <div class="top-cart-item clearfix">
                <div class="top-cart-item-image">
                    <?php
                                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                                        if ( ! $product_permalink ) {
                                                            echo $thumbnail; // PHPCS: XSS ok.
                                                        } else {
                                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                                        }
                                                        ?>
                </div>
                <div class="top-cart-item-desc">
                    <a href="#">
                        <?php
                                                        if ( ! $product_permalink ) {
                                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                        } else {
                                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                        }
                                                        ?>
                    </a>
                    <span class="top-cart-item-price">
                        <?php
                                                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                            ?>
                    </span>
                    <span class="top-cart-item-quantity"><?php echo $cart_item['quantity']; ?></span>
                </div>
            </div>
            <?php
                                            }
                                        }
                                        ?>
        </div>
        <div class="top-cart-action clearfix">
            <span class="fleft top-checkout-price"><?php echo WC()->cart->get_cart_total(); ?></span>
            <a href="<?php echo wc_get_cart_url(); ?>" class="button button-3d button-small nomargin fright">
                View Cart
            </a>
        </div>
    </div>
</div>
<!-- #top-cart end -->
<?php
    }
    ?>