<?php
/**
 * The sidebar containing the main widget area
 *
 * @package same
 */

?>
<div class="column column25">
	<?php
	if ( is_active_sidebar( 'same-sidebar-aside' ) ) {
		dynamic_sidebar( 'same-sidebar-aside' );
	}
	?>
</div>
