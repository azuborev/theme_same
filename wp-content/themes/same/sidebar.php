<?php
/**
 * The sidebar containing the main widget area
 *
 * @package same
 */

?>

<div class="column column25">

	<?php
	if(is_active_sidebar('same-aside-1')) {
		dynamic_sidebar('same-aside-1');
	}
	?>
    <div class="padd16bot">
        <h1>Search</h1>
        <form class="searchbar">
            <fieldset>
                <div>
                    <span class="input_text"><input type="text" class="clearinput" value="Search..." /></span>
                    <button type="button" class="input_submit"><span>Search</span></button>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="padd16bot">
        <h1>Recent Posts</h1>
        <ul class="recent_posts">
            <li class="item">
                <a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts1.jpg"></a>
                <div class="text">
                    <h4 class="title"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></h4>
                    <p class="data">
                        <span class="date">21/10/2011</span>
                    </p>
                </div>
            </li>
            <li class="item">
                <a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts2.jpg"></a>
                <div class="text">
                    <h4 class="title"><a href="#">Cras vitae est lacus vehicula enim ac turpis at tellus.</a></h4>
                    <p class="data">
                        <span class="date">21/10/2011</span>
                    </p>
                </div>
            </li>
            <li class="item">
                <a class="thumbnail" href="#"><img alt="" src="./gfx/examples/above_footer_recent_posts3.jpg"></a>
                <div class="text">
                    <h4 class="title"><a href="#">Quisque quis nibh.</a></h4>
                    <p class="data">
                        <span class="date">21/10/2011</span>
                    </p>
                </div>
            </li>
        </ul>
    </div>

    <div class="padd16bot">
        <h1>About Us</h1>
        <p>Suspendisse in faucibus lorem, pretium quis, <a href="#">lacinia aliquet</a> enim sapien et lacus tellus quis consectetuer nisl.</p>
        <p>Vestibulum tempus. Pellentesque sagittis, nunc eu odio. Suspendisse turpis at ipsum. Pellentesque placerat. Vivamus vulputate luctus.</p>
    </div>

    <div class="padd16bot">
        <h1>Categories</h1>
        <ul class="menu categories page_text">
            <li><a href="#">Webdesign (8)</a></li>
            <li>
                <a href="#">Branding (12)</a>
                <ul>
                    <li><a href="#">Photography (45)</a></li>
                </ul>
            </li>
            <li><a href="#">Photomanipulation (5)</a></li>
            <li><a href="#">3D (1)</a></li>
            <li><a href="#">Others (7)</a></li>
        </ul>
    </div>
</div>