<?php
/**
 * The template for displaying search form
 *
 * @package same
 */

?>

<div class="padd16bot">
	<form role="search" method="get" id="searchform" class="searchbar" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<fieldset>
			<div>
				<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
				<span class="input_text"><input class="clearinput" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..."/></span>
				<button type="button" class="input_submit"><span><?php echo esc_attr_x( 'Search', 'submit button' ); ?></span></button>
			</div>
		</fieldset>
	</form>
</div>
