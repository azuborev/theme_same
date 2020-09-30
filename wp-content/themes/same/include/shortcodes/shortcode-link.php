<?php
function add_link_in_text($atts) {
    $atts = shortcode_atts( [
                                'link'=> '#',
                                'anchor' => 'read more...',
                            ], $atts );
    return '<a href="'.$atts['link'].'">'.$atts['anchor'].'</a>';

}
add_shortcode('same-link', 'add_link_in_text');
