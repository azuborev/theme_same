<?php
/**
 * The template for displaying breadcrumbs
 *
 * @package same
 */

?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<div class="inside">
	<?php
	if ( function_exists( 'bcn_display' ) ) {
		bcn_display();
	}
	?>
	</div>
</div>
