<?php global $woocommerce; ?>
<li>
    <div class="topcart-content">
        <?php if ( sizeof($woocommerce->cart->cart_contents) > 0 ) : ?>
            <div class="topcart-list">
                <h3><?php _e( 'Shopping Cart', 'jeg_textdomain' ); ?></h3>
                <?php foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                    $_product = $cart_item['data'];
                    if ($_product->exists() && $cart_item['quantity']>0) :  ?>

                        <div class="topcart-item clearfix">
                            <a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ) ?>" class="remove"><i class="fa fa-remove"></i></a>
                            <a href="<?php echo get_permalink( $_product->id ); ?>" class="topcart-list-product-image"><?php print( $_product->get_image() ) ?></a>
                            <div class="topcart-list-product-content">
                                <a href="<?php echo get_permalink( $_product->id ); ?>" class="topcart-list-product-title"><?php echo esc_html( $_product->get_title() ) ?></a>
                                <span class="topcart-list-product-price"><?php echo woocommerce_price($_product->get_price()) ?> /</span>
                                <span class="topcart-list-product-qty"><?php echo __('Qty: ', 'jeg_textdomain') . esc_html( $cart_item['quantity'] ); ?></span>
                            </div>
                        </div>

                    <?php endif; endforeach;?>
            </div>
            <div class="topcart-subtotal">
                <?php _e('Cart Subtotal :', 'jeg_textdomain'); ?> <span class="subtotal"><?php print( $woocommerce->cart->get_cart_total() ); ?></span>
            </div>
            <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="topcart-btn cart"><i class="fa fa-shopping-cart"></i> <?php _e('View Cart', 'jeg_textdomain'); ?></a>
            <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="topcart-btn checkout"><i class="fa fa-check-square "></i> <?php _e('Checkout', 'jeg_textdomain'); ?></a>
        <?php else : ?>
            <div class="empty-cart">
                <p><?php _e( 'No products in cart.', 'jeg_textdomain' ); ?></p>
                <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"><i class="fa fa-shopping-cart"></i> <?php _e( 'Shop Now', 'jeg_textdomain' ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</li>