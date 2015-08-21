<?php global $product; ?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php print( $product->get_image() ); ?>
		<?php print( $product->get_title() ); ?>
	</a>
	<?php if ( ! empty( $show_rating ) ) print( $product->get_rating_html() ); ?>
	<div class="product-price"><?php print( $product->get_price_html() ); ?></div>
</li>